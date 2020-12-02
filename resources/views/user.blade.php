@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Banco de Questões</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
        @include('layouts.errors')
        @if($user->id)
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
            {{ method_field('PUT') }}              
        @else
            <form action="{{ route('users.store') }}" method="post">
        @endif
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome do Usuário</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome do usuário" value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email do usuário" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Senha (para manter a antiga é só não passar nada)</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirme a senha</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Email do usuário">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection