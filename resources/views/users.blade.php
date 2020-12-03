@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <a href="{{ route('users.create') }}" class="btn btn-success">Inserir</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
        <table class="table table-hover table-bordered">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th> 
            </tr>
            @foreach($users as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy', ['id' => $users->id]) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <div class="btn-group">
                                <a href="{{ route('users.edit', ['id' => $users->id]) }}" class="btn btn-info">Editar</a>
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
@endsection