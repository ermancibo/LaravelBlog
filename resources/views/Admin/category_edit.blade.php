@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Edit Category</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <div class="m-b-40 text-center">
                {!! $category->thumb_image !!}

            </div>
            {!! Form::model($category, ['route' => ['categories.update', $category->id],"method" => "put","files" => true]) !!}

            {!! Form::bsText("title","Title") !!}
            {!! Form::bsFile("image","Image") !!}

            {!! Form::bsSubmit("SAVE") !!}
            {!! Form::close() !!}

        </div>
    </div>

@endsection
