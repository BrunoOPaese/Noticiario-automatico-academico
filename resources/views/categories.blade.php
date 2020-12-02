@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Inserir Categoria</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <table class="col-12 table table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Visibilidade</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td style="overflow:hidden;max-width:40vw">{{$category->description}}</td>
                            <td>
                                    @if($category->active)
                                        Ativa
                                    @else
                                        Inativa
                                    @endif
                            </td>                    
                            <td>
                                <form action="{{ route('categories.destroy', ['id' => $category->id] ) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{ route('categories.edit', ['id' => $category->id ]) }}" class="btn btn-info">Editar</a>
                                        <button class="btn btn-danger" type="submit">Excluir</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
<script src="{{asset('js/custom.js')}}"></script>