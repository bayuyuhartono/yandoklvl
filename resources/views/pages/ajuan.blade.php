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
                    <div class="header">
                        <h2>Form Pengajuan Pemesanan Legalisir Ijazah/Transkrip</h2>
                    </div>
                    {{-- menampilkan error validasi --}}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="body"> 
                        <form action="otpcheck" id="form_advanced_validation" method="post">
                        {{ csrf_field() }}
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" class="form-control" name="nama" maxlength="100" minlength="3" value="{{ old('nama') }}" required >
                                    <label class="form-label">Nama Lengkap Alumni</label>
                                </div> 
                                <div class="help-info">Nama sesuai ijazah</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nim" maxlength="9" minlength="7" value="{{ old('nim') }}"  required >
                                    <label class="form-label">Nomor Induk Mahasiswa</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"  required >
                                    <label class="form-label">Alamat Email</label>
                                </div>
                                <div class="help-info">Alamat email yang aktif, notifikasi dikirim ke email</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="telepon" value="{{ old('telepon') }}"  required >
                                    <label class="form-label">Nomor Telepon</label>
                                </div>
                                <div class="help-info">Nomor telepon yang dapat dihubungi</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="handphone" value="{{ old('handphone') }}"  required >
                                    <label class="form-label">Nomor Handphone</label>
                                </div>
                                <div class="help-info">Nomor handphone yang dapat dihubungi</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jumlah" min="5" max="20" value="{{ old('jumlah') }}"  required >
                                    <label class="form-label">Jumlah Legalisir</label>
                                </div>
                                <div class="help-info">Jumlah lembar per dokumen, min: 5, max: 20</div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit" >SUBMIT</button>
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