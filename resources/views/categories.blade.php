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
            <table class="col-12 table-dark table">
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td style="overflow:hidden;max-width:40vw">{{$category->description}}</td>
                        <td>{{$category->active}}</td>                    
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
            </table>
        </div>
    </div>
</div>