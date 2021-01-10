<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Eje: Paises Post">
    </div>

    @if ($posts->count())
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td with="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                        </td>
                        <td with="10px">
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$posts->links()}}
    </div>

    @else
        <strong class="text-danger text-center"><h2>No hay ningun registro con el nombre: {{$search}}</h2></strong>
    @endif
</div>
