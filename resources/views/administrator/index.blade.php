@extends('shared.layout')

@section('content')
<div class="row clearfix">

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a aria-controls="settings" role="tab" data-toggle="tab">Admin Setup</a></li>
    </ul>

    <div class="body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th>ID pegawai</th>
                        <th>is Admin</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listAdmin as $item)
                        <tr>
                            <td>{{$item->pegawai_id}}</td>
                            <td>{{$item->is_admin}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                            <button type="button" class="btn btn-info waves-effect m-r-20" id="btnDeleteAdmin">
                                Delete
                            </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>
        <button type="button" class="btn btn-info waves-effect m-r-20" id="btnAddAdmin">
            Tambah Data
        </button>

    </div>




    <!-- <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">

                      
                        <div role="tabpanel" class="tab-pane fade in" id="profile_settings">


                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Kompetensi
                                            </h2>

                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Kompetensi</th>
                                                            <th>Nama Kompetensi</th>
                                                            <th>Level</th>
                                                            <th>GAP</th>

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
            </div>
        </div>
    </div> -->


</div>
@endsection