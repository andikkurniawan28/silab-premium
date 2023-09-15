@extends("layouts.app")

@section("content")

    <div class="pagetitle">
        <h1>{{ ucfirst("dashboard") }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{ ucfirst("dashboard") }}</li>
            </ol>
        </nav>
    </div>

    @include("components.alert")

    <section class="section dashboard">
        <div class="row">

            @include("components.dashboard_card", [
                "title"         => "user",
                "description"   => "active",
                "value"         => $data["user"],
                "icon"          => "person",
            ])

            @include("components.dashboard_card", [
                "title"         => "sample",
                "description"   => "today",
                "value"         => $data["sample"],
                "icon"          => "cup",
            ])

            @include("components.dashboard_card", [
                "title"         => "analysis",
                "description"   => "today",
                "value"         => $data["analysis"],
                "icon"          => "thermometer",
            ])

            @include("components.line_chart")

            @include("components.traffic_chart", [
                "data"          => $data["material"],
            ])

        </div>
    </section>

@endsection
