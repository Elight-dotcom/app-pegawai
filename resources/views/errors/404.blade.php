@extends('errors.master')

@section('icon')
<div class="mb-6 flex justify-center">
    <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-blue-300 rounded-full flex items-center justify-center shadow-lg">
        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>
</div>
@endsection
@section('code', '404')
@section('title', 'Halaman Tidak Ditemukan')
@section('message', 'Maaf, halaman yang Anda cari tidak dapat ditemukan. Silakan periksa URL atau kembali ke halaman utama.')