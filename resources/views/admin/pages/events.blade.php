<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
    <style>
        @media (max-width: 768px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-start,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
            // transition-duration: 10s;
        }

        /* display 4 */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next,
            .carousel-item-next:not(.carousel-item-start) {
                transform: translateX(25%) !important;
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-item-prev:not(.carousel-item-end),
            .active.carousel-item-start,
            .carousel-item-prev:not(.carousel-item-end) {
                transform: translateX(-25%) !important;
            }

            .carousel-item-next.carousel-item-start,
            .active.carousel-item-end {
                transform: translateX(0) !important;
            }

            .carousel-inner .carousel-item-prev,
            .carousel-item-prev:not(.carousel-item-end) {
                transform: translateX(-25%) !important;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-body">
        <div class="navigation-menu">
            <div>
                <!-- Top Navigation Menu -->
                @include('admin.layout.header')
                <!-- Side Navigation Menu -->
                @include('admin.layout.aside')
            </div>
        </div>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Events</h1>
                <hr>
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Event</button>
            </section>
            <section class="events-carousel">
                <div class="dashboard-header">
                    <h1>Upcoming</h1>
                </div>






                <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                    <div class="carousel-inner w-100">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=1">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=2">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=3">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=4">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=5">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=6">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=7">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    <img class="img-fluid" src="http://placehold.it/380?text=8">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>



        </div>
        </section>
        {{-- modal section  Add Event --}}
        <div id="announcementsmodal" class="modal">
            <div class="modal-content">
                <div>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-head">
                    <h2 style="padding-bottom: 20px;">Add Event</h2>
                    <hr style="margin-bottom: 20px;">
                </div>
                <div class="modal-body">
                    <form action="{{ route('new-event') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" name="eventupload">
                        <label for="topic">Event Title</label>
                        <input type="text" class="form-control" name="event_title" required
                            placeholder="Event Title">
                        <label for="event-date">Event Date</label>
                        <input type="date" class="form-control" placeholder="Event Date" name="event_date" required>
                        <label for="eventdescription">Description</label>
                        <textarea class="form-control" name="event_description" id="eventdescription" required cols="30" rows="10"
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
    <script>
        // var myCarousel = document.querySelector('#myCarousel')
        // var carousel = new bootstrap.Carousel(myCarousel, {
        //   interval: 100000
        // })

        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 4;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
</body>

</html>
