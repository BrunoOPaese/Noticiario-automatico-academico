@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            @if($category->id)
                <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                {{ method_field('PUT') }}
            @else
                <form action="{{ route('categories.save') }}" method="POST">
            @endif
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}">
                    </div>
                    <div class="form-group">
                        <label for="active">Ativo</label>
                        @if($category->active)
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