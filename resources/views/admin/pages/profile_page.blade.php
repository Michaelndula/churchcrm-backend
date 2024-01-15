<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>

    <div class="dashboard-body">
        <div class="navigation-menu">
            <!-- Top Navigation Menu -->
            @include('admin.layout.header')
            <!-- Side Navigation Menu -->
            @include('admin.layout.aside')
        </div>
        
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Profile</h1>
                <hr>
            </div>
            @php
                use App\Models\User;
                use Illuminate\Support\Facades\Auth;
                $userId = Auth::id();
                $user = User::where('id', $userId)->first();
            @endphp
            <form class="form" action="{{ url('/update-profile', $user->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <div class="form-group mb-4">
                        <div class="mb-3">
                            <div class="row">
                                <div class=" image_display" id="image_display"></div>
                                <div class="col">
                                    <!-- Add the onchange attribute to trigger the displayImage function -->
                                    <input type="file" class="file" name="profile-pic" id="eventupload"
                                        onchange="displayImage()" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Username: </label>
                    <input type="text" class="form-control" name="email" required placeholder="email" value="{{$user->email}}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control int-bg" type="password" placeholder="Passsword"
                        name="password" required autocomplete="current-password"/>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>


            </form>

            
        </div>
      
    </div>    
    
    
    @include('admin.layout.scripts')

</body>

</html>
