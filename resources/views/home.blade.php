@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Perusahaan Terdaftar</th>
                                        <th scope="col">Layanan Terselesaikan</th>
                                        <th scope="col">Realisasi Export (USD)</th>
                                        <th scope="col">Business Matching</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $perusahaan }}</td>
                                        <td>{{ $layanan }}</td>
                                        <td>{{ $export->total }}</td>
                                        <td>{{ $bm }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <canvas id="chart_layanan_konsultasi" style="width: 900px; height: 500px"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="chart_topik" style="width: 900px; height: 500px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    var barLayanan = document.getElementById("chart_layanan_konsultasi").getContext('2d');
    $.get(base_url + "section2", function (result, status) {
        const labels = result.label
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Layanan Konsultasi ECS',
                data: result.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        console.log(data);

        var myChart = new Chart(barLayanan, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },

        });
    });

</script>
<script type="text/javascript">
    var barTopik = document.getElementById("chart_topik").getContext('2d');
    $.get(base_url + "section3", function (result, status) {
        const labels = result.label
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Topik Layanan',
                data: result.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        console.log(data);

        var myChart = new Chart(barTopik, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },

        });
    });

</script>
@endsection
