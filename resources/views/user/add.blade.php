
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
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data User</li> 
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    @if(isset($data))
        <form action="/user/{{ $data->id }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
    @else
        <form action="/user" method="POST" enctype="multipart/form-data">
    @endif

    @csrf
    <section class="content">
        <div class="container-fluid">
        <!-- general form elements -->
            <div class="row">
                <div class="col-4">
                    <div class="card card-primary"> 
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" id="file" name="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ isset($data->name) ? $data->name : ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ isset($data->email) ? $data->email : ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="{{ isset($data->password) ? $data->password : ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select name="level" class="custom-select rounded-0">
                                        <option value="2" {{ isset($data->level) && $data->level == 2 ? 'selected': ''}}>Admin</option>
                                        <option value="1" {{ isset($data->level) && $data->level == 1 ? 'selected': ''}}>Kasir</option>
                                        <option value="0" {{ isset($data->level) && $data->level == 0 ? 'selected': ''}}>Blokir</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </div>
                </div>
            <!-- /.card -->
            <div>
        </div>
        <!-- /.container-fluid -->
    </section>
    </form>
<!--/.content -->
</div>
@endsection