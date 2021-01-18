@extends('adminlte::page')

@section('title', 'Panel Huitzi')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary float-right">Nuevo Post</a>
    <h1>Listado de Posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
