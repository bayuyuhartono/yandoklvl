@extends('layouts.app')

@section('content')

<section class="content">
    
<div class="container-fluid">
    <ol class="breadcrumb  align-right">
        <li class="active">
            <a href="{{ route('beranda') }}">
                <i class="material-icons">home</i> Beranda
            </a>
        </li>
    </ol>
    {{-- <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('pengumuman') }}">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">notifications</i>
                    </div>
                    <div class="content">
                        <div class="text">Pengumuman</div>
                        <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('ajuan') }}">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">add</i>
                    </div>
                    <div class="content">
                        <div class="text">Ajukan Pemesanan</div>
                        <!-- <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div> -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('alur') }}">   
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">swap_calls</i>
                    </div>
                    <div class="content">
                        <div class="text">Alur Pemesanan</div>
                        <!-- <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div> -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('carabayar') }}">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">payment</i>
                    </div>
                    <div class="content">
                        <div class="text">Cara Pembayaran</div>
                        <!-- <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div> -->
                    </div>
                </div>
            </a>
        </div>
    </div> --}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Cek Status Ajuan</h2>
                </div>
                <div class="body">
                    <form action="ceknim" id="form_advanced_validation" method="get">
                        <div class="input-group">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">autorenew</i>
                                    </span>
                                    <div class="form-line">
                                            <input type="text" class="form-control" name="nimcari" maxlength="9" minlength="7" value="" placeholder="Masukan NIM Anda.." required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn bg-teal waves-effect" type="submit" >Cek Ajuan</button>
                            </div>
                        </div>
                    </form>

                    @if (count($ajuan) > 0)
                    @foreach($ajuan as $a)
                        <div class="panel-group" id="accordion_11" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-col-teal">
                                <div class="panel-heading" role="tab" id="headingOne_11">
                                    <h4 class="panel-title">
                                        <a role="button" data-parent="#accordion_11" aria-expanded="false" aria-controls="collapseOne_11">
                                           Pengajuan Pada Tanggal : {{ $a->tgl_ajuan }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne_11" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_11">
                                    <div class="panel-body">
                                        @foreach ($detail_ajuan as $det)
                                            @if ($det->uuid === $a->uuid)
                                                <ol class="breadcrumb">
                                                    <li>
                                                        <i class="material-icons">done</i> 
                                                        {{ $det->nama_status }}
                                                        ({{ $det->tanggal }})
                                                    </li>
                                                </ol>
                                            @endif                    
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif 
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Daftar Pengajuan Legalisir Online
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Tanggal</th>
                                    <th>Status Terakhir</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Tanggal</th>
                                    <th>Status Terakhir</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($ajuan_timeline as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->tgl_ajuan }}</td>
                                    <td>{{ $item->kode_status }}</td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection