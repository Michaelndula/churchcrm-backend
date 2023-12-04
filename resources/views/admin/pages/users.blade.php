<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    @php
            // use App\Models\User;

        $users =  App\Models\User::all();    
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
                <h1>Users</h1>
                <hr>
            </div>
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
                            @foreach ($users as $user)
                               <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->email}}</td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.scripts')
    <script src="assets/js/toggle_bar.js"></script>
</body>

</html>