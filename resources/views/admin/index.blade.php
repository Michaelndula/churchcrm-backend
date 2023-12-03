<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    <div class="dashboard-body" id="page-body">
        <div class="navigation-menu">
            <div>
                <!-- Top Navigation Menu -->
                @include('admin.layout.header')
                <!-- Side Navigation Menu -->
                @include('admin.layout.aside')
            </div>
        </div>
        <div>
            @include('admin.layout.body')
        </div>
    </div>
    @include('admin.layout.scripts')
    <script src="assets/js/toggle_bar.js"></script>
</body>

</html>