@extends("template.index")

@section("title")
    {{ ucfirst("consumable") }}
@endsection

@section("route-create")
    {{ route("consumable.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("name") }}</th>
        <th>{{ ucfirst("vendor") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td><a href="{{ route("vendor.show", $data->vendor_id) }}" target="_blank">{{ $data->vendor->name }}</a></td>
        <td>
            <form action="{{ route("consumable.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("consumable.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("consumable.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
