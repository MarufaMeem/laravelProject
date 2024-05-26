@extends('layouts.app')

@section('style')
<!-- Add any additional stylesheets needed for your dashboard -->
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Existing card for Online Store Visitors -->
                

                    <!-- Existing card for Products -->
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Products</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <!-- Table content for products -->
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-lg-6 -->

                @extends('layouts.app')

                @section('style')
                <!-- Add any additional stylesheets needed for your dashboard -->
                @endsection
                
                @section('content')
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Dashboard</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                
                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                               
                
                                <div class="col-lg-6">
                                    <!-- New card for Sales Pie Chart -->
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="card-title">Sales Overview</h3>
                                                <a href="javascript:void(0);">View Report</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="position-relative mb-4">
                                                <!-- Canvas for the dynamic pie chart -->
                                                <canvas id="sales-chart" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                
                                    <!-- Existing card for Online Store Overview -->
                              
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                @endsection
                
                @section('script')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Function to fetch data from server
                        function fetchData() {
                            return fetch('/api/sales-data') // Replace with your Laravel API endpoint
                                .then(response => response.json())
                                .then(data => data)
                                .catch(error => console.error('Error fetching data:', error));
                        }
                
                        // Function to process data and update chart
                        async function updateChart() {
                            try {
                                const data = await fetchData();
                
                                // Extracting labels, data, and colors from fetched data
                                const labels = data.map(item => `Product ${item.product_id}`);
                                const salesData = data.map(item => item.total_quantity);
                                const colors = ['#007bff', '#6610f2', '#6f42c1']; // Example colors
                
                                // Sales Chart
                                let ctxSales = document.getElementById('sales-chart').getContext('2d');
                                let salesChart = new Chart(ctxSales, {
                                    type: 'pie',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            data: salesData,
                                            backgroundColor: colors,
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        legend: {
                                            position: 'right',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Sales Overview'
                                        }
                                    }
                                });
                            } catch (error) {
                                console.error('Error updating chart:', error);
                            }
                        }
                
                        // Initial load of chart
                        updateChart();
                    });
                </script>
                @endsection
                
</script>
@endsection
