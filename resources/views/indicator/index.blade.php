@extends("template.index")

@section("title")
    {{ ucfirst("indicator") }}
@endsection

@section("route-create")
    {{ route("indicator.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("name") }}</th>
        <th>{{ ucfirst("unit") }}</th>
        <th>{{ ucfirst("device") }}</th>
        <th>{{ ucfirst("method") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->unit }}</td>
        <td><a href="{{ route("device.show", $data->device_id) }}" target="_blank">{{ $data->device->name }}</a></td>
        <td><a href="{{ route("method.show", $data->method_id) }}" target="_blank">{{ $data->method->name }}</a></td>
        <td>
            <form action="{{ route("indicator.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("indicator.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("indicator.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
