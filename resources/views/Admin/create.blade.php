@extends('layouts.app')

@section('content')

    <div class="row my-5">
        <div class="col-12 col-lg-5">
        <div class="card fixed">
            <div class="card-body">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('speedtest.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{ old('description') }}" placeholder="Masukkan Deskripsi" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                  <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-6">
                  <a href="{{ route('speedtest.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>

        </div>
        <div class="col-12 col-lg-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Speedtest</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Di Upload Oleh</th>
                    <th>Waktu Upload</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $speedtest)


                  <tr>
                    <td>{{ $speedtest->name }}</td>
                    <td>
                        <img src="{{asset('/storage/speedtest/'.$speedtest->image)}}" alt="Image" class="rounded" style="width: 150px;">
                    </td>
                    <td>{{ $speedtest->people }}</td>
                    <td>{{ $speedtest->created_at }}</td>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>



@endsection
