const menuid = $("#menuid").val();
const isAdm = $("#isAdm").val();
$(document).ready(function () {

    console.log("ready");
    loadgrid();

});

function loadgrid() {
    $("#table-main").DataTable().destroy();
    $("#table-main tbody").html('');
    // console.log($("#urlPath").val() + "/api/Kompetensi/" + menuid);
    $.ajax({
        url: $("#urlPath").val() + "/api/pegawai/kompetensi",
        type: 'get',
        dataType: 'json',
        success: function (result) {
            console.log(result.data);
            let rawhtml = "";
            let data = result.data;
            for (let i = 0; i < data.length; i++) {
                rawhtml = '<tr pid="' + data[i].id + '">'

                rawhtml += '</tr>'

                $("#table-main tbody").append(rawhtml);
            }
            $("#table-main").DataTable({
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
        url: $("#urlPath").val() + '/api/Kompetensi',
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
            url: $("#urlPath").val() + "/api/Kompetensi/editLevel/" + ddlKompetensi,
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
            url: $("#urlPath").val() + "/api/Kompetensi/Level/" + ddlKompetensi,
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
        url: $("#urlPath").val() + "/api/Kompetensi/listKompetensi/" + menuid,
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
        url: $("#urlPath").val() + "/api/Kompetensi/listLevelKompetensi/" + kompetensi_id,
        type: 'get',
        dataType: 'json',
        success: function (result) {
            var tbl = $("#tblEditLevelTemp").DataTable();
            tbl.rows()
                .remove()
                .draw();
            var data = result.data;
            for (let i = 0; i < data.length; i++) {
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
                let level = $(parents[0]).attr("level");
                console.log(kompetensi_id, level);
                $.ajax({
                    url: $("#urlPath").val() + "/api/Kompetensi/deleteLevel/" + kompetensi_id + "/" + level,
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
        console.log(err);

        swal("Error!",
            err,
            "warning"
        );
    }
}