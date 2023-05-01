@extends('layouts.master')
@section('title', 'Səhifə Tapılmadı')
@section('content')
     <section class="section-sm pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="page-not-found-title">404</h1>
          <p class="mb-4">Axtardığınız səhifə mövcud deyil.</p>
          <a href="{{ route('home') }}" class="btn btn-primary">Ana Səhifə qayıt</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection