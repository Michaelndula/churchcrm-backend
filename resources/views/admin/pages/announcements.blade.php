<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    @php
        $announcements = App\Models\Announcement::all();
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
                <hr>
            </div>
            <section class="center-btn-modal">
                <button id="announcementsmodalBtn"><i class="fa-solid fa-plus mr-2"></i>
                    Add New Announcements</button>
            </section>
            <section class="table">
                <div class="form-container">
                    <div>
                        <h4 style="padding-bottom: 20px;">List Of Announcements</h4>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <table id="table">
                        <tr>
                            <th>Topic</th>
                            <th>Messsage</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($announcements as $announcement)
                           <tr>
                                <td>{{$announcement->Topic}}</td>
                                <td>{{$announcement->Message}}</td>
                                <td>
                                    <a href="delete/{{$announcement->id}}">Delete</a>
                                    <a href="">view</a>
                                </td>
                            </tr> 
                        @endforeach
                    </table>
                </div>
            </section>
            <section class="modal-section">
            {{-- modal section  Add announcements --}}

            <div id="announcementsmodal" class="modal">
                <div class="modal-content">
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-head">
                        <h2 style="padding-bottom: 20px;">Add New Announcement</h2>
                        <hr style="margin-bottom: 20px;">
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('new-announcement') }}" method="post">
                            @csrf
                            <label for="topic">Add Topic</label>
                            <input type="text" class="form-control" name="topic" id="topic" required placeholder="Add Topic">
                            <label for="message">Add Message</label>
                            <textarea class="form-control" name="message" id="message" required cols="30" rows="10"
                                placeholder="Add Message"></textarea>
                            <div class="auth">
                                <button>Add</button>
                            </div>
                        </form>
                        {{-- <span class="close">&times;</span> --}}
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
    @include('admin.layout.scripts')
</body>

</html>
