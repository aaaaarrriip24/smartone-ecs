@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="row">
                        <!-- Template -->
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="background-color: rgb(255, 99, 132);">Perusahaan
                                            Terdaftar</th>
                                        <th scope="col" style="background-color: rgb(255, 159, 64);">Jumlah Konsultasi</th>
                                        <th scope="col" style="background-color: rgb(255, 205, 86);">Realisasi Export
                                            (USD)</th>
                                        <th scope="col" style="background-color: rgb(75, 192, 192);">Business Matching
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-end">{{ number_format($perusahaan) }}</td>
                                        <td class="text-end">{{ number_format($layanan) }}</td>
                                        <td class="text-end">{{ number_format($export->total) }}</td>
                                        <td class="text-end">{{ number_format($bm) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <canvas id="chart_layanan_konsultasi" style="width: 900px; height: 500px"></canvas>
                        </div>
                        <!-- <div class="col-md-6">
                            <canvas id="chart_topik" style="width: 900px; height: 500px"></canvas>
                        </div> -->
                        <div class="col-md-6">
                            <table id="dt_topik" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="background-color: rgb(255, 99, 132);">No.
                                        </th>
                                        <th scope="col" style="background-color: rgb(255, 205, 86);">Topik Konsultasi
                                        </th>
                                        <th scope="col" style="background-color: rgb(75, 192, 192);">Data Konsultasi
                                        </th>
                                    </tr>
                                </thead>
                            </table>
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
<script>
    let table;
    $(document).ready(function () {
        table = $('#dt_topik').DataTable({
            autoWidth: false,
            responsive: false,
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            displayLength: 5,
            paginate: true,
            lengthChange: true,
            filter: true,
            sort: true,
            info: true,
            searching: false, 
            ajax: base_url + "data_topik",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    width: '5%'
                },
                {
                    data: 'nama_topik',
                    name: 'nama_topik',
                    orderable: true,
                },
                {
                    data: 'total',
                    name: 'total',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ]
        });

        $(".dt-length").addClass("d-none");
    });

</script>
@endsection
