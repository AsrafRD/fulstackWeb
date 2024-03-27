@extends('admin/layout.master')

@section('title','Admin')
@section('title2','tambah')
@section('user','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah Admin</h4>
  </div>
  <div class="card-body">
    <form action="/prosescreateadmin" method="POST">
    @csrf
    <div class="row">

      <div class="col-md-6">
          <div class="form-group">
            <label @error('namauser') class="text-danger" @enderror>
              Nama Admin 
              @error('namauser')
                | {{ $message }}
              @enderror
            </label>
            <input type="text" name="namauser" value="{{old('namauser')}}" class="form-control" autocomplete="off">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label @error('username') class="text-danger" @enderror>
              Username
              @error('username')
                | {{ $message }}
              @enderror
            </label>
            <input type="text" name="username" value="{{old('username')}}" class="form-control" autocomplete="off">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label @error('password') class="text-danger" @enderror>
              Password
              @error('password')
               | {{$message}}
              @enderror
            </label>
            <input type="password" name="password" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="{{ route('admin') }}" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection

