@extends('layouts.master')

@section('title')
    WSP Geospatial Job Tracker
@endsection

@section('content')

    <!-- Creates entry form -->

    <form method='POST' action='/enter-data'>
        {{ csrf_field() }}


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
            <input type='radio'
                   name='projType'
                   value="Photogrammetry" {{(old('projType') == 'Photogrammetry') ? 'checked' : ''}}>Photogrammetry<br>
            <input type='radio' name='projType' value="Survey" {{(old('projType') == 'Survey') ? 'checked' : ''}}>Survey<br>
            <input type='radio' name='projType' value="GIS" {{(old('projType') == 'GIS') ? 'checked' : ''}}>GIS<br>
            <input type='radio'
                   name='projType'
                   value="Laser Scanning" {{(old('projType') == 'Laser Scanning') ? 'checked' : ''}}>Laser Scanning<br>
            @if($errors->get('projType'))
                <div class='error'>{{ $errors->first('projType') }}</div>
            @endif
        </fieldset>
        <br>
        <fieldset>
            <legend>Location:</legend>
            <label for='projLoc'>Project Location:</label>
            <input type='text'
                   id='projLoc'
                   name='projLoc'
                   placeholder='Example: Providence, RI'
                   value='{{ old('projLoc') }}'>


            <select name="projState" id="projState">
                <option value="" selected="selected">Select a State</option>
                <option value='AL'{{(old('projState') == 'AL') ? 'selected' : ''}}>Alabama</option>
                <option value='AK'{{(old('projState') == 'AK') ? 'selected' : ''}}>Alaska</option>
                <option value='AZ'{{(old('projState') == 'AZ') ? 'selected' : ''}}>Arizona</option>
                <option value='AR'{{(old('projState') == 'AR') ? 'selected' : ''}}>Arkansas</option>
                <option value='CA'{{(old('projState') == 'CA') ? 'selected' : ''}}>California</option>
                <option value='CO'{{(old('projState') == 'CO') ? 'selected' : ''}}>Colorado</option>
                <option value='CT'{{(old('projState') == 'CT') ? 'selected' : ''}}>Connecticut</option>
                <option value='DE'{{(old('projState') == 'DE') ? 'selected' : ''}}>Delaware</option>
                <option value='DC'{{(old('projState') == 'DC') ? 'selected' : ''}}>District of Columbia</option>
                <option value='FL'{{(old('projState') == 'FL') ? 'selected' : ''}}>Florida</option>
                <option value='GA'{{(old('projState') == 'GA') ? 'selected' : ''}}>Georgia</option>
                <option value='HI'{{(old('projState') == 'HI') ? 'selected' : ''}}>Hawaii</option>
                <option value='ID'{{(old('projState') == 'ID') ? 'selected' : ''}}>Idaho</option>
                <option value='IL'{{(old('projState') == 'IL') ? 'selected' : ''}}>Illinois</option>
                <option value='IN'{{(old('projState') == 'IN') ? 'selected' : ''}}>Indiana</option>
                <option value='IA'{{(old('projState') == 'IA') ? 'selected' : ''}}>Iowa</option>
                <option value='KS'{{(old('projState') == 'KS') ? 'selected' : ''}}>Kansas</option>
                <option value='KY'{{(old('projState') == 'KY') ? 'selected' : ''}}>Kentucky</option>
                <option value='LA'{{(old('projState') == 'LA') ? 'selected' : ''}}>Louisiana</option>
                <option value='ME'{{(old('projState') == 'ME') ? 'selected' : ''}}>Maine</option>
                <option value='MD'{{(old('projState') == 'MD') ? 'selected' : ''}}>Maryland</option>
                <option value='MA'{{(old('projState') == 'MA') ? 'selected' : ''}}>Massachusetts</option>
                <option value='MI'{{(old('projState') == 'MI') ? 'selected' : ''}}>Michigan</option>
                <option value='MN'{{(old('projState') == 'MN') ? 'selected' : ''}}>Minnesota</option>
                <option value='MI'{{(old('projState') == 'MI') ? 'selected' : ''}}>Mississippi</option>
                <option value='MO'{{(old('projState') == 'MO') ? 'selected' : ''}}>Missouri</option>
                <option value='MT'{{(old('projState') == 'MT') ? 'selected' : ''}}>Montana</option>
                <option value='NE'{{(old('projState') == 'NE') ? 'selected' : ''}}>Nebraska</option>
                <option value='NV'{{(old('projState') == 'NV') ? 'selected' : ''}}>Nevada</option>
                <option value='NH'{{(old('projState') == 'NH') ? 'selected' : ''}}>New Hampshire</option>
                <option value='NJ'{{(old('projState') == 'NJ') ? 'selected' : ''}}>New Jersey</option>
                <option value='NM'{{(old('projState') == 'NM') ? 'selected' : ''}}>New Mexico</option>
                <option value='NY'{{(old('projState') == 'NY') ? 'selected' : ''}}>New York</option>
                <option value='NC'{{(old('projState') == 'NC') ? 'selected' : ''}}>North Carolina</option>
                <option value='ND'{{(old('projState') == 'ND') ? 'selected' : ''}}>North Dakota</option>
                <option value='OH'{{(old('projState') == 'OH') ? 'selected' : ''}}>Ohio</option>
                <option value='OK'{{(old('projState') == 'OK') ? 'selected' : ''}}>Oklahoma</option>
                <option value='OR'{{(old('projState') == 'OR') ? 'selected' : ''}}>Oregon</option>
                <option value='PA'{{(old('projState') == 'PA') ? 'selected' : ''}}>Pennsylvania</option>
                <option value='RI'{{(old('projState') == 'RI') ? 'selected' : ''}}>Rhode Island</option>
                <option value='SC'{{(old('projState') == 'SC') ? 'selected' : ''}}>South Carolina</option>
                <option value='SD'{{(old('projState') == 'SD') ? 'selected' : ''}}>South Dakota</option>
                <option value='TN'{{(old('projState') == 'TN') ? 'selected' : ''}}>Tennessee</option>
                <option value='TX'{{(old('projState') == 'TX') ? 'selected' : ''}}>Texas</option>
                <option value='UT'{{(old('projState') == 'UT') ? 'selected' : ''}}>Utah</option>
                <option value='VT'{{(old('projState') == 'VT') ? 'selected' : ''}}>Vermont</option>
                <option value='VA'{{(old('projState') == 'VA') ? 'selected' : ''}}>Virginia</option>
                <option value='WA'{{(old('projState') == 'WA') ? 'selected' : ''}}>Washington</option>
                <option value='WV'{{(old('projState') == 'WV') ? 'selected' : ''}}>West Virginia</option>
                <option value='WI'{{(old('projState') == 'WI') ? 'selected' : ''}}>Wisconsin</option>
                <option value='WY'{{(old('projState') == 'WY') ? 'selected' : ''}}>Wyoming</option>

            </select>

            @if($errors->get('projLoc'))
                <div class='error'>{{ $errors->first('projLoc') }}</div>
            @endif

            @if($errors->get('projState'))
                <div class='error'>{{ $errors->first('projState') }}</div>
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

@endsection