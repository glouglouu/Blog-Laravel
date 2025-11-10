<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class SubscriptionsController extends Controller
{
    //
    public function index()
    {
        $subscriptions = Subscription::all();
        // check if user have a subscription
        $user = auth()->user();
        
        if ($user) {
            // Get the active subscription of the user
            $userSubscriptions = $user->subscriptions()
                ->wherePivot('active', true)
                ->wherePivot('end_date', '>=', now())
                ->get();

            return view('subscriptions.index', compact('subscriptions', 'userSubscriptions'));
        }
        $userSubscriptions = collect([]);
        return view('subscriptions.index', compact('subscriptions', 'userSubscriptions'));
    }

    public function show(Subscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }

    public function subscribe(Subscription $subscription)
    {

        // on vérifie si l'utilisateur est connecté
        // si non, on le redirige vers la page de connexion
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Vérifier si l'utilisateur a déjà cet abonnement actif
        $existingSubscriptionActiveWithThisID = DB::table('users_subscriptions')
            ->where('user_id', $user->id)
            ->where('subscription_id', $subscription->id)
            ->where(function($query) {
                $query->where('active', true)
                      ->orWhere('active', 1)
                      ->orWhere('active', '1');
            })
            ->where('end_date', '>=', now())
            ->first();

        if ($existingSubscriptionActiveWithThisID) {
            return redirect()->route('subscriptions.index')
                ->with('error', 'Vous avez déjà cet abonnement actif');
        }

        // Désactiver l'abonnement actif existant s'il y en a un
        $activeSubscriptions = DB::table('users_subscriptions')
            ->where('user_id', $user->id)
            ->where(function($query) {
                $query->where('active', true)
                      ->orWhere('active', 1)
                      ->orWhere('active', '1');
            })
            ->where('end_date', '>=', now())
            ->get();

        // Désactiver tous les abonnements actifs
        foreach ($activeSubscriptions as $activeSubscription) {
            DB::table('users_subscriptions')
                ->where('id', $activeSubscription->id)
                ->update([
                    'active' => false,
                    'end_date' => now()
                ]);
        }

        // Créer le nouvel abonnement
        // Définir la durée par défaut selon le type d'abonnement
        $duration = $subscription->duration ?? ($subscription->name === 'Premium' ? 30 : 0);
        
        $user->subscriptions()->attach($subscription, [
            'active' => true,
            'start_date' => now(),
            'end_date' => now()->addDays($duration)
        ]);

        // Vérifier s'il y a une redirection après abonnement (ex: article premium)
        if (session()->has('redirect_after_subscription')) {
            $redirectTo = session()->get('redirect_after_subscription');
            session()->forget('redirect_after_subscription');
            return redirect($redirectTo)
                ->with('success', 'Vous avez souscrit à l\'abonnement ' . $subscription->name . '. Vous pouvez maintenant accéder à cet article.');
        }

        return redirect()->route('subscriptions.index')
            ->with('success', 'Vous avez souscrit à l\'abonnement ' . $subscription->name);
    }

    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
        $subscription = Subscription::create($request->all());
        return redirect()->route('subscriptions.index');
    }
}
