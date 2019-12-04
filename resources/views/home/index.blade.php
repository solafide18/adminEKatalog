@extends('shared.layout')

@section('content')
<style>
    .wrap-chart-dashboard {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="block-header">
    <h2>INFORMASI KARIR</h2>
</div>

<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">KUALIFIKASI KOMPETENSI JABATAN</div>
                <div class="text">Informasi Kualifikasi Kompetensi Jabatan</div>
            </div>
        </div>
    </div>




    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text">STANDAR KOMPETENSI JABATAN</div>
                <div class="text">Informasi Standar Kompetensi Jabatan</div>
            </div>
        </div>
    </div>
</div>



<div class="row clearfix">
    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <a href="kamuskompetensi.html">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">book</i>
                </div>
                <div class="content">
                    <div class="text">KAMUS KOMPETENSI</div>
                    <div class="number">8 DATA KOMPETENSI</div>
                </div>
        </a>
    </div>
</div>
<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">help</i>
        </div>
        <div class="content">
            <div class="text">KATALOG PENGEMBANGAN</div>
            <div class="text">Informasi Katalog Pengembangan</div>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text">MANUAL USER</div>
            <div class="text">Info Cara Menggunakan Aplikasi</div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Kompetensi Performance
            </h2>

        </div>
        <div class="body">
            <div class="wrap-chart-dashboard">
                <div id="barchart_material" style="width: 90%; height: 500px;"></div>
            </div>
            <br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        console.log("ready");
        loadChart();
    });

    async function getDataChart() {
        var listData = [];
        await $.ajax({
            url: $("#urlPath").val() + "/api/dashboard/getChart/{{Session::get('id')[0]??''}}",
            type: 'get',
            dataType: 'json',
            success: function (result) {
                console.log(result.data);
                let data = result.data;
                listData.push(['Kompetensi', 'Nilai kompetensi', 'Assesment'])
                for (let i = 0; i < data.length; i++) {
                    listData.push([data[i].name, data[i].nilai_minimum, data[i].nilai])
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
        return listData
    }

    async function loadChart() {
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawChart);

        var listData = await getDataChart();

        function drawChart() {
            // var data = google.visualization.arrayToDataTable([
            //     ['Kompetensi', 'Nilai kompetensi', 'Assesment'],
            //     ['Kompetensi 1', 1000, 400],
            //     ['Kompetensi 2', 1170, 460],
            //     ['Kompetensi 3', 660, 1120],
            //     ['Kompetensi 4', 1030, 540]
            // ]);
            var data = google.visualization.arrayToDataTable(listData);

            var options = {
                chart: {
                    // title: 'Kompetensi Performance',
                    // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                },
                bars: 'vertical' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    }

</script>
@endsection