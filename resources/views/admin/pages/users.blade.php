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
        <div>
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
                                <tr>
                                    <td>Name</td>
                                    <td>Samso</td>
                                    <td>Natto</td>
                                    <td>@samso</td>
                                    <td>@samso</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>Tinor</td>
                                    <td>Horton</td>
                                    <td>@tinor_har</td>
                                    <td>@samso</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>Mythor</td>
                                    <td>Bully</td>
                                    <td>@myth_tobo</td>
                                    <td>@samso</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>Mythor</td>
                                    <td>Bully</td>
                                    <td>@myth_tobo</td>
                                    <td>@samso</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>Mythor</td>
                                    <td>Bully</td>
                                    <td>@myth_tobo</td>
                                    <td>@samso</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>Mythor</td>
                                    <td>Bully</td>
                                    <td>@myth_tobo</td>
                                    <td>@samso</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>Mythor</td>
                                    <td>Bully</td>
                                    <td>@myth_tobo</td>
                                    <td>@samso</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
            <script src="assets/js/toggle_bar.js"></script>
        </div>
        @include('admin.layout.scripts')
</body>

</html>