@if($message = Session::get('success'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{ $message }}
    </div>
@endif

@if($message = Session::get('fail'))
    <div class="alert alert-success bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        {{ $message }}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-success bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        <p>Error :</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif
