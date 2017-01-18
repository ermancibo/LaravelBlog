
@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset("uploads/".$category->image->name)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{$category->title}}</h1>

                    <span class="meta">Articles in the category.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php $i =0 ;?>
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
                    <?php $i++ ;?>
                @endforeach
                        @if($i=="")
                <div class="text-center">Sorry! We have no articles in this category yet.</div>
                        @endif

                        <!-- Pager -->
                <div class="text-center">
                    {{$articles->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
