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
                    <form action="send" id="form_advanced_validation" method="POST">
                        <!-- <form class="form-inline"> -->
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
                                            <input type="text" name="otptextupl" class="form-control credit-card" placeholder="_ _ _ _">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary waves-effect" type="submit" >SUBMIT</button>
                                    <a class="btn btn-primary waves-effect" href="{{ url('uploadcancel') }}">CANCEL</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <b>Nama</b>
                            <div class="form-line">
                                <input type="text" value={{ $data->nama }} class="form-control" name="nama" Readonly>
                                <!-- <label class="form-label">Upload Ijazah</label> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <b>NIM</b>
                            <div class="form-line">
                                <input type="text" value={{ $data->nim }} class="form-control" name="nim" Readonly>
                                <!-- <label class="form-label">Upload Ijazah</label> -->
                            </div>
                        </div>
                        <div class="form-group">
                                <b>Email</b>
                                <div class="form-line">
                                    <input type="text" value={{ $data->email }} class="form-control" name="email" Readonly>
                                    <!-- <label class="form-label">Upload Ijazah</label> -->
                                </div>
                            </div>
                        <div class="form-group">
                            <b>Upload Ijazah</b>
                            <div class="form-line">
                                <embed width="600" height="450" src="{{ url('storage/file_upload/'.$data->doc_ijazah)  }}" type="application/pdf"></embed>
                            </div>
                        </div>
                        <div class="form-group">
                            <b>Upload Transkrip</b>
                            <div class="form-line">
                                <embed width="600" height="450" src="{{ url('storage/file_upload/'.$data->doc_transkrip)  }}" type="application/pdf"></embed>                                
                            </div>
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