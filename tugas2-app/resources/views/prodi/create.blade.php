@extends('layout.main')
@section('title','Prodi')

@section('content')
<div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Program Studi</h4>
                    <p class="card-description">
                        Daftar Program Studi di Universitas MDP
                    </p>
                     <form class="forms-sample" method="POST" action="{{route('prodi.store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="prodi_id">Program Studi</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Prodi">
                      @error('nama')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fakultas</label>
                      <select  class="form-control" name="fakultas_id" >
                        <option value="">Pilih</option>
                        @foreach ($fakultas as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach


                      </select>
                      @error('fakultas_id')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">simpan</button>
                    <a href="{{url('prodi')}}" class="btn btn-light">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
