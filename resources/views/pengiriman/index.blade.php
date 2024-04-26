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
</div>
<!-- /.container-fluid -->
<!-- Main content -->
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="container">
            <h1>Data Pengiriman</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModal">
                Pengiriman
            </button>

            <!-- Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengiriman</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="{{ route('pengiriman.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="">Pegawai</label>
                                <select class="form-control" name="id_pegawai">
                                    <option value="">Pilih Pegawai</option>
                                    @foreach ($pegawai as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="">Pelanggan</label>
                                <select class="form-control" name="id_pelanggan">
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggan as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="">Tanggal Dikirim</label>
                                <input class="form-control" type="date" name="tanggal_dikirim">
                                <label for="">Photo Penyerahan</label>
                                <input class="form-control" type="file" name="photo_penyerahan">
                                <label for="">Harga</label>
                                <input class="form-control" type="text" name="harga">
                                <label for="">Status</label>
                                <select class="form-control" name="status">
                                    <option value="proses">Proses</option>
                                    <option value="dikirim">Dikirim</option>
                                    <option value="terkirim">Terkirim</option>
                                </select>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <ul>
                @php
                    $no = 1;
                @endphp
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <th>ID PENGIRIMAN</th>
                <th>NAMA PEGAWAI</th>
                <th>NAMA PELANGGAN</th>
                <th>TANGGAL DIKIRIM</th>
                <th>PHOTO PENYERAHAN</th>
                <th>HARGA</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td> {{ $no++ }} </td>
                        <td> {{ $item->pegawai->nama }} </td>
                        <td> {{ $item->pelanggan->nama }} </td>                        
                        <td> {{ $item->tanggal_dikirim }} </td>
                        <td>
                            <img src="{{ asset('storage/' . $item->photo_penyerahan) }}"
                                alt="" height="60">
                        </td>
                        <td> {{ $item->harga }} </td>
                        <td> {{ $item->status }} </td>
                        <td>
                            <form action="{{ route('pengiriman.destroy', $item->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <!-- Edit Button -->
                                <a href="#" data-toggle="modal"
                                    data-target="#editModal{{ $item->id }}"
                                    class="btn btn-warning">Edit</a>
                                <!-- Delete Button -->
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('pengiriman.nota', $item->id) }}" type="button" class="btn brn-info">Cetak Nota</a>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $item->id }}Label">Edit Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('pengiriman.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="">Pegawai</label>
                    <select class="form-control" name="id_pegawai">
                        <option value="">Pilih Pegawai</option>
                        @foreach ($pegawai as $i)
                            <option value="{{ $i->id }}" {{ $item->id_pegawai == $i->id ? 'selected' : '' }}>
                                {{ $i->nama }}</option>
                        @endforeach
                    </select>
                    
                    <label for="">Pelanggan</label>
                    <select class="form-control" name="id_pelanggan">
                        <option value="">Pilih Pelanggan</option>
                        @foreach ($pelanggan as $i)
                            <option value="{{ $i->id }}" {{ $item->id_pelanggan == $i->id ? 'selected' : '' }}>
                                {{ $i->nama }}</option>
                        @endforeach
                    </select>
                    <label for="">Tanggal Dikirim</label>
                    <input class="form-control" type="date" name="tanggal_dikirim" value="{{ $item->tanggal_dikirim }}">
                    <label for="">Photo Penyerahan</label>
                    <input class="form-control" type="file" name="photo_penyerahan">
                    <!-- Display current image -->
                    <br>
                    <img src="{{ asset('storage/' . $item->photo_penyerahan) }}" alt="Current Image" height="70">
                    <br>
                    <label for="">Harga</label>
                    <input class="form-control" type="text" name="harga" value="{{ $item->harga }}">
                    <label for="">Status</label>
                    <select class="form-control" name="status">
                        <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="dikirim" {{ $item->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                        <option value="terkirim" {{ $item->status == 'terkirim' ? 'selected' : '' }}>Terkirim</option>
                    </select>
                    <!-- Add other fields for editing -->
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </div>
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
