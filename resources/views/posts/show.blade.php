<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {{$post->extract}}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    <img src="{{Storage::url($post->image->url)}}" class="w-full h-full object-cover object-center" />
                </figure>
                <div class="text-base text-gray-600 mt-7 text-lg">
                    {{$post->body}}
                </div>
            </div>
            {{-- Contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en{{$post->category->name}}</h1>
                <ul>
                    @foreach ($similars as $similar)
                        <li class="">
                            <a class="flex" href="{{route('posts.show', $similar)}}">
                                <img class="w-60 h-40 object-cover object-center mb-10" src="{{Storage::url($similar->image->url)}}" alt="" />
                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
