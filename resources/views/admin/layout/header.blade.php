<div class="topNav">
    <div class="hamburgerMenu" id="toggleSidebar">
        <span>
            <i class="fa-solid fa-bars" style="color: #ffffff; font-size:18px;"></i>
        </span>
    </div>
    <div class="profileDetails" onclick="openProfileModal()">
        <span class="profilePic"><img src="assets/images/user.jpeg" alt="profile-pic"></span>
        <span class="profileName">Profile</span>
    </div>

    {{-- Profile Modal --}}
    <div id="profile-modal" class="modal profile-modal-container">
        <div class="modal-content" style="padding: 0; margin: 0; width:100%">
            <div class="modal-head" style="padding-top: 15px">
                <div class="close-profile-modal" onclick="closeProfileModal()">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                @php
                use App\Models\User;
                use Illuminate\Support\Facades\Auth; 
                $userId = Auth::id();
                $user = User::where('id', $userId)->first();
                @endphp
                <p class="profile-modal-text">{{$user->name}}</p>
                <hr class="profile-modal-hr">
                <a style="text-decoration: none" href="{{ route('profile')}}">
                    <p class="profile-modal-text">Manage</p>
                </a>
            </div>
            <div class="modal-body" style="margin: 0 auto">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn profile-modal-btn">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
