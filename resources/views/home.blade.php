
@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{!! config('settings.title') !!}</h1>
                    <hr class="small">
                    <span class="subheading">{!! config('settings.description') !!}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($articles as $article)
                <div class="post-preview">
                    <a href="/posts/{{$article->slug}}">
                        <h2 class="post-title">
                            {{$article->title}}
                        </h2>
                        <h3 class="post-subtitle ">
                            {!! substr(strip_tags($article->content),0,rand(135,200)) !!}...
                        </h3>

                    </a>
                    <p class="post-meta">
                        Posted by {{$article->user->name}} on {{$article->created_at->formatLocalized('%A %d %B %Y - %H:%M')}}.
                    </p>
                </div>
                <hr>
                @endforeach
                        <!-- Pager -->
                <div class="text-center">
                    {{$articles->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
