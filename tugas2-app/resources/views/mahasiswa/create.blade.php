@extends('layout.main')
@section('title','Prodi')

@section('content')
<div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Mahasiswa</h4>
                    <p class="card-description">
                        Daftar Mahasiswa di Universitas MDP
                    </p>

                     <form class="forms-sample" method="POST" action="{{route('mahasiswa.store')}}" enctype="multipart/form-data">
                    @csrf
                    {{-- mengisi NPM --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">NPM</label>
                      <input type="text" class="form-control" name="npm" placeholder="NPM">
                      @error('npm')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    {{-- Mengisi nama --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa">
                      @error('nama')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    {{-- Mengisi tempat lahir --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                      @error('tempat_Lahir')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>
                    {{-- Mengisi tanggal lahir --}}
                    <div class="form-group">
                      <label for="mahasiswa_id">Tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir">
                      @error('tanggal_lahir')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>

                    {{-- Mengisi Foto --}}
                     <div class="form-group">
                      <label for="mahasiswa_id">Foto</label>
                      <input type="file" class="form-control" name="foto" placeholder="Foto">
                      @error('foto')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>


                    {{-- Memilih Prodi --}}
                    <div class="form-group">
                      <label for="exampleInputUsername1">Prodi</label>
                      <select  class="form-control" name="prodi_id" >
                        <option value="">Pilih</option>
                        @foreach ($prodi as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                      </select>
                      @error('Prodi_id')
                        <label for="" class="text-danger">{{$message}}</label>
                       @enderror
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">simpan</button>
                    <a href="{{url('mahasiswa')}}" class="btn btn-light">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
