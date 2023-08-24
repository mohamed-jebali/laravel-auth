@extends('layouts.app')


@section('content')

<form action="{{ route('admin.projects.update', $project )}}" method='POST' class='col-8 mx-auto' enctype="multipart/form-data">
  @csrf
  @method('PUT')
  
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
      <input type="text" class="form-control" id="title" name="title" value='{{ $project->title }}'>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">image</label>
      <input type="file" class="form-control" id="image" name="image" value='{{ $project->image }}'>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description" value='{{ $project->description }}'>
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" value='{{ $project->slug }}'>
    </div>
    <button type="submit" class="btn btn-success">Updated</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>

@endsection

