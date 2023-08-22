@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($projects as $project)
        <li>
            {{$project->title}}
        </li>
        @endforeach
    </div>
</div>
@endsection
