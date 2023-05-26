@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        </ol>
    </section>
    <!-- Content Body -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12" style="text-align: center">
                <img src="{{ URL::asset('dist/img/Logo.png') }}" alt="Logo" height="150px">
                <h1><b>SELAMAT DATANG</b></h1>
                <h2>SISTEM PENDUKUNG KEPUTUSAN <br> PENERIMA BANTUAN SOSIAL BEDA RUMAH <br> LEMBANG TONDON INDUK</h2>
                <br>
                <div class="btn-group">
                    <a href="/alternatif" type="button" class="btn btn-block btn-primary btn-lg">MULAI KEPUTUSAN</a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection