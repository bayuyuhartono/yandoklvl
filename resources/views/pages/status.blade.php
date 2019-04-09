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
                <i class="material-icons">history</i> Cek Status Pemesanan
            </li>
        </ol>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Cek Status Pemesanan</h2>
                    </div>
                    <div class="body">
                        <form action="cek" id="form_advanced_validation" method="get">
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
                                    <button class="btn bg-teal waves-effect" type="submit" >SUBMIT</button>
                                </div>
                            </div>
                        </form>

                        @if (count($ajuan) > 0)
                        @foreach($ajuan as $a)
                            <div class="panel-group" id="accordion_11" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-col-teal">
                                    <div class="panel-heading" role="tab" id="headingOne_11">
                                        <h4 class="panel-title">
                                            <a role="button" data-parent="#accordion_11" href="#collapseOne_11" aria-expanded="false" aria-controls="collapseOne_11">
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
    </div>

@endsection