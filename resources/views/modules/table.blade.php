

@if(isset($projects))

    @if(count($projects) == 0)
        <p>No matches found.</p>
    @else

            <div class='projectResults'>
            <table>
                    <caption>Search Results:</caption>
                    <tr>
                        <th>Project</th>
                        <th>Year</th>
                        <th>Type</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project['ProjectID']}}</td>
                        <td>{{$project['Year']}}</td>
                        <td>{{$project['ProjectType']}}</td>
                        <td>{{$project['City']}}</td>
                        <td>{{$project['State']}}</td>
                    </tr>
                @endforeach
                </table>

            </div>

    @endif
@endif