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
                    Add New Event</button>
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
                        @php
                            $events = App\Models\Event::all();
                        @endphp
                        @foreach ($events as $event)
                           <tr  id="event_{{ $event->id }}">
                            <td>{{$event->Event_Title}}</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Membership Status</td>
                            <td>
                                <a href="#" class="text-danger" onclick="deleteEvent({{ $event->id }})">Delete</a>
                                <a href="">view</a>
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                </div>
            </section>
            {{-- modal section  Add Event --}}
            <div id="announcementsmodal" class="modal">
                <div class="modal-content">
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-head">
                        <h2 style="padding-bottom: 20px;">Add Event</h2>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-event') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="image">Image</label>
                            <input type="file" id="image" class="form-control" name="eventupload">
                            <label for="topic">Event Title</label>
                            <input type="text" class="form-control" name="event_title" required placeholder="Event Title">
                            <label for="event-date">Event Date</label>
                            <input type="date" class="form-control" placeholder="Event Date" name="event_date" required>
                            <label for="eventdescription">Description</label>
                            <textarea class="form-control" name="event_description" id="eventdescription" required cols="30" rows="10"
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
