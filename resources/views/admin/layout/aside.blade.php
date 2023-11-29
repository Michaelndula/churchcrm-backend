<div class="sideNav" id="sideNavbar">
    <ul>
        <li class="nav-link">
            <a href="{{ route('dashboard') }}" >
                <span class="icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="title"> Dashboard </span>
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('users') }}">
                <span class="icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <span class="title">
                    Users
                </span>
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('announcements') }}" >
                <span class="icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </span>
                <span class="title">
                    Announcements
                </span>
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('sermons') }}">
                <span class="icon">
                    <i class="fa-solid fa-book-bible"></i>
                </span>
                <span class="title">
                    Sermons
                </span>
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('sermonsnotes') }}">
                <span class="icon">
                    <i class="fa-solid fa-note-sticky fa-flip-vertical"></i>
                </span>
                <span class="title">
                    Sermon Notes
                </span>
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('events') }}">
                <span class="icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </span>
                <span class="title">
                    Events
                </span>
            </a>
        </li>
       <style>
            /* Add your styling for the active background color here */
            .nav-link.active-link {
            background-color: white;
        }
        .nav-link.active-link a {
            color: blue;
        }
        </style>

    </ul>
</div>
