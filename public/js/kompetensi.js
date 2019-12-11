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
        url: $("#urlPath").val() + "/api/Kompetensi/" + menuid,
        type: 'get',
        dataType: 'json',
        success: function (result) {
            console.log(result.data);
            let rawhtml = "";
            let data = result.data;
            let rownum = 0;
            for (let i = 0; i < data.length; i++) {
                // debugger;
                let data_level = data[i].level_kompetensi;
                let count_level = data_level.length;
                let flag_col_kompetensi = 0;
                let old_level = -1;
                let no = i + 1;
                if (count_level > 0) {
                    for (let j = 0; j < data_level.length; j++,rownum++) {
                        rawhtml = '<tr rownum="'+rownum+'" level="' + data_level[j].level + '" level_id="' + data_level[j].id + '" kompetensi_id="' + data_level[j].kompetensi_id + '">'
                        // if (flag_col_kompetensi == 0) {
                        if (old_level != data_level[j].level) {
                            rawhtml += '<td>' + no + '</td>' +
                                '<td>' +
                                '<center><button type="button" class="btn btn-warning waves-effect m-r-20" onclick="showDeskripsiKompetensi(this)">' + data[i].name + '</button></center>' +
                                '</td>';
                            // rawhtml += '<td rowspan="'+count_level+'">' + no + '</td>' +
                            //     '<td rowspan="'+count_level+'"><center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#IntegritasModal">' + data[i].name + '</button></center>' +
                            //     '</td>';

                        } else {
                            rawhtml += '<td></td><td></td>'
                        }

                        rawhtml += '<td> LEVEL ' + data_level[j].level + '</td>';
                        rawhtml += '<td>'+ data_level[j].level_description + '</td>';
                        rawhtml += '<td>' + data_level[j].nilai_minimum + '</td>';
                        rawhtml += '<td>'+ (data[i].gap!=null?data[i].gap:' ') + '</td>';
                        rawhtml += '<td>' + data_level[j].index_perilaku.replace(/\n/g, "<br/>");
                        rawhtml += '</td>';
                        // if (flag_col_kompetensi == 0) {
                        if (old_level != data_level[j].level && isAdm == "admin") {
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
                        rawhtml += '<td style="display:none;">'+data[i].description+'</td>';
                        rawhtml += '<td style="display:none;">'+data[i].name+'</td>';
                        rawhtml += '</tr>'
                        flag_col_kompetensi++;
                        old_level = data_level[j].level;
                        $("#table-main tbody").append(rawhtml);
                        // console.log(data[i]);
                        // console.log(rawhtml);
                    }
                }
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
    $("#inNilaiMin").val(0);
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
                kompetensi_id: ddlKompetensi,
                nilai_minimum: data[3]
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
                kompetensi_id: ddlKompetensi,
                nilai_minimum:data[3]
            }
            list_level.push(item_level);
        });

        let req = list_level;
        console.log(req);
        
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
        let inNilaiMin = $("#modalEditData #inNilaiMin").val();
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
            inNilaiMin
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
        let inNilaiMin = $("#modalTambahData #inNilaiMin").val();
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
            inNilaiMin
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
                    data[i].nilai_minimum
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

function showDeskripsiKompetensi(e)
{
    var parents = $(e).closest("tr");
    let rownum = parseInt($(parents[0]).attr("rownum"));
    console.log(rownum);
    let data = $("#table-main").DataTable().data();
    console.log(data[rownum])
    $("#desc_komp_show").val(data[rownum][8])
    $("#komp_name_show").text(data[rownum][9]);
    $("#modalDeskripsiKompetensi").modal("show");
}

$("#btnTambahDataGAP").click(function(){
    loadDdlKompetensiGAP();
    $("#modalTambahDataGAP").modal("show");
})

function loadDdlKompetensiGAP() {
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
            $("#ddlKompetensiGAP").html(rawhtml)
        }
    })
}

function loadDataGAP(e){
    try{
        let kompetensi_id = $(e).val();
        if(kompetensi_id=="") throw "tidak ada Kompetensi yang dipilih";
        $.ajax({
            url: $("#urlPath").val() + "/api/kompetensi/"+kompetensi_id+"/gap",
            type: 'get',
            dataType: 'json',
            success: function (result) {
                let data = result.data;
                $("#inGAP").val(data.gap);
                $("#inJenisProgramPengembangan").val(data.jenis_program_pengembangan);
                $("#inIsiProgramPengembangan").val(data.isi_program_pengembangan);
            }
        })
    } catch(err){
        $("#inGAP").val(0);
        $("#inJenisProgramPengembangan").val("");
        $("#inIsiProgramPengembangan").val("");
    }
}

function clearFieldGAP(){
    $("#ddlKompetensiGAP").val("");
    $("#inGAP").val(0);
    $("#inJenisProgramPengembangan").val("");
    $("#inIsiProgramPengembangan").val("");
}

function saveGAP() {
    try{
        let kompetensi_id = $("#ddlKompetensiGAP").val();
        if(kompetensi_id == null || kompetensi_id == "") throw "Harap Pilih Kompetensi Terlebih dahulu";
        var req = {
            gap:$("#inGAP").val(),
            jenis_program_pengembangan:$("#inJenisProgramPengembangan").val(),
            isi_program_pengembangan:$("#inIsiProgramPengembangan").val(),
        }
        $.ajax({
            url: $("#urlPath").val() + "/api/kompetensi/"+kompetensi_id+"/gap",
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
                $("#modalTambahDataGAP").modal("hide");
                clearFieldGAP();
            }
        });
    } catch(err) {
        console.log(err);

        swal("Error!",
            err,
            "warning"
        );
    }
}

