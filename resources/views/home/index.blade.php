@extends('shared.layout')

@section('content')
<div class="block-header">
    <h2>INFORMASI KARIR</h2>
</div>

<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">KUALIFIKASI KOMPETENSI JABATAN</div>
                <div class="text">Informasi Kualifikasi Kompetensi Jabatan</div>
            </div>
        </div>
    </div>




    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text">STANDAR KOMPETENSI JABATAN</div>
                <div class="text">Informasi Standar Kompetensi Jabatan</div>
            </div>
        </div>
    </div>
</div>



<div class="row clearfix">
    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
        <a href="kamuskompetensi.html">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">book</i>
                </div>
                <div class="content">
                    <div class="text">KAMUS KOMPETENSI</div>
                    <div class="number">8 DATA KOMPETENSI</div>
                </div>
        </a>
    </div>
</div>
<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">help</i>
        </div>
        <div class="content">
            <div class="text">KATALOG PENGEMBANGAN</div>
            <div class="text">Informasi Katalog Pengembangan</div>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text">MANUAL USER</div>
            <div class="text">Info Cara Menggunakan Aplikasi</div>
        </div>
    </div>
</div>
@endsection