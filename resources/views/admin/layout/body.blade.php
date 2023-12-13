<div class="dashboard-container" id="dashboardContainer">
    <div class="dashboard-header">
        <h1>Dashboard</h1>
        <hr>
    </div>

    <section>
      
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class=" m-b-20">Users</h6>
                            <h2 class="text-left g-blue"><span>{{ $totalusers }}</span><i class="fa fa-user ps-2"></i>
                            </h2>
                            <p class="f-right"><a href="{{ route('users') }}">View all</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20 ">Sermons</h6>
                            <h2 class="text-left g-blue"><span>{{ $totalsermons }}</span><i class="fa fa-solid fa-book-bible ps-2"></i></h2>
                            <p class="f-right"><a href="{{ route('sermons') }}">View all</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Announcements</h6>
                            <h2 class="text-left g-blue"><span>{{ $totalannouncements }}</span><i class="fa fa-solid fa-clipboard-list ps-2"></i>
                            </h2>
                            <p class="f-right"><a href="{{ route('announcements') }}">View all</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20 ">Sermon Notes</h6>
                            <h2 class="text-left g-blue"><span>{{ $totalsermonsnotes }}</span><i class="fa fa-solid fa-note-sticky fa-flip-vertical ps-2"></i>
                            </h2>
                            <p class="f-right"><a href="{{ route('sermonsnotes') }}">View all</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class=" m-b-20">Events</h6>
                            <h2 class="text-left g-blue"><span>{{ $totalevents }}</span><i class="fa fa-solid fa-calendar-days ps-2"></i></h2>
                            <p class="f-right"><a href="{{ route('events') }}">View all</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
  
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-transparent">
                <h4>New App Users</h4>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Membership Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $users = App\Models\User::OrderBy('id', 'desc')
                            ->take(5)
                            ->get();

                    @endphp
                    @foreach ($users as $user)
                        <tr data-user-id = {{$user->id}}>
                            <td class="username" data-username = {{$user->name}}>{{ $user->name }}</td>
                            <td class="email" data-email={{$user->email}}>{{ $user->email }}</td>
                            <td class="phone" data-phone={{$user->phone}}>{{ $user->phone }}</td>
                            <td></td>
                            <td>
                                <button style="font-size: 16px" onclick="openUserModal('{{$user->name}}','{{$user->email}}'), '{{$user->phone}}'">
                                    View
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- User info modal --}}
    <div id="user-modal" class="modal">
            <div class="modal-content">
                <div class="modal-head">
                    <h4>{{ $user->name }}</h4>
                </div>
                <hr>
                <div class="modal-body">
                    <form class="form" action="" method="PUT" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input id="user-email" data-target="#username" type="text" class="form-control" name="email" 
                                placeholder={{ $user->email }}>
                        </div>

                        <div class="icon-password mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control int-bg" name="password" placeholder={{$user->password}}>
                        </div>

                        
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <div>
                                <button type="button" onclick="closeUserModal()" class="btn btn-outline-primary">Cancel</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
</div>
