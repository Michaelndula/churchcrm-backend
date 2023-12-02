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

        <div class="dashboard-container">
            <div class="dashboard-header">
                <h1>Sermons</h1>
                <hr>
            </div>

            <section class="center-btn-modal">
                <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Add New Sermon</a>
            </section>

            <div class="dashboard-header">
                <h1>Latest</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <img src="assets/images/subscribe_button.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. In a architecto eaque numquam debitis, hic ipsa vero blanditiis, tempore magnam necessitatibus velit. Debitis quae repellendus aliquid. Repellendus, unde! Reiciendis, quo.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/images/subscribe_button.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. In a architecto eaque numquam debitis, hic ipsa vero blanditiis, tempore magnam necessitatibus velit. Debitis quae repellendus aliquid. Repellendus, unde! Reiciendis, quo.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/images/subscribe_button.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. In a architecto eaque numquam debitis, hic ipsa vero blanditiis, tempore magnam necessitatibus velit. Debitis quae repellendus aliquid. Repellendus, unde! Reiciendis, quo.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/images/subscribe_button.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. In a architecto eaque numquam debitis, hic ipsa vero blanditiis, tempore magnam necessitatibus velit. Debitis quae repellendus aliquid. Repellendus, unde! Reiciendis, quo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.scripts')
</body>

</html>