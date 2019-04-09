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
    <div class="row clearfix">
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
    </div>
</div>

@endsection