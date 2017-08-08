@if(isset($contests)&& count($contests)>0)
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gratification</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        </thead>
        <tbody>

        @foreach($contests as $contest)

            <tr>
                <td>{{$contest->id}}</td>
                <td>{{$contest->name}}</td>
                <td>{{$contest->gratification()->grat_name}}</td>
                <td>{{$contest->start_date}}</td>
                <td>{{$contest->end_date}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
        {!! $contests->render() !!}
@else
    <p class="text-warning">No Contests yet</p>
@endif