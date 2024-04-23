@extends('pengiriman.partials.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
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
                        <div class="card">
                            <div class="card-body">
                                
                            <form action=" {{ route('penerima.update', $data->id) }}" method="post">
                                @csrf
                                {{-- PUT digunakan untuk mengupdate data --}}
                                @method('PUT')
                                <h1>Data Penerima</h1>
                                <a type="button" href=" {{ route('penerima.index') }} " class="btn btn-info">KEMBALI</a>
                                <br>
                                <label for="">NAMA</label>
                                <input type="text" name="nama" value="{{ $data->nama }}" class="form-control">
                                <label for="">ALAMAT</label>
                                <input type="text" name="alamat" value="{{ $data->alamat }}" class="form-control">
                                <label for="">TANGGAL LAHIR</label>
                                <input type="number" name="no_hp" value="{{ $data->no_hp }}" class="form-control">
                                <br>
                                <button type="submit" class="btn btn-warning">EDIT</button>
                            </div>
                            </form>
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
@endsection