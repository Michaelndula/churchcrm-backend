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



                <section>
                    <div class="dashboard-header">
                        <h1>Latest</h1>
                    </div>
                    {{-- cards display --}}
                    <div class="cover">
                        <button class="left" onclick="leftScroll()">
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <div class="scroll-images">
                            @php
                                $events = App\Models\Event::all();
                            @endphp
                            @foreach ($events as $event)
                                <div class="scroll-card">
                                    <div class="card-body">
                                        <img style="height: 200px; width: 300px;" alt="image"
                                            src="EventImages/{{ $event->Img_Path }}">

                                        <h4 class="card-title">{{ $event->Event_Title }}</h4>
                                        <small>
                                            <p class="card-text">{{ $event->Event_Date }}</p>
                                        </small>
                                        <p class="card-text">
                                            {{ $event->Event_Description }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="right" onclick="rightScroll()">
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </div>




                    <div class="dashboard-header">
                        <h1>Latest</h1>
                    </div>
                    {{-- cards display --}}
                    <div class="cover">
                        <button class="left" onclick="leftScroll()">
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <div class="scroll-images">
                            @php
                                $events = App\Models\Event::all();
                            @endphp
                            @foreach ($events as $event)
                                <div class="scroll-card">
                                    <div class="card-body">
                                        <img style="height: 200px; width: 300px;" alt="image"
                                            src="EventImages/{{ $event->Img_Path }}">

                                        <h4 class="card-title">{{ $event->Event_Title }}</h4>
                                        <small>
                                            <p class="card-text">{{ $event->Event_Date }}</p>
                                        </small>
                                        <p class="card-text">
                                            {{ $event->Event_Description }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="right" onclick="rightScroll()">
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </div>

                </section>





            </div>

            {{-- modal section  Add announcements --}}
            <div id="modal" class="modal">
                <div class="modal-content">

                    <div class="modal-head">
                        <h4 style="padding-bottom: 20px;">Add Sermon Notes</h4>
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
