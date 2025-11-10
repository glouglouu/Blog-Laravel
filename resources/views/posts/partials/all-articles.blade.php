<div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($posts as $post)
        <x-article-card :post="$post" />
    @endforeach
</div>

