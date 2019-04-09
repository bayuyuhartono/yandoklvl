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
                <i class="material-icons">contacts</i> Kontak Kami
            </li>
        </ol>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Kontak Kami</h2>
                    </div>
                    <div class="body">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection