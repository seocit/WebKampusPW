@extends('layout.main')
@section('title','Fakultas')

@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fakultas</h4>
                    <p class="card-description">
                        Daftar Fakultas di Universitas MDP
                    </p>
                    @if (Auth::user()->role =='A')
                    <a href="{{route('fakultas.create')}}" class="btn btn-info btn-rounded btn-fw">Tambah</a>

                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Fakultas</th>
                                @if (Auth::user()->role =='A')
                                <th>Aksi</th>

                                @endif
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($fakultas as $item)
                                <tr>
                                    <td>{{$item['nama']}}</td>
                                    <td>
                                        {{-- Kondisi Untuk User/Admin --}}
                                        @if (Auth::user()->role == 'A')
                                        <div class="d-flex  ">
                                            <a href="{{route('fakultas.edit', $item->id)}}">
                                            <button class="btn btn-success btn-sm mx-3 ">edit</button>
                                            </a>
                                            <form method="POST" action="{{route('fakultas.destroy', $item->id)}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                        data-toggle="tooltip" title='Delete'
                                                        data-nama='{{ $item->nama }}'>Delete</button>
                                            </form>
                                        </div>

                                        @endif

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
