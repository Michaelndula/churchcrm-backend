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
                <h1>Announcements</h1>
                <p class="text-danger">{{ session('error') }}</p>

                <hr>
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn" onclick="openModal()"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Sermon</button>
            </section>
            <section class="table">
                <div class="form-container">
                    <div>
                        <h4 style="padding-bottom: 20px;">New App User</h4>

                        <hr style="margin-bottom: 20px;">
                    </div>
                    <table id="table">
                        <tr>
                            <th>Notes</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($sermons as $sermon)
                            <tr id="sermonnotes_{{ $sermon->id }}">
                            <td>{{$sermon->notesupload}}</td>
                            <td>{{$sermon->sermondescription}}</td>
                            <td>
                                <a href="#" class="text-danger" onclick="deleteSermonNotes({{ $sermon->id }})">Delete</a>
                                <a href="">view</a>
                            </td>
                        </tr>
                        @endforeach    
                    </table>
                </div>
            </section>
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
                            <label for="notesupload">Upload Notes</label>
                            <input type="file" class="form-control" name="notesupload" id="notesupload" required>
                            <label for="sermondescription">Add Description</label>
                            <textarea class="form-control" name="sermondescription" id="sermondescription" required cols="30" rows="10"
                                placeholder="Add Description"></textarea>
                            
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Add Event</button>
                                </div>
                                <div>
                                    <button type="button" onclick="closeModal()" class="btn btn-primary">Cancel</button>
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
</body>

</html>
