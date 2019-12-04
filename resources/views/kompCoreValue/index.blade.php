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
    <h2>Kamus Kompetensi Core Value</h2>
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
                    <td><button type="button" class="btn btn-info waves-effect m-r-20" id="btnTambahData">Tambah
                            Data</button></td>

                    <td><button type="button" class="btn btn-warning waves-effect m-r-20"
                            id="btnTambahDataKompetensi">Tambah Kompetensi</button></td>
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
                                        <th>No</th>
                                        <th>Kompetensi</th>
                                        <th>Level</th>
                                        <th>Nilai Minimum</th>
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
                                    <th>Nilai Minimum</th>
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
                                    <th>Indikator Prilaku</th>
                                    <th>Nilai Minimum</th>
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
<script src="{{url('/')}}/js/kompetensi.js" type=""></script>
@endsection