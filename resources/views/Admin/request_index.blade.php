@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Requests</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Request</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>
                            <input type="checkbox" class="durum" data-id="{{$request->user->id}}" data-url="/requests/change-status" {{$request->user->has_auth("author") ? "checked" : null}} >
                        </td>

                        <td>{{$request->user->name}}</td>
                        <td>{{$request->user->email}}</td>
                        <td>{{$request->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/requests/{{$request->id}}/edit" class="btn btn-primary eylem" data-toggle="modal" data-target="#content{{$request->id}}" title="Show"><i class="fa fa-eye"></i></a>
                            <a href="/requests/{{$request->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Delete" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-remove"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="content{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{{$request->user->name." Author Request"}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! $request->content !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{$requests->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
