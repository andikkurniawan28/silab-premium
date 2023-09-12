<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        @include("layouts.sidebar_list", [
            "icon"  => "grid",
            "title" => "dashboard",
            "route" => route("dashboard"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "grid",
            "title" => "vendor",
            "route" => route("vendor.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "grid",
            "title" => "consumable",
            "route" => route("consumable.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "grid",
            "title" => "device",
            "route" => route("device.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "grid",
            "title" => "category",
            "route" => route("category.index"),
        ])

        @include("layouts.sidebar_list", [
            "icon"  => "grid",
            "title" => "indicator",
            "route" => route("indicator.index"),
        ])

    </ul>
</aside>
