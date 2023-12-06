<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans('Strings.name') }} - {{ Route::current()->uri() }}</title>
    <link rel="stylesheet" href="assets/css/auth.css">
    @include('admin.layout.head')
</head>

<body>
    <div class="form-section">
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="pb-3">
                <h4 class="g-blue" style="font-weight: 400; font-size: 18px;">Login to dashboard</h4>
            </div>
            <div>
                <input id="username" class="form-control int-bg" type="email" placeholder="Enter username"
                    name="email" required autofocus autocomplete="username" />
            </div>
            <div class="mt-4 icon-password">
                <input id="password" class="form-control int-bg" type="password" placeholder="Passsword"
                    name="password" required autocomplete="current-password" />
                <i id="passwordIcon" class="fa-solid fa-eye" onclick="displayPassword()"></i>


            </div>
            <div class="flex items-center justify-end mt-4">
                <button class="login-btn">
                    Login
                </button>
            </div>
        </form>
    </div>
    <script>
        function displayPassword() {

            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("passwordIcon");

            if (!passwordInput) {
                console.error("Password input not found");
                return;
            }

            if (!eyeIcon) {
                console.error("Eye icon not found");
                return;
            }


            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
