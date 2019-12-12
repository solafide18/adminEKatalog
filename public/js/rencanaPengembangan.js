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
            // console.log(result.data);
            let rawhtml = "";
            let data = result.data;
            for (let i = 0; i < data.length; i++) {
                rawhtml = '<tr uid="' + data[i].id + '">';
                rawhtml += '<td>'+data[i].pegawai_id+' - '+ data[i].pegawai_name +'</td>';
                rawhtml += '<td>'+data[i].code+' - '+ data[i].name +'</td>';
                rawhtml += '<td>'+data[i].level+' - '+ data[i].description +'</td>';
                rawhtml += '<td>'+data[i].nilai_minimum+'</td>';
                rawhtml += '<td>'+data[i].nilai+'</td>';
                rawhtml += '<td>'+data[i].gap+'</td>';
                rawhtml += '<td>'+data[i].information+'</td>';
                rawhtml += '<td>'+'<div class="js-sweetalert">';
                if(isAdm == 'admin'){
                    rawhtml += '<button type="button" onclick="editData(this)" class="btn btn-info waves-effect m-r-20"><i class="material-icons">mode_edit</i></button>';
                    rawhtml += '<button type="button" onclick="deleteData(this)" class="btn btn-danger waves-effect m-r-20"><i class="material-icons">cancel</i></button>';
                }
                rawhtml += '</div>' +'</td>';
                rawhtml += '</tr>';
                // console.log(data[i]);
                
                $("#table-main tbody").append(rawhtml);
            }
            $("#table-main").DataTable({
                // paging: false,
                "ordering": false
            });
        },
        error:function(err){
            console.log(err);
            
        }
    })
}

$("#btnTambahData").click(function () { 
    clearFieldTambahData();
    // loadDDLPegawai();

    //loadDDLKompetensi();
    $("#btnSaveAddData").show();
    $("#btnSaveEditData").hide();
    $("#modalTambahData").modal("show");
})
function clearFieldTambahData()
{
    $("#ddlKompetensiLevel").val("");
    $("#inPegawaiID").val("");
    $("#inPegawaiName").val("");
    $("#inNilaiMin").val("");
    $("#inNilai").val("");
    $("#inPegawaiNIP").val("");
    $("#inGAP").val("");
    $("#inInformation").val("");
    $("#inIdPegawaiKompetensi").val("");
    $("#inPegawaiID").removeClass("disabled");
    $("#inPegawaiID").removeAttr("readonly","readonly");
    $("#btnSearch").show();
}
function loadDDLPegawai()
{
    $.ajax({
        url: $("#urlPath").val() + "/api/pegawai/listPegawai",
        type: 'get',
        dataType: 'json',
        success: function (result) {

        },
        error:function(err){
            console.log(err);            
        }
    })
}
function loadDDLKompetensi(esselon)
{
    $.ajax({
        url: $("#urlPath").val() + "/api/kompetensi/levelKompetensi/" + esselon,
        type: 'get',
        dataType: 'json',
        success: function (result) {
            let data = result.data;
            for(let i=0;i<data.length;i++)
            {
                let rawhtml = '<option value="">Select option</option>';
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    rawhtml += '<option nilmin="'+data[i].nilai_minimum+'" value="' + data[i].id + '">'+data[i].name+'(' + data[i].code+') - Level ';
                    rawhtml +=  data[i].level+' - '+ data[i].level_description + '</option>';
                }
                $("#ddlKompetensiLevel").html(rawhtml)
            }
        },
        error:function(err){
            console.log(err);            
        }
    })
}

function findPegawai()
{
    console.log("finding starting");
    let words = $("#inPegawaiID").val();
    $.ajax({
        url: $("#urlPath").val() + "/api/pegawai/listPegawai/"+words+"/search",
        type: 'get',
        dataType: 'json',
        success: function (result) {
            
            let data = result.data;
            let item = data;
            if(item == null )
            {
                $("#inPegawaiName").val("");
                $("#inPegawaiNIP").val("");
                swal("Error!",
                    "Pegawai ID : " + words+", Tidak ditemukan",
                    "warning"
                );
            }
            else{
                $("#inPegawaiName").val(item.nama);
                $("#inPegawaiNIP").val(item.nip);
            }
        },
        error:function(err){
            console.log(err);      
            swal("Error!",
                err,
                "warning"
            );      
        }
    })
}

function setLevelKompDdl(e) {
    $("#ddlKompetensiLevel").val("");
    // console.log("get value test");
    var value = $("#ddlEsselon").val()
    console.log(value);
    loadDDLKompetensi(value);
}

function getNilaiMinimum(e)
{
    // debugger;
    var nilmin = $('option:selected', e).attr('nilmin');
    // console.log("find nilai min = ",nilmin);
    $("#inNilaiMin").val(nilmin);

    let nilai = $("#inNilai").val();
    let nilai_min = $("#inNilaiMin").val();
    let gap = parseInt(nilai==null?0:nilai)-parseInt(nilai_min);
    $("#inGAP").val(gap);
}

function nilaiChange(e)
{
    let nilai = $(e).val();
    let nilai_min = $("#inNilaiMin").val();
    let gap = parseInt(nilai)-parseInt(nilai_min);
    $("#inGAP").val(gap);
}

function save()
{
    try{
        let level_kompetensi_id = $("#ddlKompetensiLevel").val();
        let pegawai_id = $("#inPegawaiID").val();
        let pegawai_name = $("#inPegawaiName").val();
        let nilai = $("#inNilai").val();
        let nilai_min = $("#inNilaiMin").val();
        let gap = parseInt(nilai)-parseInt(nilai_min);
        let nip = $("#inPegawaiNIP").val();
        let information = $("#inInformation").val();
        if(pegawai_name == null || pegawai_name == undefined || pegawai_name == "" ) throw "Pastikan Pegawai ID yang anda masukan benar, dan tekan tombol search untuk memastikan";
        if(level_kompetensi_id == null || level_kompetensi_id == undefined || level_kompetensi_id == ""  ) throw "Field Kompetensi Level masih Kosong/Belum dipilih";
        if(nilai == null || nilai == undefined || nilai == "" ) throw "Field Nilai masih Kosong";
        if(information == null || information == undefined || information == "" ) throw "Field Informasi masih Kosong";
        let req = {
            pegawai_id:pegawai_id,
            pegawai_name:pegawai_name,
            nip:nip==null?" ":nip,
            level_kompetensi_id:level_kompetensi_id,
            nilai:nilai,
            gap:gap,
            information:information
        }
        // console.log(req);
        
        $.ajax({
            url: $("#urlPath").val() + "/api/pegawai/kompetensi",
            type: 'post',
            data:{req:req},
            dataType: 'json',
            success: function (result) {
                loadgrid();
                $("#modalTambahData").modal("hide");
                clearFieldTambahData();
                swal("Success!",
                    result.message,
                    "success"
                );
            },
            error:function(err){
                console.log(err);            
                swal("Error!",
                    err,
                    "error"
                );
            }
        })

    } catch(err) {
        swal("Warning!",
            err,
            "warning"
        );
    }
}

function deleteData(e)
{
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

                let uid = $(parents[0]).attr("uid");
                // let level = $(parents[0]).attr("level");
                // console.log(kompetensi_id, level);
                $.ajax({
                    url: $("#urlPath").val() + "/api/pegawai/kompetensi/" + uid,
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

function editData(e){
    try {
        clearFieldTambahData();
        // loadDDLPegawai();
        
        var parents = $(e).closest("tr");
        if (parents.length == 0) throw "Kompetensi ID tidak ditemukan";
        let uid = $(parents[0]).attr("uid");
        loadDDLKompetensi();

        $.ajax({
            url: $("#urlPath").val() + "/api/pegawai/listPegawai/" + uid,
            type: 'get',
            dataType: 'json',
            success: function (result) {
                if (result.code != 200) throw result.message;
                let data = result.data;
                $("#inIdPegawaiKompetensi").val(data.id);
                $("#ddlKompetensiLevel").val(data.level);
                $("#inPegawaiID").val(data.pegawai_id);
                $("#inPegawaiName").val(data.pegawai_name);
                $("#inNilai").val(data.nilai);
                $("#inNilaiMin").val(data.nilai_minimum);
                $("#inPegawaiNIP").val(data.nip);
                $("#inInformation").val(data.information);
                $("#inGAP").val(data.gap);

                $("#inPegawaiID").addClass("disabled");
                $("#inPegawaiID").attr("readonly","readonly");
                $("#btnSearch").hide();
                $("#btnSaveAddData").hide();
                $("#btnSaveEditData").show();
                $("#modalTambahData").modal("show");
            },
            error: function (err) {
                console.log(err);
                swal("Error!",
                    err,
                    "error"
                );
            }
        })
        
    } catch (err) {
        console.log(err);

        swal("Error!",
            err,
            "warning"
        );
    }
}

function saveEditData() {
    try{
        let inIdPegawaiKompetensi = $("#inIdPegawaiKompetensi").val();
        let level_kompetensi_id = $("#ddlKompetensiLevel").val();
        let pegawai_id = $("#inPegawaiID").val();
        let pegawai_name = $("#inPegawaiName").val();
        let nilai = $("#inNilai").val();
        let nilai_min = $("#inNilaiMin").val();
        let gap = parseInt(nilai)-parseInt(nilai_min);
        let nip = $("#inPegawaiNIP").val();
        let information = $("#inInformation").val();
        let req = {
            id : inIdPegawaiKompetensi,
            pegawai_id:pegawai_id,
            pegawai_name:pegawai_name,
            nip:nip==null?" ":nip,
            level_kompetensi_id:level_kompetensi_id,
            nilai:nilai,
            gap:gap,
            information:information
        }
        $.ajax({
            url: $("#urlPath").val() + "/api/pegawai/kompetensi",
            type: 'put',
            data:{req:req},
            dataType: 'json',
            success: function (result) {
                loadgrid();
                
                $("#modalTambahData").modal("hide");
                clearFieldTambahData();
                swal("Success!",
                    result.message,
                    "success"
                );
            },
            error:function(err){
                console.log(err);            
                swal("Error!",
                    err,
                    "error"
                );
            }
        })
        
    } catch(err) {

    }
}