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
            <div class="dashboard-container" id="dashboardContainer">
                <div class="dashboard-header">
                    <h1>Sermons</h1>
                    <hr>
                </div>

                <section class="center-btn-modal">
                    <button id="announcementsmodalBtn" onclick="openModal()"> <i class="fa-solid fa-plus mr-2"></i>
                        Add New Sermon</button>
                </section>

                <div class="dashboard-header">
                    <h1>Latest</h1>
                </div>
                <!-- Carousel -->
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
            </div>

            {{-- modal section  Add announcements --}}
            <div id="modal" class="modal">
                <div class="modal-content">

                    <div class="modal-head">
                        <h2 style="padding-bottom: 20px;">Add Sermon Notes</h2>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-sermon-notes') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="notesupload">Upload Notes</label>
                                <input type="file" class="form-control" name="notesupload" id="notesupload" required>
                            </div>
                            <div class="mb-3"> 
                                <label for="sermondescription">Add Description</label>
                                <textarea class="form-control" name="sermondescription" id="sermondescription" required cols="30" rows="10"
                                    placeholder="Add Description"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Add Event</button>
                                </div>
                                <div>
                                    <button type="button" onclick="closeModal()"
                                        class="btn btn-primary">Cancel</button>
                                </div>
                            </div>

                        </form>




                        {{-- <span class="close">&times;</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.scripts')
    <script src="assets/js/toggle_bar.js"></script>
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
