@extends('layout-admin')
<style>
    form {
        margin-bottom: 20px;
    }

    form label {
        margin-right: 10px;
    }

    form select,
    form button {
        margin-right: 10px;
    }

    form button {
        padding: 5px 15px;
        font-size: 16px;
    }

    /* CSS cho các biểu đồ */
    .canvas-container {
        margin-bottom: 20px;
    }

    #jobsByDateChart,
    #jobsByCategoryChart {
        width: 100%;
        height: 300px;
    }


    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-6 {
        flex: 1;
        padding: 15px;
    }


    @media (max-width: 767px) {
        .col-6 {
            flex: 100%;
            max-width: 100%;
        }

        #jobsByDateChart,
        #jobsByCategoryChart {
            height: 250px;
        }
    }

    @media (max-width: 575px) {

        form select,
        form button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form {
            padding: 0;
        }
    }
</style>
@section('content-admin')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('/dashboard') }}" title="Go to Home" class="tip-bottom current">
                    <i class="icon-home"></i> Home
                </a>
            </div>
            <h1>Dashboard</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <!-- Form chọn ngày tháng năm -->
                    <form method="GET" action="{{ route('dashboard') }}">
                        <label for="year">Năm:</label>
                        <select name="year" id="year">
                            @for ($i = 2024; $i <= date('Y'); $i++)
                                <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>{{ $i }}
                                </option>
                            @endfor
                        </select>
                        <label for="month">Tháng:</label>
                        <select name="month" id="month">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                                    {{ $i < 10 ? '0' . $i : $i }}
                                </option>
                            @endfor
                        </select>

                        <button type="submit">Xem</button>
                    </form>

                    <div>
                        <h3>Tổng số User: {{ $usersCount }}</h3>
                        <h3>User đang online: {{ $onlineUsersCount }}</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <!-- Biểu đồ cột thống kê các job theo ngày -->
                                <canvas id="jobsByDateChart"></canvas>
                            </div>
                            <div class="col-6">
                                <!-- Biểu đồ tròn thống kê số lượng công việc theo danh mục -->
                                <canvas id="jobsByCategoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Biểu đồ cột thống kê các job theo ngày
        var ctx1 = document.getElementById('jobsByDateChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: @json($jobsByDate->keys()),
                datasets: [{
                    label: 'Số lượng công việc',
                    data: @json($jobsByDate->values()),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.dataset.label || '';
                                var value = context.raw || 0;
                                return label + ': ' + value;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + ' công việc';
                            }
                        }
                    }
                }
            }
        });

        // Biểu đồ tròn thống kê số lượng công việc theo danh mục
        var ctx2 = document.getElementById('jobsByCategoryChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: @json($jobsByCategoryNames->keys()),
                datasets: [{
                    label: 'Danh mục công việc',
                    data: @json($jobsByCategoryNames->values()),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.raw || 0;
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
