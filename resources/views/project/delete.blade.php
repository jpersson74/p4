@extends('layouts.master')


@section('title')
    Confirm deletion: {{ $project->ProjectID }}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete project <strong>{{ $project->ProjectID }}</strong>?</p>



    <form method='POST' action='/destroy/{{ $project->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' id='delete'>

    </form>
    <br>
    <br>

    <form method='GET' action='/search'>
        {{ csrf_field() }}
        <input type='submit' value='No, take me back!' id='return'>
    </form>

@endsection