<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    @php
        $announcements = App\Models\Announcement::OrderBy('id', 'desc')->get();
    @endphp
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
                <h1>Announcements</h1>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn" onclick="openModal()">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Add New Announcements
                </button>
            </section>

            {{-- modal section  Add announcements --}}
            <section class="modal-section">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="modal-head">
                            <h4>Add New Announcement</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="{{ route('new-announcement') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="poster">Add Poster</label>
                                    <input type="file" class="form-control" name="poster" id="poster" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="Topic">Add Topic</label>
                                    <input type="text" class="form-control" name="Topic" id="topic" required
                                        placeholder="Add Topic">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="Message">Add Message</label>
                                    <textarea class="form-control" name="Message" id="Message" required cols="30" rows="10"
                                        placeholder="Add Message"></textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Add Announcement</button>
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
            </section>
            <section>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-transparent">
                            <h4>List of Announcements</h4>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Topic</th>
                                    <th>Messsage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($announcements as $announcement)
                                    <tr id="announcement_{{ $announcement->id }}">
                                        <td>{{ $announcement->Topic }}</td>
                                        <td>{{ $announcement->Message }}</td>
                                        <td>
                                            <a href="#" class='text-danger'
                                                onclick="deleteAnnouncement({{ $announcement->id }})">Delete</a>
                                            <button id="update-user-button" class="view-button" style="font-size: 16px"
                                                onclick="openAnnouncementModal({{ $announcement->id }}, '{{ $announcement->Topic }}', '{{ $announcement->Message }}')">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </section>
            {{-- Announcements update modal --}}
            @if (isset($announcement))
                <div id="announcements-modal" class="modal">
                    <div class="modal-content">
                        <div class="modal-head">
                            <h4>{{ isset($announcement) ? $announcement->Topic : '' }}</h4>
                            <hr>
                        </div>
                        <div class="modal-body">
                            <form class="form" id="announcement-update-form"
                                action="{{ url('/announcements', $announcement->id) }}" method="post">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="topic">Update Topic</label>
                                    <input type="text" class="form-control" name="Topic" id="update-topic" required
                                        placeholder="Update Topic"
                                        value="{{ isset($announcement) ? $announcement->Topic : '' }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="Message">Update Message</label>
                                    <textarea class="form-control" name="Message" id="update-message" required cols="30" rows="10"
                                        placeholder="Update Message"></textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Update Announcement</button>
                                        </div>
                                        <div>
                                            <button type="button" onclick="closeAnnouncementModal()"
                                                class="btn btn-outline-primary">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    @include('admin.layout.scripts')
</body>

</html>
