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
        $userId = Illuminate\Support\Facades\Auth::id();
        $user = App\Models\User::where('id', $userId)->first();
        $users = App\Models\User::orderBy('id', 'desc')
            ->take(5)
            ->get();
        $ifusers = App\Models\User::all()->count();
    @endphp
    <header>
        @include('admin.layout.header')
    </header>
    <div class="main-container">
        <div class="navcontainer">
            @include('admin.layout.aside')
        </div>
        <div class="main">
            @include('admin.layout.body')
        </div>
    </div>
    {{-- scripts  --}}
    <script src="assets/js/script.js"></script>
    <script src="assets/js/usermodal.js"></script>
    <script src="assets/js/profilemodal.js"></script>
</body>

</html>
