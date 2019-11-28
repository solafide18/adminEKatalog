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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
                <hr>
            </div>
            <div class="modal-body">

                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kompetensi</label>
                        </div>
                        <div class="col-md-8">
                            <select class='form-group form-control' id="ddlKompetensi">
                                <option value="">Select option</option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Third</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Level</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" min="1" value="1" class="input-group form-control required"
                                id="inLevel">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Deskripsi</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-group form-control" name="" id="inDescripsiLvl" cols="45"
                                rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Index Prilaku</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-group form-control" name="" id="inIdxPrilaku" cols="45"
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-warning" id="addLevelTemp">Add Level</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="tblAddLevelTemp" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Deskripsi</th>
                                    <th>Index Prilaku</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveAddData">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditData" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data</h4>
                <input type="hidden" id="KompetensiIdEdit">
                <hr>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Level</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" min="1" value="1" class="input-group form-control required"
                                id="inLevel">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Deskripsi</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-group form-control" name="" id="inDescripsiLvl" cols="45"
                                rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Index Prilaku</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-group form-control" name="" id="inIdxPrilaku" cols="45"
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-warning" id="addEditLevelTemp">Add Level</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="tblEditLevelTemp" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Deskripsi</th>
                                    <th>Index Prilaku</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveAddData">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTambahDataKompetensi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kompetensi</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Nama Kompetensi</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="input-group form-control required" id="name_komp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Code</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="input-group form-control required" id="code_komp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Minimum Level</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" min="1" value="1" class="input-group form-control number required"
                            id="min_lvl_komp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Deskripsi</label>
                    </div>
                    <div class="col-md-8">
                        <textarea type="text" class="input-group form-control required" id="desc_komp"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddkompetensi">Add Kompetensi</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="admin/plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
    const menuid = 2;
    $(document).ready(function () {

        console.log("ready");
        loadgrid();

    });

    function loadgrid() {
        $("#kompcorevalue-table").DataTable().destroy();
        $("#kompcorevalue-table tbody").html('');
        $.ajax({
            url: "api/Kompetensi/" + menuid,
            type: 'get',
            dataType: 'json',
            success: function (result) {
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

                            rawhtml += '<td> LEVEL ' + data_level[j].level + ' - ' + data_level[j].level_description +
                                '</td>' +
                                '<td>' + data_level[j].index_perilaku.replace(/\n/g, "<br/>") +
                                '</td>';
                            if (flag_col_kompetensi == 0) {
                                rawhtml +=
                                    '<td>' +
                                    '<div class="js-sweetalert">' +
                                    '<button type="button" onclick="editData(this)" class="btn btn-info waves-effect m-r-20"><i class="material-icons">mode_edit</i>' +
                                    '</button>' +
                                    '<button type="button" onclick="deleteData(this)" class="btn btn-danger waves-effect m-r-20"><i class="material-icons">cancel</i></button>' +
                                    '</div>' +
                                    '</td>';

                            } else {
                                rawhtml += '<td></td>'
                            }
                            rawhtml += '</tr>'
                            flag_col_kompetensi++;
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

    $("#btnTambahData").click(function () {
        $("#ddlKompetensi").val("");
        $("#inLevel").val(1);
        $("#inDescripsiLvl").val("");
        $("#inIdxPrilaku").val("");
        var tbl = $("#tblAddLevelTemp").DataTable();
        tbl.rows()
            .remove()
            .draw();
        loadDdlKompetensi();
        $("#modalTambahData").modal("show");
    })

    $("#btnTambahDataKompetensi").click(function () {
        $("#name_komp").val("");
        $("#code_komp").val("");
        $("#min_lvl_komp").val("");
        $("#desc_komp").val("");
        $("#modalTambahDataKompetensi").modal("show");
    })

    $("#modalTambahDataKompetensi button#btnAddkompetensi").click(function () {
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
            success: function (res) {
                console.log(res);
                $("#modalTambahDataKompetensi").modal("hide");
                if (res.code == 200) {
                    $("#name_komp").val("");
                    $("#code_komp").val("");
                    $("#min_lvl_komp").val("");
                    $("#desc_komp").val("");
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

    $("#addEditLevelTemp button#btnSaveAddData").click(function () {
        try {
            // debugger;
            let tblEditLevelTemp = $("#tblEditLevelTemp").DataTable();
            let ddlKompetensi = $("#KompetensiIdEdit").val();

            if (tblEditLevelTemp.data().length == 0) throw "Kompetensi Setidaknya Memiliki 1 Data Level";

            let list_level = [];

            tblEditLevelTemp.data().each(function (data, idx) {
                let item_level = {
                    level: data[0],
                    level_description: data[1],
                    index_perilaku: data[2],
                    kompetensi_id: ddlKompetensi
                }
                list_level.push(item_level);
            });

            let req = list_level;

            $.ajax({
                url: "api/Kompetensi/editLevel/"+ddlKompetensi,
                type: 'post',
                data: {
                    req: req
                },
                // contentType: "application/json",
                dataType: 'json',
                success: function (result) {
                    swal("Success!",
                        result.message,
                        "success"
                    );
                    loadgrid();
                    $("#modalEditData").modal("hide");
                }
            });
        } catch (err) {
            swal("Error!",
                err,
                "warning"
            );
        }
    })

    $("#modalTambahData button#btnSaveAddData").click(function () {
        try {
            // debugger;
            let tblAddLevelTemp = $("#tblAddLevelTemp").DataTable();
            let ddlKompetensi = $("#ddlKompetensi").val();
            if (ddlKompetensi == null || ddlKompetensi == "") throw "Harap Pilih Kompetensi Terlebih dahulu";
            if (tblAddLevelTemp.data().length == 0) throw "Kompetensi Setidaknya Memiliki 1 Data Level";

            let list_level = [];

            tblAddLevelTemp.data().each(function (data, idx) {
                let item_level = {
                    level: data[0],
                    level_description: data[1],
                    index_perilaku: data[2],
                    kompetensi_id: ddlKompetensi
                }
                list_level.push(item_level);
            });

            let req = list_level;

            $.ajax({
                url: "api/Kompetensi/Level/"+ddlKompetensi,
                type: 'post',
                data: {
                    req: req
                },
                // contentType: "application/json",
                dataType: 'json',
                success: function (result) {
                    swal("Success!",
                        result.message,
                        "success"
                    );
                    loadgrid();
                    $("#modalTambahData").modal("hide");
                }
            });
        } catch (err) {
            swal("Error!",
                err,
                "warning"
            );
        }
    })

    $("#addEditLevelTemp").click(function () {
        try {
            let tblEditLevelTemp = $("#tblEditLevelTemp").DataTable();
            let inLevel = $("#modalEditData #inLevel").val();
            let inDescripsiLvl = $("#modalEditData #inDescripsiLvl").val();
            let inIdxPrilaku = $("#modalEditData #inIdxPrilaku").val();
            let flag_is_valid = true;
            tblEditLevelTemp.data().each(function (data, idx) {
                if (inLevel == data[0]) flag_is_valid = false;
            });
            if (!flag_is_valid) throw "Level Sudah ada";
            if (inDescripsiLvl == null || inDescripsiLvl == "") throw "Field Deskripsi masih Kosong";
            if (inIdxPrilaku == null || inIdxPrilaku == "") throw "Field Index Prilaku masih Kosong";

            tblEditLevelTemp.row.add([
                inLevel,
                inDescripsiLvl,
                inIdxPrilaku,
            ]).draw();

        } catch (err) {
            swal("Error!",
                err,
                "warning"
            );
        }
    })

    $("#addLevelTemp").click(function () {
        try {
            let tblAddLevelTemp = $("#tblAddLevelTemp").DataTable();
            let inLevel = $("#modalTambahData #inLevel").val();
            let inDescripsiLvl = $("#modalTambahData #inDescripsiLvl").val();
            let inIdxPrilaku = $("#modalTambahData #inIdxPrilaku").val();
            let flag_is_valid = true;
            tblAddLevelTemp.data().each(function (data, idx) {
                if (inLevel == data[0]) flag_is_valid = false;
            });
            if (!flag_is_valid) throw "Level Sudah ada";
            if (inDescripsiLvl == null || inDescripsiLvl == "") throw "Field Deskripsi masih Kosong";
            if (inIdxPrilaku == null || inIdxPrilaku == "") throw "Field Index Prilaku masih Kosong";

            tblAddLevelTemp.row.add([
                inLevel,
                inDescripsiLvl,
                inIdxPrilaku,
            ]).draw();

        } catch (err) {
            swal("Error!",
                err,
                "warning"
            );
        }
    })

    function loadDdlKompetensi() {
        $.ajax({
            url: "api/Kompetensi/listKompetensi/" + menuid,
            type: 'get',
            dataType: 'json',
            success: function (result) {
                let data = result.data;
                let rawhtml = '<option value="">Select option</option>';
                console.log(data);
                for (let i = 0; i < data.length; i++) {
                    rawhtml += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                $("#ddlKompetensi").html(rawhtml)
            }
        })
    }

    async function editData(e) {
        var parents = $(e).closest("tr");
        if (parents.length == 0) throw "Kompetensi ID tidak ditemukan";

        let kompetensi_id = $(parents[0]).attr("kompetensi_id");
        await $.ajax({
            url: "api/Kompetensi/listLevelKompetensi/" + kompetensi_id,
            type: 'get',
            dataType: 'json',
            success: function (result) {
                var tbl = $("#tblEditLevelTemp").DataTable();
                tbl.rows()
                    .remove()
                    .draw();
                var data = result.data;
                for(let i=0;i<data.length;i++)
                {
                    tbl.row.add([
                        data[i].level,
                        data[i].level_description,
                        data[i].index_perilaku,
                    ]).draw();
                    $("#KompetensiIdEdit").val(data[i].kompetensi_id);
                }
            }
        })
        $("#modalEditData").modal('show');
    }

    function deleteData(e) {
        try {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Delete",
                cancelButtonText: "Cancle",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    var parents = $(e).closest("tr");
                    if (parents.length == 0) throw "Kompetensi ID tidak ditemukan";

                    let kompetensi_id = $(parents[0]).attr("kompetensi_id");
                    console.log(kompetensi_id);
                    $.ajax({
                        url: "api/Kompetensi/deleteLevel/" + kompetensi_id,
                        type: 'delete',
                        dataType: 'json',
                        success: function (result) {
                            if (result.code != 200) throw result.message;
                            swal("Success!",
                                result.message,
                                "success"
                            );
                            loadgrid();
                        },
                        error: function (err) {
                            swal("Error!",
                                err,
                                "error"
                            );
                        }
                    })
                } else {
                    swal("Cancelled", "Your data is safe");
                }
            });
        } catch (err) {
            swal("Error!",
                err,
                "warning"
            );
        }
    }
</script>
@endsection