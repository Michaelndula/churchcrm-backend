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
        <div class="dashboard-container" id="dashboardContainer">
            <div class="dashboard-header">
                <h1>Events</h1>
                <hr>
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Event</button>
            </section>
            <div class="dashboard-header">
                <h1 style="padding-top: 20px;">Upcoming</h1>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="carousel-nav-buttons">
                    <a href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </a>
                </div>
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
                    </div>
                </div>

                <div class="carousel-nav-buttons">
                    <a href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <!-- Past Events -->
            <div class="dashboard-header">
                <h1 style="padding-top: 20px;">Past</h1>
            </div>

            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="carousel-nav-buttons">
                    <a href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </a>
                </div>
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                        <div class="card-body">
                                            <h4 class="card-title">Title</h4>
                                            <p class="card-text" style="margin-bottom: 20px;"><small class="text-muted">01/12/2023</small></p>
                                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quis accusantium, nam similique quas ut quidem libero quod, molestias repellat, ipsam alias numquam? Ut temporibus omnis magni sequi non obcaecati.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
                    </div>
                </div>

                <div class="carousel-nav-buttons">
                    <a href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            {{-- modal section  Add announcements --}}
            <div id="announcementsmodal" class="modal">
                <div class="modal-content">
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-head">
                        <h2 style="padding-bottom: 20px;">Event Details</h2>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-announcement') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <label for="topic">Add Topic</label>
                            <input type="text" class="form-control" name="topic" required placeholder="Add Topic">
                            <label for="message">Add Message</label>
                            <textarea class="form-control" name="message" id="message" required cols="30" rows="10" placeholder="Add Message"></textarea>

                            <label for="topic">Event Title</label>
                            <input type="text" class="form-control" name="event-titile" required placeholder="Event Title">
                            <label for="event-date">Event Date</label>
                            <input type="date" class="form-control" placeholder="Event Date" name="eventdate" required>
                            <label for="eventdescription">Description</label>
                            <textarea class="form-control" name="eventdescription" id="eventdescription" required cols="30" rows="10"
                                placeholder="Add Description"></textarea>

                            <div class="auth">
                                <button>Add</button>
                            </div>

                        </form>
                        {{-- <span class="close">&times;</span> --}}

                    </div>
                </div>

            </div>
        </div>


    </div>
    @include('admin.layout.scripts')
</body>

</html>