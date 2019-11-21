@extends('shared.layout')

@section('content')
<style>
    .tablewrap {
        overflow: auto;
        padding: 10px 10px 10px 10px;
    }
</style>
<div class="block-header">
    <h2>Kamus Kompetensi Core Value</h2>
    <h5>Badan Ekonomi Kreatif</h5>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Kamus Kompetensi Core Value
                </h2>

            </div>
            <div class="body">
                <td><button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal"
                        data-target="#largeModal">Tambah Data</button></td>

                <td><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal"
                        data-target="#tambahkompentensiLabel">Tambah Kompetensi</button></td>
                <br>
            </div>
            <div class="wrapper-grid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tablewrap">
                            <table id="kompcorevalue-table"
                                class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kompetensi</th>
                                        <th>Level</th>
                                        <th>Indikator Perilaku</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>
                                            <center><button type="button" class="btn btn-warning waves-effect m-r-20"
                                                    data-toggle="modal" data-target="#IntegritasModal">KOMITMEN TERHADAP
                                                    ORGANISASI</button></center>
                                        </td>
                                        <td>LEVEL 2 - Melaksanakan pekerjaan sebatas tuntutan tugas dan tanggungjawabnya

                                        </td>
                                        <td>
                                            <li>2.1. Tidak berpartisipasi untuk membantu rekan kerja;</li>
                                            <li>2.2. Mengerjakan tugas hanya berdasarkan perintah;</li>
                                            <li>2.3. Melaksanakan tugas sesuai Standar Operasional yang berlaku
                                            </li>
                                        </td>
                                        <td>
                                            <div class="js-sweetalert">
                                                <button type="button" class="btn btn-info waves-effect m-r-20"
                                                    data-toggle="modal" data-target="#largeModal"><i
                                                        class="material-icons">mode_edit</i></button>
                                                <button type="button" class="btn btn-danger waves-effect m-r-20"
                                                    data-type="confirm"><i class="material-icons">cancel</i></button>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="admin/plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function () {
        
        console.log("ready");
        loadgrid();
        
    });

    function loadgrid()
    {
        $.ajax({
            url:'api/get/KategoriKompetensi',
            type:'get',
            dataType:'json',
            success:function(result){
                console.log(result.data);
                var rawhtml = "";
                var data = result.data;
                for(var i=0;i<data.length;i++)
                {
                    rawhtml=
                        '<tr>'+
                            '<td>'+data[i].No+'</td>'+
                            '<td><center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#IntegritasModal">'+data[i].Kompetensi+'</button></center>'+
                            '</td>'+
                            '<td>'+data[i].Level+
                            '</td>'+
                            '<td>'+data[i].Indikator+
                            '</td>'+
                            '<td>'+
                                '<div class="js-sweetalert">'+
                                    '<button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">mode_edit</i>'+
                                    '</button>'+
                                    '<button type="button" class="btn btn-danger waves-effect m-r-20" data-type="confirm"><i class="material-icons">cancel</i></button>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'

                    $("#kompcorevalue-table tbody").append(rawhtml);
                    console.log(data[i]);
                    console.log(rawhtml);
                    
                }
                $("#kompcorevalue-table").DataTable({
                    // paging: false
                });
            }
        })
    }
</script>
@endsection