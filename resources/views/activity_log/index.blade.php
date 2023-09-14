@extends("template.table")

@section("title")
    {{ ucfirst("activity_log") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("timestamp") }}</th>
        <th>{{ ucfirst("user") }}</th>
        <th>{{ ucfirst("description") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->created_at }}</td>
        <td>{{ $data->user->name }}</td>
        <td>{{ $data->description }}</td>
    </tr>
    @endforeach
@endsection
