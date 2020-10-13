<?php session_start();
include("index1.php"); ?>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Next Gen</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="Logout.php">Sign out</a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <?php include "sideBarAdmin.php" ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="row mt-5">
                        <div class="col-md-4 col-xs-12 mb-4">
                            <div class="card bg-primary text-white">

                                <div class="card-body">
                                    <h5 class="card-title">Products</h5>
                                    <p class="card-text" style="font-size:48px">1000</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-4 ">
                            <div class="card bg-warning text-white">

                                <div class="card-body">
                                    <h5 class="card-title">Customer</h5>
                                    <p class="card-text" style="font-size:48px">1000</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-4">
                            <div class="card bg-success text-white">

                                <div class="card-body">
                                    <h5 class="card-title">Revenue</h5>
                                    <p class="card-text" style="font-size:48px">1000</p>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <canvas id="myChart" style="height: 384px !important; width: 384px;"></canvas>

                    </div>

                </div>
                <div class=" tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                    <?php include "CustomerAdmin.php" ?></div>
                <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                    <?php include "ProductTable.php" ?>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
    crossorigin="anonymous"></script>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var barChart = new Chart(ctx, {
    type: 'bar',
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                gridLines: {
                    display: true,
                    color: "rgba(255,99,132,0.2)"
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false
                }
            }]
        }
    },
    data: {
        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sst", "Sun"],
        datasets: [{
            label: 'data-1',
            data: [12, 19, 3, 17, 28, 24, 7],
            backgroundColor: "#6610f2"
        }, {
            label: 'data-2',
            data: [30, 29, 5, 5, 20, 3, 10],
            backgroundColor: "#20c997"
        }],

    }
});
</script>