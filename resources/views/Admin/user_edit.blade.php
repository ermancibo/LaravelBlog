@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                {!! Form::model($user, ['route' => ['user.update', $user->id],"method" => "put"]) !!}
                {!! Form::bsCheckbox("rol","Roles", [
                    ["value" => 1, "text" => "Admin", "is_checked" => $user->has_auth("admin")],
                    ["value" => 2, "text" => "Author", "is_checked" => $user->has_auth("author")],
                    ["value" => 3, "text" => "Standart", "is_checked" => $user->has_auth("standart")],
                ]) !!}

                {!! Form::bsText("name","Name") !!}
                {!! Form::bsText("email","E-mail") !!}
                {!! Form::bsPassword("password","Password") !!}
                {!! Form::bsSubmit("SAVE") !!}
                {!! Form::close() !!}

    </div>
</div>

@endsection
