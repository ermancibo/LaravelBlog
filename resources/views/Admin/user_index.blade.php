@extends('layouts.master')

@section('content')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Users</h1>
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
            			<th>Rolls</th>
            			<th>Name</th>
            			<th>Email</th>
            			<th>Date of Membership</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
                    @foreach($users as $user)
            		<tr>
            			<td>
                        @foreach($user->roles as $rol)
                            {{$rol->name}}<br>
                        @endforeach
                        </td>
            			<td>{{$user->name}}</td>
            			<td>{{$user->email}}</td>
            			<td>{{$user->created_at->diffForHumans()}}</td>
            			<td>
                            <a href="/user/{{$user->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="/user/{{$user->id}}" class="btn btn-danger eylem" data-toggle="tooltip" data-method="delete" data-confirm="Are you sure?" title="Delete"><i class="fa fa-remove"></i></a>
                        </td>
            		</tr>
                    @endforeach
            	</tbody>
            </table>
            <div class="text-center">{{$users->links()}}</div>
        </div>
    </div>
</div>

@endsection
