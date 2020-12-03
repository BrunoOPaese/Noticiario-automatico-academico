@extends('layouts.layout')
@include(Auth::user() ? 'layouts.menu' : 'layouts.publicmenu')
@section('content')
<div class="container ml-10">
    <div class="row">
        <div class="col-12">
                <div class="row">
                    <div class="post col-12 bg-info" >
                        <div class="row">
                            <div class="col-8 post-title">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <div class="col-4">
                                Criado em: {{  \Carbon\Carbon::parse($post->post_date)->format('d/m/Y') }}
                                <br/>
                                @if($post->updated_at)
                                    Editado em: {{  \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 post-text">
                                <p>{{ $post->text }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                Categoria: {{ $post->category->name }}
                            </div>
                            <div class="col-3">
                                <a href="{{ route('index') }}" class="btn btn-success">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
