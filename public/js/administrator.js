


$("#btnAddAdmin").click(function () {
    $("#pegawai_id").val("");
    $("#is_admin").val("true");
    $("#modalAddAdmin").modal("show");
})

$("#modalAddAdmin button#btnAddkompetensi").click(function () {
    alert("ok");
    var req = {
        pegawai_id: $("#pegawai_id").val()
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
