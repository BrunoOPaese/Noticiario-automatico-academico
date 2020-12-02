@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Inserir Notícia</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3" >
                <table class="col-12 table" id="posts" style="max-width:90%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Sumario</th>
                            <th>Categoria</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td style="max-width:5vw">{{$post->id}}</td>
                            <td style="max-width:20vw">{{$post->title}}</td>
                            <td style="overflow:hidden;max-width:25vw">{{$post->sumary}}</td>
                            <td style="max-width:20vw">
                                {{$post->category->name}}
                            </td>
                            <td>
                                @if($post->active)
                                    Ativa
                                @else
                                    Inativa
                                @endif
                            </td> 
                            <td>
                                <form action="{{ route('posts.destroy', ['id' => $post->id] ) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{ route('posts.edit', ['id' => $post->id ]) }}" class="btn btn-info">Editar</a>
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