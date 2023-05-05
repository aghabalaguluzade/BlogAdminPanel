@extends('layouts.master')
@section('content')
  <!-- blog warpper start -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">
          <span>Son əlavə olunan bloqlar</span>
        </h2>
      </div>
    </div>
    <div class="row gy-5 gx-4 g-xl-5">

    @foreach ($blogs as $key => $blog)
    
      <div class="col-lg-6">
        <article class="card post-card h-100 border-0 bg-transparent">
          <div class="card-body">
            <a class="d-block" href="{{ route('blog', $blog?->slug) }}" title="{{ $blog?->title }}">
              <div class="post-image position-relative"> 
                <img class="w-100 h-auto rounded" src="{{ config('domain.path') .'blogs/'. $blog?->img }}" alt="{{ $blog?->title }}" style="width:396px !important; height:204px !important" />
              </div>
            </a>
            <ul class="card-meta list-inline mb-3">
              <li class="list-inline-item mt-2">
                <i class="ti ti-calendar-event"></i>
                <span>{{ $blog?->created_at }}</span>
              </li>
              <li class="list-inline-item mt-2">—</li>
              <li class="list-inline-item mt-2">
                <i class="ti ti-clock"></i>
                <span>{{ $reading_time[$key] }}</span>
              </li>
              <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-eye"></i>
              <span>{{ $blog?->view_count }}</span>
            </li>
            </ul>
            <a class="d-block" href="{{ route('blog', $blog?->slug) }}"
              title="{{ $blog?->title }}">
              <h3 class="mb-3 post-title">{{ $blog?->title }}</h3>
            </a>
            <p>{!! Str::limit($blog?->content, 160, '...') !!}</p>
          </div>
          <div class="card-footer border-top-0 bg-transparent p-0">
            <ul class="card-meta list-inline">
              <li class="list-inline-item mt-2">
                  <img class="w-auto" src="{{ config('domain.path') .'settings/'. $user?->img }}" alt="Thomas Macaulay" width="26" height="26"><span>{{ $user?->name }}</span>
              </li>
              <li class="list-inline-item mt-2">•</li>
            </ul>
          </div>
        </article>
      </div>


    @endforeach


      <div class="col-12 text-center">
        <a class="btn btn-primary mt-5" href="{{ route('blogs') }}" aria-label="View all posts"><i class="ti ti-new-section me-2"></i>Bütün bloqlara bax</a>
      </div>
    </div>
  </div>
</section>
<!-- blog warpper end -->
@endsection