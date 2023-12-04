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
                <h1>Announcements</h1>
                <hr>
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Announcements</button>
            </section>
            <section class="table">
                <div class="form-container">
                    <div>
                        <h4 style="padding-bottom: 20px;">New App User</h4>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <table id="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Membership Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Membership Status</td>
                            <td>
                                <a href="">Delete</a>
                                <a href="">view</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Membership Status</td>
                            <td>
                                <a href="">Delete</a>
                                <a href="">view</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Membership Status</td>
                            <td>
                                <a href="">Delete</a>
                                <a href="">view</a>
                            </td>
                        </tr>



                    </table>

                </div>

            </section>
            {{-- modal section  Add announcements --}}
            <div id="announcementsmodal" class="modal">
                <div class="modal-content">
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-head">
                        <h2 style="padding-bottom: 20px;">Event Details</h2>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-announcement') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="topic">Event Title</label>
                            <input type="text" class="form-control" name="event-titile" required placeholder="Event Title">
                            <label for="event-date">Event Date</label>
                            <input type="date" class="form-control" placeholder="Event Date" name="eventdate" required>
                            <label for="eventdescription">Description</label>
                            <textarea class="form-control" name="eventdescription" id="eventdescription" required cols="30" rows="10"
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
</body>

</html>
