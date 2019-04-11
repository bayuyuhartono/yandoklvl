@extends('layouts.app')

@section('content')

<section class="content">
    <div class="container-fluid">
        <ol class="breadcrumb  align-right">
            <li>
                <a href="{{ url('beranda') }}">
                    <i class="material-icons">home</i> Beranda
                </a>
            </li>
            <li class="active">
                <i class="material-icons">add</i> Ajukan Pemesanan
            </li>
        </ol>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form action="add" id="form_advanced_validation" method="post">
                        @csrf
                            <div class="header">
                                <div class="input-group">
                                    <b>Masukkan Kode Verifikasi</b>
                                </div>
                                <div class="input-group">
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">credit_card</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="otptext" class="form-control credit-card" placeholder="_ _ _ _">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary waves-effect" type="submit" >SUBMIT</button>
                                        <a class="btn btn-primary waves-effect" href="{{ url('ajuancancel') }}">CANCEL</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" class="form-control" name="nama" maxlength="100" minlength="3" value="{{ $data->nama }}" ReadOnly required >
                                    <label class="form-label">Nama Lengkap Alumni</label>
                                </div>
                                <div class="help-info">Nama sesuai ijazah</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nim" maxlength="9" minlength="7" value="{{ $data->nim }}" ReadOnly required >
                                    <label class="form-label">Nomor Induk Mahasiswa</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="{{ $data->email }}" ReadOnly required >
                                    <label class="form-label">Alamat Email</label>
                                </div>
                                <div class="help-info">Alamat email yang aktif, notifikasi dikirim ke email</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="telepon" value="{{ $data->telepon }}" ReadOnly required >
                                    <label class="form-label">Nomor Telepon</label>
                                </div>
                                <div class="help-info">Nomor telepon yang dapat dihubungi</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="handphone" value="{{ $data->handphone }}" ReadOnly required >
                                    <label class="form-label">Nomor Handphone</label>
                                </div>
                                <div class="help-info">Nomor handphone yang dapat dihubungi</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jumlah" min="5" max="20" value="10" ReadOnly required >
                                    <label class="form-label">Jumlah Legalisir</label>
                                </div>
                                <div class="help-info">Jumlah lembar per dokumen, min: 5, max: 20</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bagian heading modal</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <p>bagian body modal.</p>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                </div>
            </div>
        </div>
    </div>

@endsection