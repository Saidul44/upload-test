@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">File List</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>SL</th>
                            <th>File</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($files as $key => $file)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ 'https://f000.backblazeb2.com/file/'.env('b2_BUCKETName').'/'.$file->file_name }}" width="50" height="50"></td>
                                    <td>
                                        @if(! isset(auth()->user()->creator_id) || (isset(auth()->user()->creator_id) && auth()->user()->permissions->contains('name', 'update')))
                                            <a href="{{ url('upload-file/'.$file->id.'/edit') }}" class="btn btn-primary btn-sm">Update</a>
                                        @endif

                                        @if(! isset(auth()->user()->creator_id) || (isset(auth()->user()->creator_id) && auth()->user()->permissions->contains('name', 'delete')))
                                            <a href="{{ url('upload-file/'.$file->id.'/destroy') }}" class="btn btn-danger btn-sm">Delete</a>
                                        @endif
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
