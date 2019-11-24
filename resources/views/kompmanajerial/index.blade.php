@extends('shared.layout')

@section('content')
<style>
    .tablewrap {
        overflow: auto;
        padding: 10px 10px 10px 10px;
    }
</style>
<div class="block-header">
    <h2>Kamus Kompetensi Manajerial</h2>
    <h5>Badan Ekonomi Kreatif</h5>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                Kamus Kompetensi Manajerial
                </h2>

            </div>
            <div class="body">
                <td><button type="button" class="btn btn-info waves-effect m-r-20" id="btnTambahData">Tambah Data</button></td>

                <td><button type="button" class="btn btn-warning waves-effect m-r-20" id="btnTambahDataKompetensi">Tambah Kompetensi</button></td>
                <br>
            </div>
            <div class="wrapper-grid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tablewrap">
                            <table id="kompcorevalue-table" class="table table-bordered">
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
<div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modalTambahDataKompetensi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kompetensi</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Nama Kompetensi</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="input-group form-control" id="name_komp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Code</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="input-group form-control" id="code_komp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Minimum Level</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" min="1" value="1" class="input-group form-control number" id="min_lvl_komp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Deskripsi</label>
                    </div>
                    <div class="col-md-8">
                        <textarea type="text" class="input-group form-control" id="desc_komp"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Kompetensi</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- <script src="admin/plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
    const menuid = 2;
    $(document).ready(function() {

        console.log("ready");
        loadgrid();

    });

    function loadgrid() {
        $.ajax({
            url: "api/Kompetensi/" + menuid,
            type: 'get',
            dataType: 'json',
            success: function(result) {
                console.log(result.data);
                let rawhtml = "";
                let data = result.data;
                for (let i = 0; i < data.length; i++) {
                    // debugger;
                    let data_level = data[i].level_kompetensi;
                    let count_level = data_level.length;
                    let flag_col_kompetensi = 0;
                    let no = i + 1;
                    if (count_level > 0) {
                        for (let j = 0; j < data_level.length; j++) {
                            rawhtml = '<tr level_id="' + data_level[j].id + '" kompetensi_id="' + data_level[j].kompetensi_id + '">'
                            if (flag_col_kompetensi == 0) {
                                rawhtml += '<td>' + no + '</td>' +
                                    '<td>' +
                                    '<center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#IntegritasModal">' + data[i].name + '</button></center>' +
                                    '</td>';
                                // rawhtml += '<td rowspan="'+count_level+'">' + no + '</td>' +
                                //     '<td rowspan="'+count_level+'"><center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#IntegritasModal">' + data[i].name + '</button></center>' +
                                //     '</td>';

                            } else {
                                rawhtml += '<td></td><td></td>'
                            }
                            flag_col_kompetensi++;
                            rawhtml += '<td> LEVEL ' + data_level[j].level + ' - ' + data_level[j].level_description +
                                '</td>' +
                                '<td>' + data_level[j].index_perilaku.replace(/\n/g, "<br/>") +
                                '</td>' +
                                '<td>' +
                                '<div class="js-sweetalert">' +
                                '<button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">mode_edit</i>' +
                                '</button>' +
                                '<button type="button" class="btn btn-danger waves-effect m-r-20" data-type="confirm"><i class="material-icons">cancel</i></button>' +
                                '</div>' +
                                '</td>' +
                                '</tr>'

                            $("#kompcorevalue-table tbody").append(rawhtml);
                            // console.log(data[i]);
                            // console.log(rawhtml);   
                        }
                    }
                }
                $("#kompcorevalue-table").DataTable({
                    // paging: false,
                    "ordering": false
                });
            }
        })
    }

    $("#btnTambahData").click(function() {
        $("#modalTambahData").modal("show");
    })

    $("#btnTambahDataKompetensi").click(function() {
        $("#modalTambahDataKompetensi").modal("show");
    })

    $("#modalTambahDataKompetensi button.btn-primary").click(function() {
        // alert("ok");
        // swal("Hello world!");
        var req = {
            name: $("#name_komp").val(),
            code: $("#code_komp").val(),
            minimum_lvl: $("#min_lvl_komp").val(),
            description: $("#desc_komp").val(),
            kategori_id: menuid
        }
        console.log(req);
        $.ajax({
            url: 'api/Kompetensi',
            type: 'post',
            dataType: 'json',
            data: {
                req: req
            },
            success: function(res) {
                console.log(res);
                $("#modalTambahDataKompetensi").modal("hide");
                if (res.code == 200) {
                    swal("Success!",
                        res.message,
                        "success"
                    );
                } else {
                    swal("Error!",
                        res.message,
                        "error"
                    );
                }
            }
        })
    })
</script>
@endsection