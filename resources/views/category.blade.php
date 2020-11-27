@extends('layouts.layout')
@include('layouts.menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            @if($category->id)
                <form action="" method="POST">
            @else
                <form action="" method="POST">
            @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" value="{{ $category->name }}">
                    </div>
        </div>
    </div>
</div>