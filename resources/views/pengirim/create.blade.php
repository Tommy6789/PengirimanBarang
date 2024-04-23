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
                                <form action=" {{ route('pengirim.store')}}" method="post">
                                    @csrf
                                    <h1>Data Pengirim</h1>
                                    <a type="button" href=" {{ route('pengirim.index') }} " class="btn btn-info">KEMBALI</a>
                                        <br>
                                        <label for="">ID PETUGAS</label>
                                        <input type="text" name="id_pengirim" class="form-control" >
                                        <label for="">NAMA</label>
                                        <input type="text" name="nama" class="form-control">
                                        <label for="">ALAMAT</label>
                                        <input type="text" name="alamat" class="form-control">
                                        <label for="">NO HP</label>
                                        <input type="number" name="no_hp" class="form-control">
                                        <br>
                                        <button type="submit" class="btn btn-warning" >SIMPAN </button>
                                </form>
                            </div>
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