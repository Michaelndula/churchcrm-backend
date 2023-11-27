<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="https://kit.fontawesome.com/30ef7ac8b3.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="dashboard-body">
        <div class="navigation-menu">
            @include('navigation-menu')
            
        </div>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h3 class="dashboard-heading">Dashboard</h3>
                <hr>
            </div>
            <div class="dashboard-cards-display">
                <div class="dashboard-cards">
                    <p class="card-name">Users</p>
                    <div class="card-text">
                        <span class="card-stats">
                            90
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                    </div>
                    <p class="card-link"><a href="">View all</a></p>
                </div>

                <div class="dashboard-cards">
                    <p class="card-name">Sermons</p>
                    <div class="card-text">
                        <span class="card-stats">
                            150
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-book-bible"></i>
                        </span>
                    </div>
                    <p class="card-link"><a href="">View all</a></p>
                </div>

                <div class="dashboard-cards">
                    <p class="card-name">Announcements</p>
                    <div class="card-text">
                        <span class="card-stats">
                            30
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </span>
                    </div>
                    <p class="card-link"><a href="">View all</a></p>
                </div>

                <div class="dashboard-cards">
                    <p class="card-name">Sermon Notes</p>
                    <div class="card-text">
                        <span class="card-stats">
                            50
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-note-sticky fa-flip-vertical"></i>
                        </span>
                    </div>
                    <p class="card-link"><a href="">View all</a></p>
                </div>

                <div class="dashboard-cards">
                    <p class="card-name">Events</p>
                    <div class="card-text">
                        <span class="card-stats">
                            10
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                    </div>
                    <p class="card-link"><a href="">View all</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>