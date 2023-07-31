@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center">
    <div class="alert alert-light  text-dark" role="alert">
    <h4 class="alert-heading">Well done! <br>Selamat {{ $user }} Pengisian Anda Tersimpan</h4>
    <p>Jangan Lupakan Dari Mana kamu berasal, jadilah kebanggan kami, semangat menjalani hidup</p>
    <hr>
    <form action="{{ route('prosesSelesai') }}" method="post">
        @csrf
        <input type="hidden" name="pengerjaan" value="finish">
        <p class="mb-0">Silahkan Kembali ke <button type="submit" class="btn btn-sm btn-warning">Home</button></p>
    </form>
  </div> 
</div>