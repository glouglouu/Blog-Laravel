# 📝 Blog Laravel - Application de Blog Multilingue

Un blog moderne et complet développé avec Laravel 11, incluant un système multilingue, des abonnements premium, et une gestion complète des articles.

## 🌟 Fonctionnalités Principales

### 🌍 Système Multilingue
- **Support de 3 langues** : Français (FR), Anglais (EN), Allemand (DE)
- **Bouton de langue permanent** dans le header (toujours visible)
- **165+ traductions complètes** pour toute l'interface
- **Persistance de la langue** en session
- **Changement de langue en temps réel** pour tout le contenu
- **Interface élégante** avec drapeaux 🇫🇷 🇬🇧 🇩🇪 et indicateurs visuels

### 📰 Gestion des Articles
- **Création d'articles** (réservé aux administrateurs)
- **Édition et suppression** d'articles
- **Articles gratuits et premium** (payants)
- **Système de publication** avec dates de publication
- **Brouillons** pour préparer les articles
- **Slug automatique** généré à partir du titre
- **Affichage des articles** avec pagination et tri par date
- **Cartes d'articles** avec aperçu du contenu

### 💬 Système de Commentaires
- **Commentaires publics** sur les articles
- **Authentification requise** pour commenter
- **Affichage des commentaires** avec auteur et date
- **Compteur de commentaires** sur chaque article

### 💳 Système d'Abonnements
- **Abonnements gratuits** : Accès aux articles gratuits uniquement
- **Abonnements premium** : Accès à tous les articles (gratuits + premium)
- **Gestion des abonnements actifs** avec dates d'expiration
- **Interface de souscription** avec cartes d'abonnement
- **Masquage automatique** de la page abonnements pour les administrateurs
- **Prévention des doublons** d'abonnements

### 👥 Gestion des Utilisateurs
- **Authentification complète** (Laravel Breeze)
- **Rôles utilisateurs** : Admin et User
- **Profil utilisateur** avec édition des informations
- **Changement de mot de passe**
- **Suppression de compte**
- **Dashboard administrateur** avec statistiques

### 🔐 Autorisations et Sécurité
- **Policies Laravel** pour la gestion des permissions
- **Middleware de vérification des rôles** (`CheckUserRole`)
- **Protection des articles premium** : accès réservé aux abonnés
- **Protection des actions admin** : création/édition/suppression d'articles
- **Validation des formulaires** avec Request classes

### 🎨 Interface Utilisateur
- **Design moderne** avec Tailwind CSS
- **Responsive design** (mobile, tablette, desktop)
- **Composants Blade réutilisables**
- **Navigation intuitive** avec menu hamburger sur mobile
- **Messages flash** pour les notifications
- **Animations fluides** avec Alpine.js

## 🚀 Installation

### Prérequis
- PHP >= 8.2
- Composer
- SQLite (ou MySQL/PostgreSQL)
- Node.js et npm

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone <repository-url>
cd blog-with-laravel
```

2. **Installer les dépendances**
```bash
composer install
npm install
```

3. **Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurer la base de données**
```bash
# Pour SQLite (par défaut)
touch database/database.sqlite

# Ou modifier .env pour MySQL/PostgreSQL
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=blog
# DB_USERNAME=root
# DB_PASSWORD=
```

5. **Exécuter les migrations et seeders**
```bash
php artisan migrate
php artisan db:seed
```

6. **Compiler les assets**
```bash
npm run build
# ou pour le développement
npm run dev
```

7. **Lancer le serveur**
```bash
php artisan serve
```

L'application sera accessible sur `http://localhost:8000`

## 👤 Comptes par Défaut

Après le seeding, vous pouvez vous connecter avec :

- **Administrateur** :
  - Email : `admin@example.com`
  - Mot de passe : `password`

- **Utilisateur standard** :
  - Email : `user@example.com`
  - Mot de passe : `password`

## 📁 Structure du Projet

```
blog-with-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/        # Contrôleurs de l'application
│   │   ├── Middleware/          # Middlewares (SetLocale, CheckUserRole)
│   │   └── Requests/            # Form Request validations
│   ├── Models/                  # Modèles Eloquent
│   ├── Policies/                # Policies d'autorisation
│   └── View/Components/          # Composants Blade
├── database/
│   ├── migrations/              # Migrations de base de données
│   ├── seeders/                 # Seeders pour les données initiales
│   └── factories/               # Factories pour les tests
├── lang/                        # Fichiers de traduction
│   ├── fr.json                  # Traductions françaises
│   ├── en.json                  # Traductions anglaises
│   └── de.json                  # Traductions allemandes
├── resources/
│   ├── views/                   # Vues Blade
│   │   ├── auth/                # Pages d'authentification
│   │   ├── posts/               # Pages des articles
│   │   ├── subscriptions/       # Page des abonnements
│   │   ├── profile/             # Pages de profil
│   │   └── layouts/             # Layouts principaux
│   ├── css/                     # Styles CSS
│   └── js/                      # JavaScript (Alpine.js)
└── routes/
    └── web.php                  # Routes web
```

## 🔧 Configuration

### Langue par défaut
La langue par défaut est configurée dans `config/app.php` :
```php
'locale' => env('APP_LOCALE', 'fr'),
'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
```

### Middleware
Le middleware `SetLocale` est automatiquement appliqué à toutes les routes web via `bootstrap/app.php`.

### Routes principales
- `/` - Page d'accueil avec liste des articles
- `/posts` - Liste de tous les articles publiés
- `/posts/{post}` - Détails d'un article
- `/posts/create` - Créer un article (admin uniquement)
- `/posts/{post}/edit` - Éditer un article (admin uniquement)
- `/subscriptions` - Page des abonnements
- `/dashboard` - Dashboard administrateur
- `/profile` - Profil utilisateur
- `/language/{locale}` - Changer de langue (fr, en, de)

## 🌐 Utilisation du Système Multilingue

### Pour l'utilisateur
1. Cliquer sur le bouton de langue dans le header (icône globe 🌐)
2. Sélectionner la langue souhaitée dans le dropdown
3. La page se recharge automatiquement dans la nouvelle langue
4. La préférence est sauvegardée pour toute la session

### Pour le développeur
Utiliser la fonction `__()` dans les vues Blade :
```blade
{{ __('Home') }}
{{ __('Articles') }}
{{ __('Welcome') }}
```

Ajouter une nouvelle traduction :
1. Ajouter la clé dans `lang/fr.json`, `lang/en.json`, et `lang/de.json`
2. Utiliser `{{ __('Ma clé') }}` dans les vues

## 🗄️ Base de Données

### Tables principales
- `users` - Utilisateurs
- `roles` - Rôles (admin, user)
- `posts` - Articles
- `comments` - Commentaires
- `subscriptions` - Types d'abonnements
- `users_subscriptions` - Abonnements des utilisateurs (pivot)

### Relations
- User → Posts (hasMany)
- User → Comments (hasMany)
- User → Subscriptions (belongsToMany)
- Post → User (belongsTo)
- Post → Comments (hasMany)
- Comment → User (belongsTo)
- Comment → Post (belongsTo)

## 🔒 Sécurité

- **Protection CSRF** sur tous les formulaires
- **Validation des données** avec Form Requests
- **Policies d'autorisation** pour les actions sensibles
- **Middleware d'authentification** sur les routes protégées
- **Vérification des rôles** pour les actions admin
- **Protection des articles premium** avec vérification d'abonnement

## 🧪 Tests

```bash
# Lancer les tests
php artisan test

# Tests spécifiques
php artisan test --filter PostShowTest
```

## 📦 Technologies Utilisées

- **Laravel 11** - Framework PHP
- **Laravel Breeze** - Authentification
- **Tailwind CSS** - Framework CSS
- **Alpine.js** - JavaScript réactif
- **SQLite** - Base de données (par défaut)
- **Blade** - Moteur de templates

## 📝 Fonctionnalités Détaillées

### Articles
- ✅ Création, lecture, mise à jour, suppression (CRUD)
- ✅ Articles gratuits et premium
- ✅ Système de publication avec dates
- ✅ Brouillons
- ✅ Slug automatique
- ✅ Auteur automatique
- ✅ Compteur de commentaires

### Abonnements
- ✅ Abonnements gratuits et premium
- ✅ Gestion des dates d'expiration
- ✅ Prévention des doublons
- ✅ Vérification d'abonnement actif
- ✅ Masquage pour les admins

### Commentaires
- ✅ Ajout de commentaires sur les articles
- ✅ Affichage avec auteur et date
- ✅ Authentification requise
- ✅ Suppression en cascade avec les articles

### Multilingue
- ✅ 3 langues supportées (FR, EN, DE)
- ✅ 165+ traductions complètes
- ✅ Bouton de langue permanent
- ✅ Persistance en session
- ✅ Middleware automatique

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :
1. Fork le projet
2. Créer une branche pour votre fonctionnalité
3. Commit vos changements
4. Push vers la branche
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT.

## 👨‍💻 Auteur

Développé dans le cadre d'un projet éducatif avec Laravel 11.

---

**Note** : Ce projet utilise Laravel 11 avec une structure moderne et des bonnes pratiques de développement.
