<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body>
    <div class="dashboard-body">
        <div class="navigation-menu">
            <div class="container">
                <!-- Top Navigation Menu -->
                @include('admin.layout.header')
                <!-- Side Navigation Menu -->
                @include('admin.layout.aside')
            </div>
        </div>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Users</h1>
                <hr>
            </div>
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
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Membership Status</td>
                                <td>
                                    <a href="">Delete</a>
                                    <a href="">view</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Membership Status</td>
                                <td>
                                    <a href="">Delete</a>
                                    <a href="">view</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Membership Status</td>
                                <td>
                                    <a href="">Delete</a>
                                    <a href="">view</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Membership Status</td>
                                <td>
                                    <a href="">Delete</a>
                                    <a href="">view</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Membership Status</td>
                                <td>
                                    <a href="">Delete</a>
                                    <a href="">view</a>
                                </td>
                            </tr>


                        </table>

                </div>

            </section>
        </div>
    </div>
    @include('admin.layout.scripts')
</body>

</html>
