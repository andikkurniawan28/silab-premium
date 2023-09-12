@extends("layouts.app")

@section("content")

    <div class="pagetitle">
        <h1>@yield("title")</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ ucfirst("dashboard") }}</a></li>
                <li class="breadcrumb-item active">@yield("title")</li>
            </ol>
        </nav>
    </div>

    @include("components.alert")

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@yield("title")</h5>
                        <p><a href="@yield("route-create")" class="btn btn-primary btn-sm">{{ ucfirst("create") }}</a></p>
                        <table class="table datatable">
                            <thead>
                                @yield("thead")
                            </thead>
                            <tbody>
                                @yield("tbody")
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
