@extends('layouts.app')

@section('title', $title)
@section('description', $description)

@section('content')
    <div class="container d-flex flex-column align-items-center pt-5">
        <h1>{{ $code }}</h1>
        <p>{{ $message }}</p>
    </div>
@endsection