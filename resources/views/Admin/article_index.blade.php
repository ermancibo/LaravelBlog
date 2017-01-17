@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Articles</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="m-b-40 text-center">
                <a href="/article/create" class="btn btn-danger">
                    <i class="fa fa-plus"></i>
                    ADD NEW ARTICLE
                </a>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            <input type="checkbox" class="durum" data-id="{{$article->id}}" data-url="/article/chance-status" {{$article->status ? "checked" : null}} >
                        </td>
                        <td>{!! $article->thumb_image !!}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->slug}}</td>
                        <td>{{$article->category->title}}</td>
                        <td>{{$article->user->name}}</td>
                        <td>{{$article->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/article/{{$article->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="/article/{{$article->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Delete" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{$articles->links()}}
            </div>



        </div>
    </div>
</div>

@endsection
