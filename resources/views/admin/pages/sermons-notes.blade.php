<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    @php
        $sermons = App\Models\SermonNotes::all();
    @endphp
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

                            <tr>
                                <th>Notes</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sermons as $sermon)
                                <tr id="sermonnotes_{{ $sermon->id }}">
                                    <td>{{ $sermon->notesupload }}</td>
                                    <td>{{ $sermon->sermondescription }}</td>
                                    <td>
                                        <a href="#" class="text-danger"
                                            onclick="deleteSermonNotes({{ $sermon->id }})">Delete</a>
                                        <a href="">view</a>
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
                            <div class="form-group mb-4">
                              

                                <label >Upload Notes</label><br>
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
        </div>


    </div>
    @include('admin.layout.scripts')
</body>

</html>
