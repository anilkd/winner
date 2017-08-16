<style>
    <?php include(public_path().'/css/bootstrap.css');?>
</style>
<div class="container">
    <img src="img/rsz_fever.jpg" width="150" height="150" alt="">
    <h3>{{$show->show_name}} - Live Contests</h3>

    <table class="table table-striped table-hover ">
        <thead class="thead">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gratification</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Available Gifts</th>
            <th>Current winners</th>
        </tr>
        </thead>
        <tbody>

        @foreach($contests as $contest)

        <tr>
            {{--
            <td>{{$contest-gratification()}}</td>
            --}}
            <td>{{$contest->id}}</td>
            <td>{{$contest->name}}</td>
            <td>{{$contest->grat_id}}</td>
            <td>{{$contest->start_date}}</td>
            <td>{{$contest->end_date}}</td>
            <td>{{$contest->pivot->winner_count}}</td>
            <td>{{count($contest->winners)}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
