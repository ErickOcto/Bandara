@extends('layouts.app')

@section('content')

              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Waktu Bergabung</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img src="{{ asset('/storage/user/'.$user->image) }}" class="rounded" style="width: 150px;">
                    </td>
                    <td>{{ $user->created_at }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
@endsection
