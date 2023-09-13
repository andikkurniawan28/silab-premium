@extends("template.index")

@section("title")
    {{ ucfirst("analysis") }}
@endsection

@section("route-create")
    {{ route("analysis.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("sample") }}</th>
        <th>{{ ucfirst("indicator") }}</th>
        <th>{{ ucfirst("value") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td><a href="{{ route("sample.show", $data->sample_id) }}" target="_blank">{{ $data->sample->material->name }}</a></td>
        <td><a href="{{ route("indicator.show", $data->indicator_id) }}" target="_blank">{{ $data->indicator->name }}</a></td>
        <td>{{ $data->value }}</td>
        <td>
            <form action="{{ route("analysis.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("analysis.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("analysis.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
