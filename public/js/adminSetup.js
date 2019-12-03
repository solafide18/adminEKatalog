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
        url: $("#urlPath").val() + "/api/admin",
        type: 'get',
        dataType: 'json',
        success: function (result) {
            // console.log(result.data);
            let rawhtml = "";
            let data = result.data;
            for (let i = 0; i < data.length; i++) {
                rawhtml = '<tr uid="' + data[i].id + '">';
                rawhtml += '<td>'+data[i].pegawai_id+'</td>';
                rawhtml += '<td>'+data[i].is_admin +'</td>';
                rawhtml += '<td>'+data[i].created_at +'</td>';
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
    $("#modalTambahData").modal("show");
})
function clearFieldTambahData()
{
    $("#inIdPegawai").val("");
}

function save()
{
    try{
        let pegawai_id = $("#inIdPegawai").val();
        let tblAdminTemp = $("#table-main").DataTable();
        let flag_is_valid = true;
        tblAdminTemp.data().each(function (data, idx) {
            // debugger;
            if (pegawai_id == data[0]) flag_is_valid = false;
        });
        if (!flag_is_valid) throw "Data Sudah ada";
        
        if(pegawai_id == null || pegawai_id == undefined || pegawai_id == "") throw "Field ID Pegawai masih kosong";
        let req = {
            pegawai_id:pegawai_id,
        }
        console.log(req);
        // throw "test";
        $.ajax({
            url: $("#urlPath").val() + "/api/admin",
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
                    url: $("#urlPath").val() + "/api/admin/"+uid,
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