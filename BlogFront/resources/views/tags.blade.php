@extends('layouts.master')
@section('title', 'Bloqlar')
@section('banner')
    <section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <p class="mb-2">Showing posts from</p>
        <h1 class="section-title h2 mb-3">
          <span>Taqlar</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="{{ route('home') }}"><i class="ti ti-home"></i>  <span>Ana Səhifə</span></a></li>
          <li class="list-inline-item">• &nbsp; <span>Taqlar</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
     <div class="container">
  <div class="row g-4 justify-content-center text-center">

     @foreach ($tags as $tag)
           
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="{{ route('blogsByTag', ['tag_id' => $tag->id]) }}">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> {{ $tag->name }}</span>
        Toplam {{ $tag->blogs->count() }} bloq var.
      </a>
    </div>

     @endforeach
    
  </div>
</div>
@endsection