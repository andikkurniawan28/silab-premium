@extends("template.table")

@section("title")
    {{ ucfirst("result") }}
@endsection

@section("thead")
    <tr>
        <th>Sample {{ strtoupper("id") }}</th>
        <th>{{ ucfirst("timestamp") }}</th>
        <th>{{ ucfirst("description") }}</th>
        <th>{{ ucfirst("category") }}</th>
        <th>{{ ucfirst("material") }}</th>
        <th>{{ ucfirst("analysis") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->created_at }}</td>
        <td>{{ $data->description }}</td>
        <td>{{ $data->material->category->name }}</td>
        <td>{{ $data->material->name }}</td>
        <td>
            @foreach ($data->analysis as $analysis)
                <li>{{ $analysis->indicator->name }} = {{ $analysis->value }} {{ $analysis->indicator->unit }}</li>
            @endforeach
        </td>
    </tr>
    @endforeach
@endsection
