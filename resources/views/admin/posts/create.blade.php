@extends('adminlte::page')

@section('title', 'Panel Huitzi')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre: ') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Eje: La ciencia de programar',
                'autocomplete' => 'off']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug: ') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Eje: La ciencia de programar',
                'readonly']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Categoria: ') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label for="">
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <label for="">
                    {!! Form::radio('status', 2, true, ['class' => 'ml-3']) !!}
                    Publicado
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('extract', 'Extracto: ') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Cuerpo del post: ') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>

            <button type="submit" class="btn btn-primary">Crear post</button>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
