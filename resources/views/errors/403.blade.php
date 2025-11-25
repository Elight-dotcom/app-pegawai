@extends('errors.master')

@section('icon')
<div class="mb-6 flex justify-center">
    <div class="w-24 h-24 bg-gradient-to-r from-orange-500 to-orange-300 rounded-full flex items-center justify-center shadow-lg">
        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
        </svg>
    </div>
</div>
@endsection
@section('code', '403')
@section('title', 'Akses Ditolak')
@section('message', 'Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.')