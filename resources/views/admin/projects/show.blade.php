@extends('layouts.app')

@section('content')
<div class="container container-md p-5 p-md-0">
    <div class="row justify-content-md-center justify-content-lg-around">
        <div class="card p-0 col-12 col-md-5 col-lg-3 mb-3 me-md-4 me-lg-1">
            <img src="{{ $project->image }}" class="card-img-top" style="height: 200px" alt="{{$project->title}}">
            <div class="card-body">
            <h5 class="card-title"><span class='fw-bold'>ID:</span> {{$project->id}}</h5>
            <p class="card-text"><span class='fw-bold'>Title: </span>{{$project->title}}</p>
            <p class="card-text"><span class='fw-bold'>Slug: </span>{{$project->slug}}</p>
            <p class="card-text"><span class='fw-bold'>Description: </span>{{$project->description}}</p>
            <div class="row">
                <form class='delete-button' action="#" method='POST'>
                   @csrf
                   @method('DELETE')
            <div class="btn-group btn-group-sm d-flex mx-auto" role="group" aria-label="Small button group">
                   <button type="button" class="btn btn-outline-primary hover-text-white">
                    <a class='text-decoration-none' href="#">Edit</a>
                   </button>
                      <button type="submit" class="btn btn-outline-primary">Delete</button>
                  </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
