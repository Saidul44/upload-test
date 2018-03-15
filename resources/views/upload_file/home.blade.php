@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload File</div>

                <div class="panel-body">
                    @if(! isset($upload_file))

                        {!! Form::open(['url' => 'upload-file', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => "multipart/form-data"]) !!}
                        
                            @include('upload_file._form',['button' => 'Submit'])
                        
                        {!! Form::close() !!}
                    @else
                        {!! Form::model($upload_file,['method' =>'PUT', 'url' => ["upload-file",$upload_file->id],'class'=>'form-horizontal', 'role' => 'form', 'enctype' => "multipart/form-data"]) !!}

                            @include('upload_file._form',['button' => 'Update'])

                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
