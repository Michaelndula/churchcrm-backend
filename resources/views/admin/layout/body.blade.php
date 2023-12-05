<div class="dashboard-container" id="dashboardContainer">
    <div class="dashboard-header">
        <h1>Dashboard</h1>
        <hr>
    </div>
    <div class="dashboard-cards-display">

        <div class="dashboard-cards">
            <p class="card-name">Users</p>
            <div class="card-text">
                <span class="card-stats">
                    {{ $totalusers }}
                </span>
                <span class="icon">
                    <i class="fa-solid fa-user"></i>
                </span>
            </div>
            <p class="card-link"><a href="{{ route('users') }}">View all</a></p>
        </div>

        <div class="dashboard-cards">
            <p class="card-name">Sermons</p>
            <div class="card-text">
                <span class="card-stats">
                    {{ $totalsermons }}
                </span>
                <span class="icon">
                    <i class="fa-solid fa-book-bible"></i>
                </span>
            </div>
            <p class="card-link"><a href="{{ route('sermons') }}">View all</a></p>
        </div>

        <div class="dashboard-cards">
            <p class="card-name">Announcements</p>
            <div class="card-text">
                <span class="card-stats">
                    {{ $totalannouncements }}
                </span>
                <span class="icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </span>
            </div>
            <p class="card-link"><a href="{{ route('announcements') }}">View all</a></p>
        </div>

        <div class="dashboard-cards">
            <p class="card-name">Sermon Notes</p>
            <div class="card-text">
                <span class="card-stats">
                    {{ $totalsermonsnotes }}
                </span>
                <span class="icon">
                    <i class="fa-solid fa-note-sticky fa-flip-vertical"></i>
                </span>
            </div>
            <p class="card-link"><a href="{{ route('sermonsnotes') }}">View all</a></p>
        </div>

        <div class="dashboard-cards">
            <p class="card-name">Events</p>
            <div class="card-text">
                <span class="card-stats">
                    {{ $totalevents }}
                </span>
                <span class="icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </span>
            </div>
            <p class="card-link"><a href="{{ route('events') }}">View all</a></p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-transparent">
                <h4>New App Users</h4>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Membership Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $users = App\Models\User::OrderBy('id', 'desc')->take(5)
                            ->get();
      
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td></td>
                            <td>
                                <a href="">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


        <script src="assets/js/toggle_bar.js"></script>
    </div>
</div>
