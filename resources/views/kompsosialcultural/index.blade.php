@extends('shared.layout')

@section('content')
<style>
    .tablewrap {
        overflow: auto;
        padding: 10px 10px 10px 10px;
    }
</style>
<input type="hidden" id="menuid" value="3">
<div class="block-header">
    <h2>Kamus Kompetensi Sosial Cultural</h2>
    <h5>Badan Ekonomi Kreatif</h5>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                Kamus Kompetensi Sosial Cultural
                </h2>

            </div>
            <div class="body">
                @if($isAdmin == 'admin')
                    <button type="button" class="btn btn-success waves-effect m-r-20" id="btnTambahDataGAP">GAP</button>
                    <button type="button" class="btn btn-info waves-effect m-r-20" id="btnTambahData">Tambah Data</button>
                    <button type="button" class="btn btn-warning waves-effect m-r-20" id="btnTambahDataKompetensi">Tambah Kompetensi</button>
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
                                        <th style="width: 260px;">Action</th>
                                        <th>Kompetensi</th>
                                        <th style="width: 250px;">Standar Level</th>
                                        <th>Nilai Pemetaan</th>
                                        <!-- <th style="width: 200px;">GAP</th>
                                        <th style="width: 200px;">Program Pengembangan</th> -->
                                        <th style="width: 300px;">Indikator Prilaku</th>
                                        <th style="display:none;">Deskripsi</th>
                                        <th style="display:none;">Kompetensi Name</th>
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
                            <label for="">Kompetensi</label>
                        </div>
                        <div class="col-md-8">
                            <select class='form-group form-control' id="ddlKompetensi">
                                <option value="">Select option</option>
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
                            <label for="">Nilai minimum</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" min="0" value="0" class="input-group form-control required"
                                id="inNilaiMin">
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
                            <label for="">Indikator Perilaku</label>
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
                                    <th>Indikator Perilaku</th>
                                    <th>Nilai Minimum</th>
                                    <th>Action</th>
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
    <div class="modal-dialog modal-lg" role="document">
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
                            <label for="">Nilai minimum</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" min="0" value="0" class="input-group form-control required"
                                id="inNilaiMin">
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
                            <label for="">Indikator Perilaku</label>
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
                                    <th>Indikator Prilaku</th>
                                    <th>Nilai Minimum</th>
                                    <th>Action</th>
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
<div class="modal fade" id="modalDeskripsiKompetensi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="komp_name_show"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- <div class="col-md-4">
                        <label for="">Deskripsi</label>
                    </div>
                    <div class="col-md-8">
                        <textarea readonly type="text" class="input-group form-control required" id="desc_komp_show"></textarea>
                    </div> -->
                    <div class="col-md-12">
                        <p id="desc_komp_show"></p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTambahDataGAP" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">GAP DATA</h4>
                <hr>
            </div>
            <div class="modal-body">

                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kompetensi</label>
                        </div>
                        <div class="col-md-8">
                            <select class='form-group form-control' id="ddlKompetensiGAP" onchange="loadDdlLevelKompetensiGAP(this)">
                                <option value="">Select option</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Level Kompetensi</label>
                        </div>
                        <div class="col-md-8">
                            <select class='form-group form-control' id="ddlLevelKompetensiGAP" onchange="loadDataGAP(this)">
                                <option value="">Select option</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">GAP</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" max="0" value="0" class="input-group form-control required"
                                id="inGAP">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Jenis Program Pengembangan</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-group form-control" name="" id="inJenisProgramPengembangan"
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Isi Program Pengembangan</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-group form-control" name="" id="inIsiProgramPengembangan"
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-warning" onclick="addGAPTemp()">Add GAP</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="tblAddGAPTemp" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>GAP</th>
                                    <th>Jenis Program Pengembangan</th>
                                    <th>Isi Program Pengembangan</th>
                                    <th>Action</th>
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
                <button type="button" class="btn btn-primary" onclick="saveGAP()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalShowGAPDesckripsi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">GAP DATA</h4>
                <hr>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <table id="tblGAPDesc" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>GAP</th>
                                    <th>Jenis Program Pengembangan</th>
                                    <th>Isi Program Pengembangan</th>
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
            </div>
        </div>
    </div>
</div>
<script src="{{url('/')}}/js/kompetensi.js" type=""></script>
@endsection