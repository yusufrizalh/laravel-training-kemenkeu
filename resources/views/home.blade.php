@extends('layouts/master')
@section('title', 'Halaman Home')
@section('content')
    <div class="container">
        <?= 'Nama saya adalah ' . htmlspecialchars($instansi) ?>
        </div>
@endsection
