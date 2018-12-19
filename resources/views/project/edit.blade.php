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

    <!-- Creates entry form -->

    <form method='POST' action='/update/{{$project->id}}'>
        {{ method_field('put') }}
        {{ csrf_field() }}


        <fieldset>
            <legend>Please edit Project ID:</legend>
            <label for='projID'>Project ID:</label>
            <input type='text' id='projID' name='projID' value='{{ old('projID', $project->ProjectID) }}'>
            <br>

            <!-- Gets errors from error array for field-->

            @if($errors->get('projID'))
                <div class='error'>{{ $errors->first('projID') }}</div>
            @endif
        </fieldset>
        <br>
        <fieldset>
            <legend>Please edit a project year:</legend>
            <select name='projYear' id='projYear'>
                <option value='' selected='selected'>Select a Project Year</option>
                <option value='2018'{{(old('projYear', $project->Year) == '2018') ? 'selected' : ''}}>2018</option>
                <option value='2017'{{(old('projYear', $project->Year) == '2017') ? 'selected' : ''}}>2017</option>
                <option value='2016'{{(old('projYear', $project->Year) == '2016') ? 'selected' : ''}}>2016</option>
                <option value='2015'{{(old('projYear', $project->Year) == '2015') ? 'selected' : ''}}>2015</option>
                <option value='2014'{{(old('projYear', $project->Year) == '2014') ? 'selected' : ''}}>2014</option>
                <option value='2013'{{(old('projYear', $project->Year) == '2013') ? 'selected' : ''}}>2013</option>
                <option value='2012'{{(old('projYear', $project->Year) == '2012') ? 'selected' : ''}}>2012</option>
                <option value='2011'{{(old('projYear', $project->Year) == '2011') ? 'selected' : ''}}>2011</option>
                <option value='2010'{{(old('projYear', $project->Year) == '2010') ? 'selected' : ''}}>2010</option>
                <option value='2009'{{(old('projYear', $project->Year) == '2009') ? 'selected' : ''}}>2009</option>
                <option value='2008'{{(old('projYear', $project->Year) == '2008') ? 'selected' : ''}}>2008</option>
                <option value='2007'{{(old('projYear', $project->Year) == '2007') ? 'selected' : ''}}>2007</option>
                <option value='2006'{{(old('projYear', $project->Year) == '2006') ? 'selected' : ''}}>2006</option>
                <option value='2005'{{(old('projYear', $project->Year) == '2005') ? 'selected' : ''}}>2005</option>
                <option value='2004'{{(old('projYear', $project->Year) == '2004') ? 'selected' : ''}}>2004</option>
                <option value='2003'{{(old('projYear', $project->Year) == '2003') ? 'selected' : ''}}>2003</option>
                <option value='2002'{{(old('projYear', $project->Year) == '2002') ? 'selected' : ''}}>2002</option>
                <option value='2001'{{(old('projYear', $project->Year) == '2001') ? 'selected' : ''}}>2001</option>
                <option value='2000'{{(old('projYear', $project->Year) == '2000') ? 'selected' : ''}}>2000</option>
            </select>
            @if($errors->get('projYear'))
                <div class='error'>{{ $errors->first('projYear') }}</div>
            @endif
        </fieldset>
        <br>
        <fieldset>
            <legend>Please edit project discipline:</legend>
            <input type='radio' name='projType' id='pd1'
                   value="Photogrammetry" {{(old('projType', $project->ProjectType) == 'Photogrammetry') ? 'checked' : ''}}><label
                    for='pd1'>Photogrammetry</label><br>
            <input type='radio'
                   name='projType'
                   id='pd2'
                   value="Survey" {{(old('projType', $project->ProjectType) == 'Survey') ? 'checked' : ''}}><label for='pd2'>Survey</label><br>
            <input type='radio'
                   name='projType'
                   id='pd3'
                   value="GIS" {{(old('projType', $project->ProjectType) == 'GIS') ? 'checked' : ''}}><label for='pd3'>GIS</label><br>
            <input type='radio'
                   name='projType'
                   id='pd4'
                   value="Laser Scanning" {{(old('projType', $project->ProjectType) == 'Laser Scanning') ? 'checked' : ''}}><label
                    for='pd4'>Laser Scanning</label><br>
            @if($errors->get('projType'))
                <div class='error'>{{ $errors->first('projType') }}</div>
            @endif
        </fieldset>
        <br>
        <fieldset>
            <legend>Edit project location:</legend>
            <label for='projCity'>Project City: </label>
            <input type='text'
                   id='projCity'
                   name='projCity'
                   placeholder='Example: Providence'
                   value='{{ old('projLoc', $project->City) }}'>


            <select name="projState" id="projState">
                <option value="" selected="selected">Select a State</option>
                <option value='AL'{{(old('projState', $project->State) == 'AL') ? 'selected' : ''}}>Alabama</option>
                <option value='AK'{{(old('projState', $project->State) == 'AK') ? 'selected' : ''}}>Alaska</option>
                <option value='AZ'{{(old('projState', $project->State) == 'AZ') ? 'selected' : ''}}>Arizona</option>
                <option value='AR'{{(old('projState', $project->State) == 'AR') ? 'selected' : ''}}>Arkansas</option>
                <option value='CA'{{(old('projState', $project->State) == 'CA') ? 'selected' : ''}}>California</option>
                <option value='CO'{{(old('projState', $project->State) == 'CO') ? 'selected' : ''}}>Colorado</option>
                <option value='CT'{{(old('projState', $project->State) == 'CT') ? 'selected' : ''}}>Connecticut</option>
                <option value='DE'{{(old('projState', $project->State) == 'DE') ? 'selected' : ''}}>Delaware</option>
                <option value='DC'{{(old('projState', $project->State) == 'DC') ? 'selected' : ''}}>District of Columbia</option>
                <option value='FL'{{(old('projState', $project->State) == 'FL') ? 'selected' : ''}}>Florida</option>
                <option value='GA'{{(old('projState', $project->State) == 'GA') ? 'selected' : ''}}>Georgia</option>
                <option value='HI'{{(old('projState', $project->State) == 'HI') ? 'selected' : ''}}>Hawaii</option>
                <option value='ID'{{(old('projState', $project->State) == 'ID') ? 'selected' : ''}}>Idaho</option>
                <option value='IL'{{(old('projState', $project->State) == 'IL') ? 'selected' : ''}}>Illinois</option>
                <option value='IN'{{(old('projState', $project->State) == 'IN') ? 'selected' : ''}}>Indiana</option>
                <option value='IA'{{(old('projState', $project->State) == 'IA') ? 'selected' : ''}}>Iowa</option>
                <option value='KS'{{(old('projState', $project->State) == 'KS') ? 'selected' : ''}}>Kansas</option>
                <option value='KY'{{(old('projState', $project->State) == 'KY') ? 'selected' : ''}}>Kentucky</option>
                <option value='LA'{{(old('projState', $project->State) == 'LA') ? 'selected' : ''}}>Louisiana</option>
                <option value='ME'{{(old('projState', $project->State) == 'ME') ? 'selected' : ''}}>Maine</option>
                <option value='MD'{{(old('projState', $project->State) == 'MD') ? 'selected' : ''}}>Maryland</option>
                <option value='MA'{{(old('projState', $project->State) == 'MA') ? 'selected' : ''}}>Massachusetts</option>
                <option value='MI'{{(old('projState', $project->State) == 'MI') ? 'selected' : ''}}>Michigan</option>
                <option value='MN'{{(old('projState', $project->State) == 'MN') ? 'selected' : ''}}>Minnesota</option>
                <option value='MI'{{(old('projState', $project->State) == 'MI') ? 'selected' : ''}}>Mississippi</option>
                <option value='MO'{{(old('projState', $project->State) == 'MO') ? 'selected' : ''}}>Missouri</option>
                <option value='MT'{{(old('projState', $project->State) == 'MT') ? 'selected' : ''}}>Montana</option>
                <option value='NE'{{(old('projState', $project->State) == 'NE') ? 'selected' : ''}}>Nebraska</option>
                <option value='NV'{{(old('projState', $project->State) == 'NV') ? 'selected' : ''}}>Nevada</option>
                <option value='NH'{{(old('projState', $project->State) == 'NH') ? 'selected' : ''}}>New Hampshire</option>
                <option value='NJ'{{(old('projState', $project->State) == 'NJ') ? 'selected' : ''}}>New Jersey</option>
                <option value='NM'{{(old('projState', $project->State) == 'NM') ? 'selected' : ''}}>New Mexico</option>
                <option value='NY'{{(old('projState', $project->State) == 'NY') ? 'selected' : ''}}>New York</option>
                <option value='NC'{{(old('projState', $project->State) == 'NC') ? 'selected' : ''}}>North Carolina</option>
                <option value='ND'{{(old('projState', $project->State) == 'ND') ? 'selected' : ''}}>North Dakota</option>
                <option value='OH'{{(old('projState', $project->State) == 'OH') ? 'selected' : ''}}>Ohio</option>
                <option value='OK'{{(old('projState', $project->State) == 'OK') ? 'selected' : ''}}>Oklahoma</option>
                <option value='OR'{{(old('projState', $project->State) == 'OR') ? 'selected' : ''}}>Oregon</option>
                <option value='PA'{{(old('projState', $project->State) == 'PA') ? 'selected' : ''}}>Pennsylvania</option>
                <option value='RI'{{(old('projState', $project->State) == 'RI') ? 'selected' : ''}}>Rhode Island</option>
                <option value='SC'{{(old('projState', $project->State) == 'SC') ? 'selected' : ''}}>South Carolina</option>
                <option value='SD'{{(old('projState', $project->State) == 'SD') ? 'selected' : ''}}>South Dakota</option>
                <option value='TN'{{(old('projState', $project->State) == 'TN') ? 'selected' : ''}}>Tennessee</option>
                <option value='TX'{{(old('projState', $project->State) == 'TX') ? 'selected' : ''}}>Texas</option>
                <option value='UT'{{(old('projState', $project->State) == 'UT') ? 'selected' : ''}}>Utah</option>
                <option value='VT'{{(old('projState', $project->State) == 'VT') ? 'selected' : ''}}>Vermont</option>
                <option value='VA'{{(old('projState', $project->State) == 'VA') ? 'selected' : ''}}>Virginia</option>
                <option value='WA'{{(old('projState', $project->State) == 'WA') ? 'selected' : ''}}>Washington</option>
                <option value='WV'{{(old('projState', $project->State) == 'WV') ? 'selected' : ''}}>West Virginia</option>
                <option value='WI'{{(old('projState', $project->State) == 'WI') ? 'selected' : ''}}>Wisconsin</option>
                <option value='WY'{{(old('projState', $project->State) == 'WY') ? 'selected' : ''}}>Wyoming</option>

            </select>

            @if($errors->get('projLoc'))
                <div class='error'>{{ $errors->first('projCity') }}</div>
            @endif

            @if($errors->get('projState'))
                <div class='error'>{{ $errors->first('projState') }}</div>
            @endif
        </fieldset>
        <br>
        <fieldset>
            <legend>Choose Camera Calibration:</legend>
            <select name='projCalibration[]' id='projCalibration' multiple='multiple'>
                <option value=''>Choose a calibration file:</option>
                @foreach($files as $file)
                    <option value='{{$file->id}}' {{(collect(old('projCalibration')) ->contains ($file->id))? 'selected':''}}>{{    $file->filename}}</option>
                @endforeach
            </select>
            @if($errors->get('projCalibration'))
                <div class='error'>{{ $errors->first('projCalibration') }}</div>
            @endif
        </fieldset>


        <input type='submit' name='save' value='Update project' id='update'>
        <br>
        <br>


    </form>

@endsection