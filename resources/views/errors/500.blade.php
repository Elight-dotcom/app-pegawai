@extends('errors.master')

@section('icon')
<div class="mb-6 flex justify-center">
    <div class="w-24 h-24 bg-gradient-to-r from-red-500 to-red-300 rounded-full flex items-center justify-center shadow-lg">
        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>
</div>
@endsection
@section('code', '500')
@section('title', 'Server Error')
@section('message', 'Terjadi kesalahan pada server. Tim kami sedang menangani masalah ini.')