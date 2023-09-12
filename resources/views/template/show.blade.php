@extends("layouts.app")

@section("content")

    <div class="pagetitle">
        <h1>Show @yield("title")</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ ucfirst("dashboard") }}</a></li>
                <li class="breadcrumb-item"><a href="@yield("route-index")">@yield("title")</a></li>
                <li class="breadcrumb-item active">Show @yield("title")</li>
            </ol>
        </nav>
    </div>

    @include("components.alert")

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Show @yield("title")</h5>
                        @yield("form")
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
