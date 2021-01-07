<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="upercase text-center text-3xl font-bold mb-6">Etiqueta: {{ $tag->name }}</h1>
        @foreach ($posts as $post)
            <x-card-post :post="$post"></x-card-post>
        @endforeach
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
