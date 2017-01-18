
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
        </div>
    </div>
</div>
@endsection
