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
                rawhtml += '<td>'+'<div class="js-sweetalert">';
                if(isAdm == 'admin'){
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
        }
    })
}

$("#btnTambahData").click(function () { 
    clearFieldTambahData();
    // loadDDLPegawai();
    loadDDLKompetensi();
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
function loadDDLKompetensi()
{
    $.ajax({
        url: $("#urlPath").val() + "/api/pegawai/listKompetensiLevel",
        type: 'get',
        dataType: 'json',
        success: function (result) {
            let data = result.data;
            for(let i=0;i<data.length;i++)
            {
                let rawhtml = '<option value="">Select option</option>';
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    rawhtml += '<option nilmin="'+data[i].nilai_minimum+'" value="' + data[i].level + '">'+data[i].name+'(' + data[i].code+') - Level ';
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
    
    $.ajax({
        url: $("#urlPath").val() + "/api/pegawai/listPegawai",
        type: 'get',
        dataType: 'json',
        success: function (result) {
            let words = $("#inPegawaiID").val();
            let data = result.data;
            let item = data.find(item=>item.pin === words);
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

function getNilaiMinimum(e)
{
    // debugger;
    var nilmin = $('option:selected', e).attr('nilmin');
    console.log("find nilai min = ",nilmin);
    $("#inNilaiMin").val(nilmin);
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
    if(pegawai_name == null || pegawai_name == undefined || pegawai_name == "" || pegawai_name == "undefined") throw "Pastikan Pegawai ID yang anda masukan benar, dan tekan tombol search untuk memastikan";
    if(level_kompetensi_id == null || level_kompetensi_id == undefined || level_kompetensi_id == "" || level_kompetensi_id == "undefined") throw "Field Kompetensi Level masih Kosong/Belum dipilih";
    if(nilai == null || nilai == undefined || nilai == "" || nilai == "undefined") throw "Field Nilai masih Kosong";
    let req = {
        pegawai_id:pegawai_id,
        pegawai_name:pegawai_name,
        nip:nip==null?" ":nip,
        level_kompetensi_id:level_kompetensi_id,
        nilai:nilai,
        gap:gap
    }
    console.log(req);
    
    $.ajax({
        url: $("#urlPath").val() + "/api/pegawai/kompetensi",
        type: 'post',
        data:{req:req},
        dataType: 'json',
        success: function (result) {
            loadgrid();
            $("#modalTambahData").modal("hide");
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