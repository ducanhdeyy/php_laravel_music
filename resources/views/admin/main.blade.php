<!doctype html>
<html lang="en">

<head>
    @include("admin/common/head")
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    @include('admin/common/nav')
    <div class="app-main">
        @include('admin/common/slider')
        <div class="app-main__outer">
        @yield('content')
            @include('admin/common/footer')
        </div>
    </div>
</div>
@include('admin/common/js')

</body>

</html>
