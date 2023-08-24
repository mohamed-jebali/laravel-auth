@extends('layouts.app')


@section('content')

<form action="{{ route('admin.projects.store')}}" method='POST' class='col-8 mx-auto' enctype="multipart/form-data">
  @csrf
  
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">image</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>

@endsection

