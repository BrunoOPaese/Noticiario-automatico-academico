@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            @include('layouts.errors')
            @if($post->id)
                <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST">
                {{ method_field('PUT') }}
            @else
                <form action="{{ route('posts.save') }}" method="POST">
            @endif
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="summary">Sumário</label>
                        <input type="text" class="form-control" id="sumary" name="sumary" value="{{ $post->sumary }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control"> 
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" name="post_date" id="post_date" class="form-control" value="{{ \Carbon\Carbon::parse($post->post_date)->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <textarea name="text" id="text" cols="" rows="10" class="form-control">{{ $post->text }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="active">Ativo</label>
                        @if($post->active)
                            <input type="checkbox" checked class="form-control" id="active" name="active">
                        @else
                            <input type="checkbox" class="form-control" id="active" name="active">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
        </div>
    </div>
</div>