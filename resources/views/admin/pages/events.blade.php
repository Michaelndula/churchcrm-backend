<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')

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
                <button id="announcementsmodalBtn" onclick="openModal()"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Event</button>
            </section>
            <section class="events-carousel">
                <div class="dashboard-header">
                    <h1>Upcoming</h1>
                </div>

                <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                    <div class="carousel-inner w-100">
                        @php
                            $events = App\Models\Event::all();
                        @endphp
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card card-body">
                                    one
                                    <img style="height: 300px;" class="img-fluid" src="http://placehold.it/380?text=1">
                                </div>
                            </div>
                        </div>
                        @foreach ($events as $event)
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card card-body">
                                        one
                                        <img style="height: 300px;" class="img-fluid"
                                            src="EventImages/{{ $event->Img_Path }}">
                                        <h5>{{ $event->Event_Title }}</h5>
                                        <p>{{ $event->Event_Description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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
            </section>

        </div>
        {{-- modal section  Add Event --}}
        <div id="modal" class="modal">
            <div class="modal-content">
                <div class="modal-head">
                    <h2 style="padding-bottom: 20px;">Add Event</h2>
                    <hr style="margin-bottom: 20px;">
                </div>
                <div class="modal-body">
                    <form action="{{ route('new-event') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="eventupload">
                        </div>

                        <div class="mb-3">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" name="event_title" required
                                placeholder="Event Title">
                        </div>

                        <div class="mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" name="event_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="event_description" class="form-label">Description</label>
                            <textarea class="form-control" name="event_description" id="event_description" required cols="30" rows="10"
                                placeholder="Add Description"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-primary">Add Event</button>
                            </div>
                            <div>
                                <button type="button" onclick="closeModal()" class="btn btn-primary">Cancel</button>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.scripts')
    <script>
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 100000
        })

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
