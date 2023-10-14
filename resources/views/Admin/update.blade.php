@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
                    <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <form action="{{ route('speedtest.update', $speedtest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $speedtest->name) }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1" name="description">{{ old('description', $speedtest->description) }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
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



              </div>
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
@endsection
