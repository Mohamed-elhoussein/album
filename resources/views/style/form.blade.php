@csrf
<div class="form-group">
    @error('name')<div style="color:red">{{ $message }}</div>@enderror
<label for="exampleInputName1">Name</label>
<input type="text" value="{{ $album->name??old('name') }}" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
</div>

<div class="form-group">
@error('file')<div style="color:red">{{ $message }}</div>@enderror
@error('file.*')<div style="color:red">{{ $message }}</div>@enderror
<label>File upload</label>
<input type="file" name="file[]" multiple class="file-upload-default">
<div class="input-group col-xs-12">
  <input type="text" class="form-control file-upload-info"  disabled="" placeholder="Upload Image">
  <span class="input-group-append">
    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
  </span>
</div>
</div>
