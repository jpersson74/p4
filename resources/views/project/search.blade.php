@extends('layouts.master')

@section('title')
    WSP Geospatial Job Tracker
@endsection

@section('content')

    <!-- Creates search form -->

    <form method='GET' action='/search-process'>
        <fieldset>
            <legend>Search for project information here:</legend>
            <label for='projSearch'>Search by Project ID: </label>
            <input type='text'
                   id='projSearch'
                   name='projSearch'
                   placeholder='Example: 18P-i18847'
                   value='{{ old('projSearch', $projSearch) }}'>
            <br>

            <!-- Displays any search errors -->

            @if($errors->get('projSearch'))
                <div class='error'>{{ $errors->first('projSearch') }}</div>
            @endif
        </fieldset>
        <br>
        <input type='submit' name='search' value='Search Projects'>
        <br>
    </form>

    <!-- Displays results-->

    @if($projSearch)
        <p>Here are your results:</p>
        @if(count($searchResults) == 0)
            <p>No matches found.</p>
        @else
            @foreach($searchResults as $projectID => $project)
                <div class='projectResults'>
                    <ul class='searchResults'>
                        <li>Project: {{$project['ProjectID']}}</li>
                        <li>Location: {{$project['Location']}}</li>
                        <li>Year: {{$project['Year']}}</li>
                        <li>Type: {{$project['ProjectType']}}</li>
                    </ul>
                </div>
            @endforeach
        @endif
    @endif
@endsection