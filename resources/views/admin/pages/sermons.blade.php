<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
    <style>
        .file {
            display: none;
        }

        .custom-file-upload {
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: var(--blue);
            color: var(--white);
            padding-left: 10px;
        }
    </style>
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
                        <h1 class="margin-top 20">Latest</h1>
                    </div>
                    {{-- cards display --}}
                    <div class="cover">
                        <button class="circle-icon left" onclick="leftScroll()">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <div class="scroll-images">
                            @php
                                $sermons = App\Models\Sermons::all();
                            @endphp
                            @foreach ($sermons as $sermon)
                                <div class="scroll-card">
                                    <div class="card-body">
                                        <img style="height: 200px; width: 300px;" alt="image"
                                            src="SermonThumbnails/{{ $sermon->Thumbnail }}">

                                        <h4 class="card-title">{{ $sermon->Title }}</h4>
                                        <small>
                                            <p class="card-text">{{ $sermon->Sermon_Link }}</p>
                                        </small>
                                        <p class="card-text">
                                            {{ $sermon->Sermon_Description }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class=" circle-icon right" onclick="rightScroll()">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>




                    <div class="dashboard-header">
                        <h4 class="margin-top 20">Latest</h4>
                    </div>
                    {{-- cards display --}}
                    <div class="cover">
                        <button class="circle-icon left" onclick="leftScroll()">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <div class="scroll-images">
                            @php
                                $sermons = App\Models\Sermons::all();
                            @endphp
                            @foreach ($sermons as $sermon)
                                <div class="scroll-card">
                                    <div class="card-body">
                                        <img style="height: 200px; width: 300px;" alt="image"
                                            src="SermonThumbnails/{{ $sermon->Thumbnail }}">

                                        <h4 class="card-title">{{ $sermon->Title }}</h4>
                                        <small>
                                            <p class="card-text">{{ $sermon->Sermon_Link }}</p>
                                        </small>
                                        <p class="card-text">
                                            {{ $sermon->Sermon_Description }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="circle-icon right" onclick="rightScroll()">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                </section>
            </div>

            {{-- modal section  Add announcements --}}
            <div id="modal" class="modal">
                <div class="modal-content">

                    <div class="modal-head">
                        <h4>New Sermon</h4>
                        <hr>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-sermons') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="Title">Sermon Title</label>
                                <input type="text" class="form-control" name="Title" id="Title"
                                    placeholder="Sermon Title" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-group mb-4">
                                    <label>Upload sermon notes</label><br>
                                    <label for="Sermon_Notes" class="custom-file-upload">
                                        Attach </label>
                                    <input type="file" class="file" name="Sermon_Notes" id="Sermon_Notes" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Sermon_Link">Sermon Link</label>
                                <input type="text" class="form-control" name="Sermon_Link" id="Sermon_Link"
                                    placeholder="Sermon Link">
                            </div>
                            <div class="mb-3">
                                <div class="form-group mb-4">
                                    <label>Upload Thumbnail</label><br>
                                    <label for="Thumbnail" class="custom-file-upload">
                                        Upload</label>
                                    <input type="file" class="file" name="Thumbnail" id="Thumbnail" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Sermon_Description" class="form-label">Sermon Description</label>
                                <textarea class="form-control" name="Sermon_Description" id="Sermon_Description" required cols="30" rows="10"
                                    placeholder="Sermon Description"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Add Sermon</button>
                                </div>
                                <div>
                                    <button type="button" onclick="closeModal()"
                                        class="btn btn-outline-primary">Cancel</button>
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
</body>

</html>
