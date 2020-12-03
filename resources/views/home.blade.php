@extends('layouts.layout')
@include('layouts.publicmenu')
@section('content')
<div class="container ml-2">
    <div class="row">
        <div class="col-12">
            @foreach($posts as $post)
                <div class="row">
                    <div class="section col-12">
                        <h4>{{ $post->title }}</h4>
                        <div class="row">
                            <div class="col-8 post-text">
                                <p>{{ $post->text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
