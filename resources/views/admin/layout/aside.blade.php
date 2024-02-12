<nav class="nav">
    <div class="nav-upper-options">
        <p class="nav-link">
            <a href="{{ route('dashboard') }}">
                <span class="icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="title"> Dashboard </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('users') }}">
                <span class="icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="title">
                    Users
                </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('announcements') }}">
                <span class="icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </span>
                <span class="title">
                    Announcements
                </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('sermons') }}">
                <span class="icon">
                    <i class="fa-solid fa-book-bible"></i>
                </span>
                <span class="title">
                    Sermons
                </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('sermonsnotes') }}">
                <span class="icon">
                    <i class="fa-solid fa-note-sticky fa-flip-vertical"></i>
                </span>
                <span class="title">
                    Sermon Notes
                </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('events') }}">
                <span class="icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </span>
                <span class="title">
                    Events
                </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('profile') }}">
                <span class="icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <span class="title">
                    Profile
                </span>
            </a>
        </p>
        <p class="nav-link">
            <a href="{{ route('settings') }}">
                <span class="icon">
                    <i class="fa fa-cog"></i>
                </span>
                <span class="title">
                    Admin
                </span>
            </a>
        </p>
    </div>
</nav>
