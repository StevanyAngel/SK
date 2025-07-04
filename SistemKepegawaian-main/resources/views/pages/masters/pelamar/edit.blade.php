@extends('layouts.app')

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="breadcrumb">
        <a class="breadcrumb-item" href="#">
            <span class="breadcrumb-icon">
                <i data-feather="home"></i>
            </span>
            <span class="breadcrumb-text">Home</span>
        </a>
        <a class="breadcrumb-item" href="#">
            <span class="breadcrumb-icon">
                <i data-feather="database"></i>
            </span>
            <span class="breadcrumb-text">{{ $information['title'] }}</span>
        </a>
        <a class="breadcrumb-item" href="#">
            <span class="breadcrumb-icon">
                <i data-feather="database"></i>
            </span>
            <span class="breadcrumb-text">Edit {{ $information['title'] }}</span>
        </a>
    </div>
    <div class="row starter-main">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <h3>Edit {{ $information['title'] }}</h3>
                </div>

                <form class="form theme-form" id="edit-form" action="{{ url($information['route']) }}/update/{{ Crypt::encrypt($pelamar->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="txt-input-nama">Nama<span class="text-danger">*</span></label>
                                    <input class="form-control input-air-primary" id="txt-input-nama" name="nama" type="text" placeholder="Nama Pelamar" value="{{ $pelamar->nama }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                   
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="select-input-divisi">Divisi</label>
                                    <select name="divisi" id="select-input-divisi" class="form-control input-air-primary" required>
                                        <option value="{{ $pelamar->divisi }}" selected hidden>Pilih Divisi</option>
                                        <option value="HRD" {{ $pelamar->divisi === 'HRD' ? 'selected' : '' }}>HRD</option>
                                        <option value="Information And Technology" {{ $pelamar->divisi === 'Information And Technology' ? 'selected' : '' }}>Information And Technology</option>
                                        <option value="Penjualan" {{ $pelamar->divisi === 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
                                        <option value="Finance" {{ $pelamar->divisi === 'Finance' ? 'selected' : '' }}>Finance</option>
                                        <option value="Pembelian" {{ $pelamar->divisi === 'Pembelian' ? 'selected' : '' }}>Pembelian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">                   
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="select-input-jeniskelamin">Jenis Kelamin</label>
                                    <select name="jeniskelamin" id="select-input-jeniskelamin" class="form-control input-air-primary" required>
                                        <option value="{{ $pelamar->jeniskelamin }}" selected hidden>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki" {{ $pelamar->jeniskelamin === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $pelamar->jeniskelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="txt-input-alamat">Alamat</label>
                                    <input class="form-control input-air-primary" id="txt-input-alamat" name="alamat" type="text" placeholder="Masukkan Alamat Pelamar" value="{{ $pelamar->alamat }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="txt-input-tanggallahir">Tanggal Lahir</label>
                                    <input class="form-control input-air-primary" id="txt-input-tanggallahir" name="tanggallahir" type="date" placeholder="" value="{{ $pelamar->tanggallahir }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="txt-input-notelepon">No Telepon</label>
                                    <input class="form-control input-air-primary" id="txt-input-notelepon" name="notelepon" type="text" placeholder="+628" value="{{ $pelamar->notelepon }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="txt-input-email">Email</label>
                                    <input class="form-control input-air-primary" id="txt-input-email" name="email" type="text" placeholder="Masukkan Email Pelamar" value="{{ $pelamar->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label class="form-label" for="txt-input-nik">No NIK</label>
                                    <input class="form-control input-air-primary" id="txt-input-nik" name="nik" type="text" placeholder="Masukkan Nomor NIK Pelamar" value="{{ $pelamar->nik }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-secondary" onclick="history.back()" type="button">Tutup</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('js_after')
<script>
    $(document).ready(function() {
        $("#edit-form").submit(function(e) {
            e.preventDefault();

            let form_data = new FormData($(this)[0]);

            $.ajax({
                type: "post",
                url: "{{ url($information['route']) }}/update/{{ Crypt::encrypt($pelamar->id) }}",
                data: form_data,
                processData: false,
                contentType: false,

                success: function(data) {
                    var response = data;

                    swal({
                        title: response.title,
                        icon: response.type,
                        buttons: {
                            close: {
                                text: "Tutup",
                                className: "bg-secondary .d-flex"
                            },
                        },
                    }).then((value) => {
                        if (value == 'reload') {
                            location.reload();
                        } else {
                            location.href = "{{ url($information['route']) }}";
                        }
                    });
                },

                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (xhr.status == 406) {
                        swal(response.title, response.message, response.type);
                    }
                    if (xhr.status == 404) {
                        swal("Proses Gagal!", "Halaman tidak ditemukan", "error");
                    }
                    if (xhr.status == 422) {
                        swal("Proses gagal!", response.message, "error");
                    }
                    if (xhr.status == 500) {
                        swal("Internal Servel Error 500", "Hubungi admin untuk mendapatkan bantuan terkait masalah", "error");
                    }
                },
            });
        });
    });
</script>
@endsection