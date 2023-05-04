@extends('layouts.master')
@section('title', 'Haqqında')
@section('banner')
     <section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-3">
          <span>Haqqında</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="{{ route('home') }}"><i class="ti ti-home"></i>  <span>Ana Səhifə</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="about.html"><span>Haqqında</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
     <section>
  <div class="container">
    
    <div class="py-5 my-3">
      <div class="row g-4 justify-content-center text-center">
        <div class="col-lg-6 image-grid-1">
          <img class="w-100 h-auto rounded" src="{{ config('subdomain.path') . $about?->img }}" width="620" height="346">
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10 text-center">
        <div class="content">
          <p>{!! $about?->description !!}</p>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection