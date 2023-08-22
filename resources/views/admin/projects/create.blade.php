@extends('layouts.app')


@section('content')

<form class='col-8 mx-auto'>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">image</label>
    <input type="text" class="form-control" id="image">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description">
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control" id="slug">
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  <button type="reset" class="btn btn-warning">Reset</button>
</form>

@endsection

