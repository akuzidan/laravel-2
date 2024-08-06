
@extends ('template.index')

@section('title', 'Home')

@section('content')
<!-- Content Wrapper. Contains page content --> <div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            @if (session('mess'))
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{ session('mess') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"> 
                                    <i class="fafa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"> 
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 150px;">Foto</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td >{{ $item->id }}</td>
                                    <td style="width: 150px;">
                                        <img style="width: 150px; height: auto;" src="{{ $item->image}}">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->status == 1 ? 'Aktif' : 'Tidak' }}</td>
                                    <td>
                                        <a href="/stuff/{{ $item->id }}">
                                            <button type="button" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button>
                                        </a>
                                        <form action="/stuff/{{ $item->id }}" method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
<!-- /.content-wrapper -->
@endsection