@extends('layouts.app')

@section('content')

            <div class="toolbar mt-5">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('speedtest.create') }}">
                        <i class="fa fa-arrow-right"></i> Tambah Data
                    </a>
                </div>
            </div>

            <div class="card my-5">
              <div class="card-header">
                <h3 class="card-title">Daftar Speedtest</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Foto<i class="fas fa-images"></i></th>
                    <th>Deskripsi</th>
                    <th>Di Upload Oleh</th>
                    <th>Waktu Upload</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($speedtests as $speedtest)


                  <tr>
                    <td>{{ $speedtest->name }}</td>
                    <td>
                        <img src="{{ asset('/storage/speedtest/'.$speedtest->image) }}" class="rounded" style="width: 150px;">
                    </td>
                    <td>{{ $speedtest->description }}</td>
                    <td>{{ $speedtest->user_name }}</td>
                    <td>{{ $speedtest->created_at }}</td>
                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('speedtest.destroy', $speedtest->id) }}" method="POST">
                                            <a href="{{ route('speedtest.show', $speedtest->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('speedtest.edit', $speedtest->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
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

@endsection
