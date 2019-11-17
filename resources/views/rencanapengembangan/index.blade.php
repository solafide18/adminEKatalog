@extends('shared.layout')

@section('content')
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
                <td><button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">Tambah Data</button></td>

                <td><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#tambahkompentensiLabel">Tambah Kompetensi</button></td>
                <br>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kompetensi</th>
                            <th>Level</th>
                            <th>Indikator Perilaku</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kompetensi</th>
                            <th>Level</th>
                            <th>Indikator Perilaku</th>

                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#IntegritasModal">KOMITMEN TERHADAP
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

                                <div class="row clearfix js-sweetalert">
                                    <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">mode_edit</i></button>
                                    <button type="button" class="btn btn-danger waves-effect m-r-20" data-type="confirm"><i class="material-icons">cancel</i></button>
                                </div>

                            </td>


                        </tr>







                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#kerjasamaModal">EMPATI</button>
                                </center>
                            </td>
                            <td>LEVEL 2 - Menyediakan diri untuk selalu mendengarkan keluhan/ ungkapan perasaan
                                orang lain

                            </td>
                            <td>
                                <li>2.1. Memberikan kesempatan kepada orang lain untuk mengugkapkan perasaan;
                                </li>
                                <li>2.2. Meluangkan waktu di sela-sela pekerjaan untuk mendengarkan keluh kesah
                                    orang lain;</li>
                                <li>2.3. Secara aktif berusaha untuk mengerti persoalan
                                </li>

                            </td>

                            <td>
                                <div class="row clearfix js-sweetalert">
                                    <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">mode_edit</i></button>
                                    <button type="button" class="btn btn-danger waves-effect m-r-20" data-type="confirm"><i class="material-icons">cancel</i></button>

                            </td>
            </div>


            </tr>







            <tr>
                <td>3</td>
                <td>
                    <center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#komunikasiModal">INOVASI</button></center>
                </td>
                <td>LEVEL 2 - Mengidentifikasi alternatif ide/ gagasan baru yang mungkin dapat diterapkan

                </td>
                <td>
                    <li>2.1. Mengenali gagasan yang muncul dalam tim;</li>
                    <li>2.2. Mengidentifikasi gagasan yang dapat diterapkan dalam pekerjaan;</li>
                    <li>2.3. Mengetahui gagasan penting yang dapat mendukung kinerja.

                    </li>

                </td>

                <td>
                    <div class="row clearfix js-sweetalert">
                        <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">mode_edit</i></button>
                        <button type="button" class="btn btn-danger waves-effect m-r-20" data-type="confirm"><i class="material-icons">cancel</i></button>

                </td>
        </div>


        </tr>




        <tr>
            <td>4</td>
            <td>
                <center><button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#orientasiModal">KEPEMIMPINAN</button></center>
            </td>
            <td>LEVEL 2 - Membina bawahan dalam penyelesaian pekerjaan


            </td>
            <td>
                <li>2.1. Mengetahui kekuatan tim;</li>
                <li>2.2. Membina tim berdasarkan kekuatannya;</li>
                <li>2.3. Mendukung pelaksanaan tugas timnya.

                </li>

            </td>

            <td>
                <div class="row clearfix js-sweetalert">
                    <button type="button" class="btn btn-info waves-effect m-r-20" data-toggle="modal" data-target="#largeModal"><i class="material-icons">mode_edit</i></button>
                    <button type="button" class="btn btn-danger waves-effect m-r-20" data-type="confirm"><i class="material-icons">cancel</i></button>

            </td>
    </div>


    </tr>


    </tbody>
    </table>
</div>
@endsection