@extends('layouts.master')

@section('title')
WSP Geospatial Job Tracker
@endsection

@section('content')
<img src='/images/WSP.png' id='logo' alt='WSP Logo'><h1>Geospatial Project Tracker</h1>

<!-- Creates entry form -->

<form method='POST' action='/enter-data'>
    {{ csrf_field() }}

    <p> Please enter project information below or use search tool at bottom to look for project data:</p>
    <fieldset>
        <legend>Please enter a project ID:</legend>
        <label for='projID'>Project ID:</label>
        <input type='text' id='projID' name='projID' placeholder='Example: 18P-i18847' value='{{ old('projID') }}'>
        <br>

                                                                                                            <!-- Gets errors from error array for field-->

                                                                                                            @if($errors->get('projID'))
        <div class='error'>{{ $errors->first('projID') }}</div>
                                                                                                            @endif
    </fieldset>
    <br>
    <fieldset>
        <legend>Please select a project year:</legend>
        <select name='projYear' id='projYear'>
            <option value='' selected='selected'>Select a Project Year</option>
            <option value='2018'{{(old('projYear') == '2018') ? 'selected' : ''}}>2018</option>
            <option value='2017'{{(old('projYear') == '2017') ? 'selected' : ''}}>2017</option>
            <option value='2016'{{(old('projYear') == '2016') ? 'selected' : ''}}>2016</option>
            <option value='2015'{{(old('projYear') == '2015') ? 'selected' : ''}}>2015</option>
            <option value='2014'{{(old('projYear') == '2014') ? 'selected' : ''}}>2014</option>
            <option value='2013'{{(old('projYear') == '2013') ? 'selected' : ''}}>2013</option>
            <option value='2012'{{(old('projYear') == '2012') ? 'selected' : ''}}>2012</option>
            <option value='2011'{{(old('projYear') == '2011') ? 'selected' : ''}}>2011</option>
            <option value='2010'{{(old('projYear') == '2010') ? 'selected' : ''}}>2010</option>
            <option value='2009'{{(old('projYear') == '2009') ? 'selected' : ''}}>2009</option>
            <option value='2008'{{(old('projYear') == '2008') ? 'selected' : ''}}>2008</option>
            <option value='2007'{{(old('projYear') == '2007') ? 'selected' : ''}}>2007</option>
            <option value='2006'{{(old('projYear') == '2006') ? 'selected' : ''}}>2006</option>
            <option value='2005'{{(old('projYear') == '2005') ? 'selected' : ''}}>2005</option>
            <option value='2004'{{(old('projYear') == '2004') ? 'selected' : ''}}>2004</option>
            <option value='2003'{{(old('projYear') == '2003') ? 'selected' : ''}}>2003</option>
            <option value='2002'{{(old('projYear') == '2002') ? 'selected' : ''}}>2002</option>
            <option value='2001'{{(old('projYear') == '2001') ? 'selected' : ''}}>2001</option>
            <option value='2000'{{(old('projYear') == '2000') ? 'selected' : ''}}>2000</option>
        </select>
        @if($errors->get('projYear'))
        <div class='error'>{{ $errors->first('projYear') }}</div>
        @endif
    </fieldset>
    <br>
    <fieldset>
        <legend>Please select all that apply:</legend>
        <input type='radio' name='projType' value="Photogrammetry" {{(old('projType') == 'Photogrammetry') ? 'checked' : ''}}>Photogrammetry<br>
        <input type='radio' name='projType' value="Survey" {{(old('projType') == 'Survey') ? 'checked' : ''}}>Survey<br>
        <input type='radio' name='projType' value="GIS" {{(old('projType') == 'GIS') ? 'checked' : ''}}>GIS<br>
        <input type='radio' name='projType' value="Laser Scanning" {{(old('projType') == 'Laser Scanning') ? 'checked' : ''}}>Laser Scanning<br>
                                                                          @if($errors->get('projType'))
        <div class='error'>{{ $errors->first('projType') }}</div>
                                                                          @endif
    </fieldset>
    <br>
    <fieldset>
        <legend>Location:</legend>
        <label for='projLoc'>Project Location:</label>
        <input type='text' id='projLoc' name='projLoc' placeholder='Example: Providence, RI' value='{{ old('projLoc') }}'>
                                                                                                                   @if($errors->get('projLoc'))
        <div class='error'>{{ $errors->first('projLoc') }}</div>
                                                                                                                   @endif
    </fieldset>
    <br>
    <input type='submit' name='save' value='Enter data'>
    <br>
    <br>

    <!-- Displays success message upon form validation and submission -->

    @if (\Session::has('success'))
    <div class="noError">
        {!! \Session::get('success') !!}
    </div>
    @endif
    <br>

</form>

<!-- Creates search form -->

<form method='GET' action='/search-process'>
    <fieldset>
        <legend>Search for project information here:</legend>
        <label for='projSearch'>Search by Project ID: </label>
        <input type='text' id='projSearch' name='projSearch' placeholder='Example: 18P-i18847' value='{{ old('projSearch', $projSearch) }}'>
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