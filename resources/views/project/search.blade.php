@extends('layouts.master')

@section('title')
    WSP Geospatial Job Tracker
@endsection

@section('content')

    @if (\Session::has('success'))
        <div class="noError" id='success'>
            {!! \Session::get('success') !!}
        </div>
    @endif


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
        <input type='submit' name='search' value='Search Projects' id='search'>
        <br>
    </form>

    <!-- Displays results-->

    @if(isset($projects))

        @if(count($projects) == 0)
            <p>No matches found.</p>
        @else

            <div class='projectResults'>
                <table>
                    <caption>Search Results:</caption>
                    <br>
                    <tr>
                        <th>Project</th>
                        <th>Year</th>
                        <th>Type</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project['ProjectID']}}</td>
                            <td>{{$project['Year']}}</td>
                            <td>{{$project['ProjectType']}}</td>
                            <td>{{$project['City']}}</td>
                            <td>{{$project['State']}}</td>
                            <td><a href='/{{ $project->id }}/edit'>Edit</a></td>
                            <td><a href='/{{ $project->id }}/delete'>Delete</a></td>
                        </tr>
                    @endforeach
                </table>

            </div>

        @endif
    @endif


@endsection