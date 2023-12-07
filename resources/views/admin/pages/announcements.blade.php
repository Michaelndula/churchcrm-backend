<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    @php
        $announcements = App\Models\Announcement::all();
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
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn" onclick="openModal()"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Announcements</button>
            </section>

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
                                        <a href="">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <section class="modal-section">
                {{-- modal section  Add announcements --}}
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="modal-head">
                            <h4>Add New Announcement</h4>
                            <hr>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="{{ route('new-announcement') }}" method="post" >
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="topic">Add Topic</label>
                                    <input type="text" class="form-control" name="topic" id="topic"
                                        required placeholder="Add Topic">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="message">Add Message</label>
                                    <textarea class="form-control" name="message" id="message" required cols="30" rows="10"
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
        </div>
    </div>
    @include('admin.layout.scripts')
</body>

</html>
