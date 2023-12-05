<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    @php
    $totalusers = App\Models\User::count();
    $totalannouncements = App\Models\Announcement::count();
    $totalsermons = App\Models\Sermons::count();
    $totalsermonsnotes = App\Models\SermonNotes::count();
    $totalevents = App\Models\Event::count();

    @endphp
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