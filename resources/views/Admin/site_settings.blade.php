@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Site Settings</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Site Settings</div>
                <div class="panel-body">
                    {!! Form::open(["url" => "/site-settings/update", "method" => "put"]) !!}
                    @foreach($settings as $setting)
                        {!! Form::bsText($setting->name,trans('forms.'.$setting->name),$setting->value ) !!}
                    @endforeach
                    {!! Form::bsSubmit("SAVE") !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
