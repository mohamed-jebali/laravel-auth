@extends('layouts.app')


@section('content')

<form action="{{ route('admin.project.store')}}" method='POST' class='col-8 mx-auto'>
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

