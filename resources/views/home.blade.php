@extends('layouts.app')
@section("title","Dashboard")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row page-heading">
        <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center d-flex">
          <h4 class="font-weight-bold"><i class="menu-icon" data-feather="home"></i>Dashboard</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row dashboard">
    <div class="col-12 col-lg-8">
        <div class="card main-blocks">
            <div class="card-body">
                <div class="row ml-0">
                    <div class="col-12 col-lg-4">
                        <i class="icon manufacture"></i>
                        <p>Total Manufacturers</p>
                        <h2>50</h2>
                    </div>
                    <div class="col-12 col-lg-4">
                        <i class="icon supplier"></i>
                        <p>Total Suppliers</p>
                        <h2>100</h2>
                    </div>
                    <div class="col-12 col-lg-4">
                        <i class="icon customers"></i>
                        <p>Total Customers</p>
                        <h2>20K</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row icon-blocks">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-wrap">
                            <i class="icon" data-feather="archive"></i>
                        </div>
                        <div class="con-wrap">
                            <p>Total Raw Material</p>
                            <h2>10 Ton</h2>
                            <span class="situation"><i class="text-success" data-feather="trending-up"></i>15% more than the previous month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-wrap">
                            <i class="icon" data-feather="box"></i>
                        </div>
                        <div class="con-wrap">
                            <p>Total Quantity</p>
                            <h2>10 Ton</h2>
                            <span class="situation"><i class="text-danger" data-feather="trending-down"></i>5% Less than the previous month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row orders">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body pr-0">
                        <div class="form-row">
                            <div class="col-8">
                                <p>Total Orders</p>
                                <h2>5000</h2>
                            </div>
                            <a href="orders.html" class="col-4">
                                <i class="icon" data-feather="shopping-cart"></i> View Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body pr-0">
                        <div class="form-row">
                            <div class="col-8">
                                <p>Todays Delivery Orders</p>
                                <h2>100</h2>
                            </div>
                            <a href="orders.html" class="col-4">
                                <i class="icon" data-feather="shopping-cart"></i> View Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card bg-primary text-white low-stock">
            <div class="card-heading">Low inventory products</div>
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table">
                    <thead>
                        <tr>
                            <th>Name of Inventory</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product name 1</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 2</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 3</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 4</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 5</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 6</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 7</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 8</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Product name 9</td>
                            <td>50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Inward Raw Material Analysis
            </div>
            <div class="card-body">
                <canvas id="canvas" style="height:40vh; width:80vw"></canvas>
            </div>
        </div>
    </div>
  </div>
@push("scripts")
  <script src="{{ asset('assets/mdbootstrap4/mdb.min.js')  }}"></script>
  <script src="{{ asset('vendors/chart.js/Chart.min.js')  }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/custom.js')  }}"></script>
  <!-- End custom js for this page-->
  <script src="{{ asset('assets/js/feather.min.js')  }}"></script>
  <script>
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Inward Raw Material',
				backgroundColor: "#ec1616",
				borderColor: "#ff0000",
				borderWidth: 1,
				data: [2500, 4000,3200,100,500,900,70,2400,4000,3050,1100,600]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						display: false,
						position: 'top',
					},
					title: {
						display: false,
						text: 'Chart.js Bar Chart'
					}
				}
			});

		};
    feather.replace()
  </script>
  @endpush
@endsection
