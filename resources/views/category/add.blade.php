
@extends('template.index')

@section('title', 'Home')

@section('content')

<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li> 
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(isset($data))
                    <form action="/category/{{ $data->id }}" method="POST">
                    @method('PUT')
                @else
                    <form action="/category" method="POST">
                @endif

                @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">Kode</label>
                            <input type="text" class="form-control" name="id" placeholder="Kode" value="{{ isset($data->id) ? $data->id : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ isset($data->name) ? $data->name : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Status</label>
                            <select name="status" class="custom-select rounded-0">
                                <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected': ''}}>Aktif</option>
                                <option value="0" {{ isset($data->status) && $data->status == 0 ? 'selected': ''}}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
<!--/.content -->
</div>
@endsection