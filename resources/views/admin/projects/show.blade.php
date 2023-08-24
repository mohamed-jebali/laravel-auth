@extends('layouts.app')

@section('content')
<div class="container container-md p-5 p-md-0">
    <div class="row justify-content-md-center justify-content-lg-around">
        <div class="card p-0 col-12 col-md-5 col-lg-3 mb-3 me-md-4 me-lg-1">
            @if(str_starts_with('http','$projects->image'))
            <img src="{{ $projects->image }}" class="card-img-top" style="height: 200px" alt="{{$projects->title}}">
            @else
            <img src="{{ asset('storage/' . $projects->image) }}" class="card-img-top" style="height: 200px" alt="{{$projects->title}}">
            @endif
            <div class="card-body">
            <h5 class="card-title"><span class='fw-bold'>ID:</span> {{$projects->id}}</h5>
            <p class="card-text"><span class='fw-bold'>Title: </span>{{$projects->title}}</p>
            <p class="card-text"><span class='fw-bold'>Slug: </span>{{$projects->slug}}</p>
            <p class="card-text"><span class='fw-bold'>Description: </span>{{$projects->description}}</p>
            <div class="row">
                <form class='delete-button' action="#" method='POST'>
                   @csrf
                   @method('DELETE')
            <div class="btn-group btn-group-sm d-flex mx-auto" role="group" aria-label="Small button group">
                   <button type="button" class="btn btn-outline-primary hover-text-white">
                    <a class='text-decoration-none' href="#">Edit</a>
                   </button>
                      <button type="submit" class="btn btn-outline-primary delete-button">Delete</button>
                  </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom-scripts-tail')
<script>
  const deleteButtons = document.querySelectorAll('.delete-button');

  deleteButtons.forEach(element => {
    element.addEventListener('submit', function (event){
      event.preventDefault();
      const popUpWindow = window.confirm('Are you sure you want to delete this Project?');
      if (popUpWindow){
        this.submit();
      }
    });
  });
</script>
@endsection
