@extends('layouts.master')
@section('title', 'Əlaqə')
@section('banner')
     <section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-3">
          <span>Əlaqə</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="{{ route('home') }}"><i class="ti ti-home"></i>  <span>Ana Səhifə</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="{{ route('contact.index') }}"><span>Əlaqə</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
     <section>
  <div class="container">
    <div class="row gy-5 justify-content-center">
      
      <div class="col-lg-5 col-md-10 ms-lg-auto me-lg-0 me-auto">
        <div class="mb-5">
          <h2 class="h3 mb-3">Əlaqə</h2>
          <p class="mb-0">Mən sizə kömək etmək və hər hansı sualınıza cavab vermək üçün buradayam. Cavabınızı səbirsizliklə gözləyirəm</p>
        </div>
        <div>
          <h2 class="h4 mb-3">E-poçta yazın və ya zəng edin</h2>
          <p class="mb-2 content">
            <i class="ti ti-mail-forward me-2 d-inline-block mb-0" style="transform:translateY(2px)"></i> <a href="mailto:{{ $settings?->contact_email }}">{{ $settings?->contact_email }}</a></p>
          <p class="mb-0 content"><i class="ti ti-phone me-2"></i>{{ $settings?->contact_phone }}</p>
        </div>
      </div>
      
      <div class="col-lg-5 me-lg-auto ms-lg-0 ms-auto">
        <h2 class="h3 mb-4">Əlaqə formu</h2>
        @include('layouts.errors')
        <form class="row g-4" action="{{ route('contact.store') }}" method="POST">
          @csrf
          <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Adınızı daxil edin..." name="name" required>
          </div>
          <div class="col-md-12">
            <input type="email" class="form-control" placeholder="E-poçt ünvanı daxil edin..." name="email" required>
          </div>
          <div class="col-md-12">
            <textarea class="form-control" placeholder="Mesajınızı yazın..." rows="4" name="message" required></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary" aria-label="Send Message">Göndər <i class="ti ti-brand-telegram ms-1"></i></button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</section>
@endsection