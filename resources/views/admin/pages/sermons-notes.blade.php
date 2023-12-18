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
                <h1>Sermon Notes</h1>
                <p class="text-danger">{{ session('error') }}</p>
                <hr>
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn" onclick="openModal()"><i class="fa-solid fa-plus mr-2"></i>
                    Add Sermon Notes</button>
            </section>
            <section class="table">
                <div class="form-container">
                    <div>
                        <h4>List of Sermon Notes</h4>
                        <hr>
                    </div>
                    <table class="table">
                        <thead>
                            @php
                                $sermonnotes = App\Models\SermonNotes::OrderBy('id', 'desc')->get();
                            @endphp
                            <tr>
                                <th>Notes</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sermonnotes as $sermonnote)
                                <tr id="sermonnotes_{{ $sermonnote->id }}">
                                    <td><a style="text-decoration: none;" href="{{ secure_asset('SermonNotes/'. $sermonnote->notesupload ) }}" download>
                                    {{ $sermonnote->notesupload }}</a></td>
                                    <td>{{ $sermonnote->sermondescription }}</td>
                                    <td>
                                        <a href="#" class="text-danger"
                                            onclick="deleteSermonNotes({{ $sermonnote->id }})">Delete</a>
                                        <button id="update-user-button" class="view-button" style="font-size: 16px"
                                            onclick="openSermonnotesModal({{ $sermonnote->id }}, '{{ $sermonnote->notesupload }}', '{{ $sermonnote->sermondescription }}')">
                                            View
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </section>
            <style>
                input[type="file"] {
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
            {{-- modal section  add sermon notes --}}
            <div id="modal" class="modal">
                <div class="modal-content">

                    <div class="modal-head">
                        <h4 style="padding-bottom: 20px;"></h4>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-sermon-notes') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">


                                <label>Upload Notes</label><br>
                                <label for="file-upload" class="custom-file-upload">
                                    Upload
                                </label>
                                <input id="file-upload" name="notesupload" type="file" />

                            </div>
                            <div class="form-group mb-4">
                                <label for="sermondescription">Add Description</label>
                                <textarea class="form-control" name="sermondescription" id="sermondescription" required cols="30" rows="10"
                                    placeholder="Add Description"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                    <div>
                                        <button type="button" onclick="closeModal()"
                                            class="btn btn-outline-primary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


            {{-- Update Sermon notes modal --}}
            <div id="sermonnotes-modal" class="modal">
                <div class="modal-content">

                    <div class="modal-head">
                        <h4 style="padding-bottom: 20px;">Update Sermon Notes</h4>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form id="sermonnotes-update-form" action="{{ url('/sermonnotes', $sermonnote->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">

                                <label>Upload Notes</label><br>
                                <label for="file-update" class="custom-file-upload">
                                    Upload
                                </label>
                                <input id="file-update" name="notesupload" type="file" />

                            </div>
                            <div class="form-group mb-4">
                                <label for="sermondescription">Add Description</label>
                                <textarea class="form-control" name="sermondescription" id="update-sermondescription" required cols="30"
                                    rows="10" placeholder="Update Description"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    <div>
                                        <button type="button" onclick="closeSermonnotesModal()"
                                            class="btn btn-outline-primary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
    @include('admin.layout.scripts')
</body>

</html>
