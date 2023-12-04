<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans('Strings.name') }} - {{ Route::current()->uri() }}</title>
   <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
    <div class="form-section">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <h4 class="primary-color">Login to dashboard</h4>
            </div>
            <div>
                <label for="username">Username</label>
                <input id="username" class="form-control" type="text" placeholder="Enter Username" name="username"
                    required autofocus autocomplete="username" />
            </div>
            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" placeholder="Passsword" name="password"
                    required autocomplete="current-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <button class="login-btn">
                    Log in
                </button>
            </div>
        </form>
    </div>
</body>

</html>
