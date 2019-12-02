@extends('shared.layout')

@section('content')
<style>
    .tablewrap {
        overflow: auto;
        padding: 10px 10px 10px 10px;
    }
</style>
<input type="hidden" id="menuid" value="1">
<div class="block-header">
    <h2>Admin Setup</h2>
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
                                        <th>ID pegawai</th>
                                        <th>is Admin</th>
                                        <th>Created At</th>
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
                            <label for="">ID Pegawai</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="input-group form-control required"
                                id="inIdPegawai">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSaveAddData" onclick="save()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{url('/')}}/js/adminSetup.js" type=""></script>
@endsection
