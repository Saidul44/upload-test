@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                    <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm pull-right">Create User</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->permissions->implode('name', ', ') }}</td>
                                    <td>
                                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-sm">Update</a>
                                        <a href="{{ url('users/'.$user->id.'/destroy') }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
