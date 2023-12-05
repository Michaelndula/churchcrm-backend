<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('Strings.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/styles.css">
    
</head>

<body>
    {{-- @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    @endif --}}
    <p>{{ trans('Strings.welcome_txt') }}</p>
    <div id="app">
        <h1>User Data api test</h1>
        <ul id="user-list"></ul>
    </div>

    <script>
        // Fetch data from the API
        fetch('http://127.0.0.1:8000/api/fetch-data')
            .then(response => response.json())
            .then(data => {
                // Display data in the list
                const userList = document.getElementById('user-list');
                data.forEach(user => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${user.name} - ${user.email}`;
                    userList.appendChild(listItem);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>

</body>

</html>
