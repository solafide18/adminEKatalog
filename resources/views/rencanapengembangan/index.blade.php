@extends('shared.layout')

@section('content')
<style>
    .tablewrap {
        overflow: auto;
        padding: 10px 10px 10px 10px;
    }
    input.form-control.disabled{
        background-color: rgb(218, 213, 213);
    }
</style>
<div class="block-header">
    <h2>Rencana Pengembangan Kompetensi</h2>
    <h5>Badan Ekonomi Kreatif</h5>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Rencana Pengembangan Kompetensi</h2>

            </div>
            <div class="body">
                @if($isAdmin == 'admin')
                <button type="button" class="btn btn-info waves-effect m-r-20" id="btnTambahData">Tambah
                    Data</button>
                <br>
                @endif
            </div>
            <div class="wrapper-grid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tablewrap">
                            <table id="table-main" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pegawai</th>
                                        <th>Kompetensi</th>
                                        <th>Level</th>
                                        <th>Nilai pemetaan</th>
                                        <th>Nilai</th>
                                        <th>GAP</th>
                                        <th>Informasi</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
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
    <div class="modal-dialog modal-lg" role="document">
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
                            <label for="">Pegawai ID / PIN</label>
                        </div>
                        <div class="col-md-7">
                            <input type="hidden" id="inIdPegawaiKompetensi" class="form-group form-control">
                            <input type="text" id="inPegawaiID" class="form-group form-control">
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-info waves-effect m-r-20" id="btnSearch" onclick="findPegawai()"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Pegawai Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="inPegawaiName" class="form-group form-control disabled" readonly>
                            <input type="hidden" id="inPegawaiNIP" class="form-group form-control disabled" readonly>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Esselon</label>
                        </div>
                        <div class="col-md-8">
                            <select class='form-group form-control' id="ddlEsselon" onchange="setLevelKompDdl(this)">
                                <option value="">Select Esselon</option>
                                <option value="2">2</option>
                                <option value="3">3</option>  
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kompetensi Level</label>
                        </div>
                        <div class="col-md-8">
                            <select class='form-group form-control' id="ddlKompetensiLevel" onchange="getNilaiMinimum(this)">
                                <option value="">Select option</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nilai Minimum</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" min="1" value="1" readonly class="input-group form-control disabled"
                                id="inNilaiMin">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nilai</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" min="1" value="1" class="input-group form-control" id="inNilai" onchange="nilaiChange(this)">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">GAP</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" readonly class="input-group form-control disabled"
                                id="inGAP">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Informasi</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="input-group form-control" id="inInformation">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveAddData" onclick="save()">Add Data</button>
                <button type="button" class="btn btn-success" id="btnSaveEditData" onclick="saveEditData()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{url('/')}}/js/rencanaPengembangan.js"></script>
@endsection