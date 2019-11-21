@extends('layouts.app')

@section('title', 'Tree view')
@section('description', 'Tree view for interviewer')

@section('content')
    <div class="container">
        <ul class="tree">
            @foreach($categories as $category)
                @include('components.node', ['category' => $category])
            @endforeach
        </ul>
    </div>
@endsection