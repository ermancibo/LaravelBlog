
@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset("uploads/".$article->image->name)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">

                    <h1>{{$article->title}}</h1>

                    <span class="meta">Posted by {{$article->user->name}} on {{$article->created_at->formatLocalized('%A %d %B %Y - %H:%M')}}.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            {!! $article->content !!}
            <div class="text-center">
                <a href="{{ route('htmltopdf',['download'=>'pdf','id'=> $article->id]) }}"> <i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
