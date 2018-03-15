<div class="text-center">
    @if(isset($upload_file))
        <img src="{{ 'https://f000.backblazeb2.com/file/'.env('b2_BUCKETName').'/'.$upload_file->file_name }}" width="100" height="100">
    @endif
</div>

<div class="col-md-10 col-md-offset-2">
    <div class="form-group">
        <label for="exampleFormControlFile1">Select File</label>
        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        @if ($errors->has('file'))
            <span class="text-danger">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="col-md-10">
    <button type="submit" class="btn btn-primary pull-right">{{ $button }}</button>
</div>