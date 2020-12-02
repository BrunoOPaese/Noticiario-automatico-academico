@extends('partials.layout')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-4 offset-4">
            <h1>Banco de Questões</h1>
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="digite o email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="password">Senha</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="digite a senha">
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-success">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
