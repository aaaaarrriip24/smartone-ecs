@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Add Peserta Business Matching</div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                @foreach($pt as $d)
                <p>{{ $d->nama_perusahaan }}</p>
                @endforeach

                <!-- Note: Blm Muncul Semua -->
            </div>
        </div>
    </div>
    <div class="card-footer gap-2">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>
@endsection
