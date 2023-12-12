@extends('layout.main')
@section('title','Prodi')

@section('content')
<div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Program Studi</h4>
                    <p class="card-description">
                        Daftar Program Studi di Universitas MDP
                    </p>

                    @can('create', App\Prodi::class)
                    <a href="{{route('prodi.create')}}" class="btn btn-info btn-rounded btn-fw">Tambah</a>

                    @endcan
                    <div class="table-responsive ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Program Studi</th>
                                    <th>Nama Fakultas </th>
                                    @can('destroy', App\Prodi::class)
                                    <th>Aksi</th>
                                    @endcan
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($prodi as $item)
                                <tr>
                                    <td>{{$item['nama']}}</td>
                                    <td>{{$item['fakultas']['nama']}}</td>
                                    <td>
                                        {{-- Kondisi untuk Admin/User --}}
                                        @can('destroy', App\Prodi::class)
                                        <div class="d-flex  ">
                                            <a href="{{route('prodi.edit', $item->id)}}">
                                            <button class="btn btn-success btn-sm mx-3">edit</button>
                                            </a>
                                            <form method="POST" action="{{route('prodi.destroy', $item->id)}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
