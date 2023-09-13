@extends("template.index")

@section("title")
    {{ ucfirst("sample") }}
@endsection

@section("route-create")
    {{ route("sample.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("material") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td><a href="{{ route("material.show", $data->material_id) }}" target="_blank">{{ $data->material->name }}</a></td>
        <td>
            <form action="{{ route("sample.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("sample.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("sample.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
