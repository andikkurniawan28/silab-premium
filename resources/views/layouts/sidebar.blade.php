<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        @include("layouts.sidebar_list", [
            "icon"  => "speedometer2",
            "title" => "dashboard",
            "route" => route("dashboard"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "people",
            "title" => "user",
            "route" => route("user.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "person-badge",
            "title" => "vendor",
            "route" => route("vendor.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "droplet",
            "title" => "consumable",
            "route" => route("consumable.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "clock-history",
            "title" => "consumable_log",
            "route" => route("consumable_log.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "laptop",
            "title" => "device",
            "route" => route("device.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "clock-history",
            "title" => "device_log",
            "route" => route("device_log.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "book",
            "title" => "method",
            "route" => route("method.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "filter",
            "title" => "category",
            "route" => route("category.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "moisture",
            "title" => "indicator",
            "route" => route("indicator.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "flower2",
            "title" => "material",
            "route" => route("material.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "cup",
            "title" => "sample",
            "route" => route("sample.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "thermometer",
            "title" => "analysis",
            "route" => route("analysis.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "folder",
            "title" => "result",
            "route" => route("result"),
        ])

    </ul>
</aside>
