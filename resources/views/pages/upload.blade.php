@extends('layouts.app')

@section('content')

<section class="content">

<div class="container-fluid">
    <ol class="breadcrumb  align-right">
        <li>
            <a href="{{ route('beranda') }}">
                <i class="material-icons">home</i> Beranda
            </a>
        </li>
        <li class="active">
            <i class="material-icons">publish</i> Upload Dokumen
        </li>
    </ol>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="card">
        		<div class="header">
        			<h2>Form Upload Legalisir Ijazah/Transkrip</h2>
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
                    @if ($data == '0')
                    <form action="cekupload" id="form_advanced_validation" method="get">
                    <!-- <form class="form-inline"> -->
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nim_up" maxlength="9" minlength="7" required>
                                <label class="form-label">Nomor Induk Mahasiswa</label>
                            </div>
                        </div>
                        <button class="btn btn-info waves-effect" type="submit">Submit</button><br>
                    </form> 
                    @elseif ($data == '1')
                    <!-- </form> -->
                    <form action="upload">
                        <button class="btn btn-primary waves-effect" type="submit">Kembali</button>
                    </form>
                    <form action="otpupload" id="form_advanced_validation" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                        <br>
                        <div class="form-group">
                            <b>Nama</b>
                            <div class="form-line">
                                <input type="text" value={{ $user->nama }} class="form-control" name="nama" Readonly>
                                <!-- <label class="form-label">Upload Ijazah</label> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <b>NIM</b>
                            <div class="form-line">
                                <input type="text" value={{ $user->nim }} class="form-control" name="nim" Readonly>
                                <!-- <label class="form-label">Upload Ijazah</label> -->
                            </div>
                        </div>
                        <div class="form-group">
                                <b>Email</b>
                                <div class="form-line">
                                    <input type="text" value={{ $user->email }} class="form-control" name="email" Readonly>
                                    <!-- <label class="form-label">Upload Ijazah</label> -->
                                </div>
                            </div>
                        <div class="form-group">
                            <b>Upload Ijazah</b>
                            <div class="form-line">
                                <input type="file" class="form-control" name="ijazah" accept="application/pdf" required>
                                <!-- <label class="form-label">Upload Ijazah</label> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <b>Upload Transkrip</b>
                            <div class="form-line">
                                <input type="file" class="form-control" name="transkrip" accept="application/pdf" required>
                                <!-- <label class="form-label">Upload Transkrip</label> -->
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                    @elseif ($data == '2')
                    <!-- </form> -->
                    <form action="upload">
                        <button class="btn btn-primary waves-effect" type="submit">Kembali</button>
                    </form>
                    <form action="tranfupload" id="form_advanced_validation" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                        <br>
                        <div class="form-group">
                            <b>NIM</b>
                            <div class="form-line">
                                <input type="text" value={{ $user->nim }} class="form-control" name="nim1" Readonly>
                                <!-- <label class="form-label">Upload Ijazah</label> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <b>Upload Bukti Transfer</b>
                            <div class="form-line">
                                <input type="file" class="form-control" name="tranf" accept="application/pdf" required>
                                <!-- <label class="form-label">Upload Transkrip</label> -->
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                    @endif
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