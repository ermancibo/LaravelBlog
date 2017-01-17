@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Categories</h1>
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
                <a href="/categories/create" class="btn btn-danger"><i class="fa fa-plus"></i>ADD NEW CATEGORY</a>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{!! $category->thumb_image !!}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>

                        <td>
                            <a href="/categories/{{$category->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="/categories/{{$category->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">{{$categories->links()}}</div>
        </div>
    </div>
</div>

@endsection
