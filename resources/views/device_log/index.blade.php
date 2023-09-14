@extends("template.index")

@section("title")
    {{ ucfirst("device_log") }}
@endsection

@section("route-create")
    {{ route("device_log.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("description") }}</th>
        {{-- <th>{{ ucfirst("quantity") }}</th> --}}
        <th>{{ ucfirst("device") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->description }}</td>
        {{-- <td>{{ $data->quantity }}</td> --}}
        <td><a href="{{ route("device.show", $data->device_id) }}" target="_blank">{{ $data->device->name }}</a></td>
        <td>
            <form action="{{ route("device_log.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("device_log.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("device_log.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
