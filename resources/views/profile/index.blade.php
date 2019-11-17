@extends('shared.layout')

@section('content')
<div class="row clearfix">
    <div class="col-xs-12 col-sm-3">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="admin/images/defri.jpg" alt="AdminBSB - Profile Image" />
                </div>
                <div class="content-area">
                    <h3>Defrimont Era</h3>
                    <h6>Penata Muda / II C</h6>
                    <p>199702172019021001</p>
                    <p>Staf LPSE</p>
                </div>
            </div>

        </div>

        <div class="card card-about-me">
            <div class="header">
                <h2>Identitas Diri</h2>
            </div>
            <div class="body">
                <ul>
                    <li>
                        <div class="title">
                            <i class="material-icons">library_books</i>
                            Pendidikan Terakhir
                        </div>
                        <div class="content">
                            S1/D4
                        </div>
                    </li>

                    <ul>
                        <li>
                            <div class="title">
                                <i class="material-icons">library_books</i>
                                Jabatan
                            </div>
                            <div class="content">
                                Pengelola Layanan Pengadaan Secara Elektronik Pada Sub Bagian Layanan Pengadaan Secara Elektronik >
                                Bagian Pengadaan Barang Dan Jasa > Biro Umum
                                Dan Kepegawaian > Sekretariat Utama
                                Badan Ekonomi Kreatif
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">library_books</i>
                                Tugas Pokok & Fungsi
                            </div>
                            <div class="content">
                                ---------------

                            </div>
                        </li>

                        <li>
                            <div class="title">
                                <i class="material-icons">library_books</i>
                                Riwayat Kepangkatan
                            </div>
                            <div class="content">
                                ---------------
                            </div>
                        </li>

                    </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">SKP</a></li>
                        <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Kompetensi</a></li>
                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Potensi</a></li>
                        <li role="presentation"><a href="#petabakat" aria-controls="settings" role="tab" data-toggle="tab">Peta Bakat</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">

                                        <div class="header">
                                            <h2>
                                                SKP
                                            </h2>


                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <select class="form-control show-tick">
                                                        <option value="">-- Pilih Tahun --</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Periode</th>
                                                            <th>SKP</th>
                                                            <th>Perilaku</th>
                                                            <th>Prestasi</th>

                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Periode</th>
                                                            <th>SKP</th>
                                                            <th>Perilaku</th>
                                                            <th>Prestasi</th>

                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2016</td>
                                                            <td>86.80</td>
                                                            <td>89.00</td>
                                                            <td> </td>

                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>2017</td>
                                                            <td>88.92</td>
                                                            <td></td>
                                                            <td></td>

                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>2018</td>
                                                            <td>90.78</td>
                                                            <td>89.00</td>
                                                            <td></td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
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
                                                            <th>2016</th>


                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Kode Kompetensi</th>
                                                            <th>Nama Kompetensi</th>
                                                            <th>2016</th>


                                                        </tr>
                                                    </tfoot>
                                                    <tbody>


                                                        <tr>
                                                            <td>BPP</td>
                                                            <td>Berorientasi Pada Pelayanan</td>
                                                            <td>2</td>


                                                        </tr>
                                                        <tr>
                                                            <td>INT</td>
                                                            <td>Integritas</td>
                                                            <td>2</td>


                                                        </tr>
                                                        <tr>
                                                            <td>KS</td>
                                                            <td>Kerjasama</td>
                                                            <td>2</td>


                                                        </tr>
                                                        <tr>
                                                            <td>KTO</td>
                                                            <td>Komitmen Pada Organisasi</td>
                                                            <td>1</td>


                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Potensi
                                            </h2>

                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Potensi</th>
                                                            <th>Nilai</th>


                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Potensi</th>
                                                            <th>Nilai</th>

                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>KECERDASAN UMUM</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>ANALISA SINTESA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>LOGIKA BERPIKIR</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>FLEKSIBILITAS BERPIKIR</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>KEMAMPUAN VERBAL</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>PENGENDALIAN DIRI/EMOSI</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>KEPERCAYAAN DIRI</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>PENYESUAIAN DIRI</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>TOLERANSI THD STRESS</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>HASRAT BERPRESTASI</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>POTENSI USAHA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>SISTEMATIKA KERJA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>DAYA TAHAN KERJA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>KUALITAS KERJA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td>KERJASAMA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td>KEPEMIMPINAN</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td>KOMITMEN TERHADAP TUGAS</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>18</td>
                                                            <td>KETAATAN PD ATURAN</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>19</td>
                                                            <td>PERENCANAAN KERJA</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>20</td>
                                                            <td>ORIENTASI PD PELAYANAN</td>
                                                            <td></td>


                                                        </tr>
                                                        <tr>
                                                            <td>21</td>
                                                            <td>PENGAWASAN/PENGENDALIAN</td>
                                                            <td></td>


                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div role="tabpanel" class="tab-pane fade in" id="petabakat">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Peta Bakat
                                            </h2>

                                        </div>
                                        <div class="body">

                                            <img src="admin/images/petabakat.png" class="js-animating-object img-responsive" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection