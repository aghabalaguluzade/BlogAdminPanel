@extends('layouts.master')
@section('title', 'Bloqlar')
@section('banner')
     <section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-3">
          <span>Bütün bloqlar</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="{{ route('home') }}"><i class="ti ti-home"></i>  <span>Ana Səhifə</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="{{ route('blogs') }}"><span>Bütün bloqlar</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
@section('content')
     <div class="container">
  <div class="row gy-5 gx-4 g-xl-5">

    @foreach ($blogs as $blog)
        
    <div class="col-lg-6">
      <article class="card post-card h-100 border-0 bg-transparent">
        <div class="card-body">
          <a class="d-block" href="blog-single.html" title="{{ $blog->title }}">
            <div class="post-image position-relative">
              <img class="w-100 h-auto rounded" src="{{ config('subdomain.path') . $blog->img }}" alt="I work 5 hours a day, and I’ve never been more productive" width="970" height="500">
            </div>
          </a>
          <ul class="card-meta list-inline mb-3">
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>12 Aug, 2020</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>03 min read</span>
            </li>
          </ul>
          <a class="d-block" href="blog-single.html" title="I work 5 hours a day, and I’ve never been more productive"><h3 class="mb-3 post-title">
            {{ $blog->title }}
          </h3></a>
          <p>{!! Str::limit($blog->content,160,'...') !!}</p>
        </div>
        <div class="card-footer border-top-0 bg-transparent p-0">
          <ul class="card-meta list-inline">
            <li class="list-inline-item mt-2">
              <a href="author-single.html" class="card-meta-author" title="Read all posts by - Chris Impey">
                <img class="w-auto" src="assets/images/author/chris-impey.jpg" alt="Chris Impey" width="26" height="26"> by <span>Chris</span>
              </a>
            </li>
            <li class="list-inline-item mt-2">•</li>
            <li class="list-inline-item mt-2">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item small"><a href="tag-single.html">Work</a></li>
                <li class="list-inline-item small"><a href="tag-single.html">Lifestyle</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </article>
    </div>

    {{ links() }}

    @endforeach

    
    <div class="col-12">
      <!-- pagination -->
      <nav class="text-center mt-5">
        <ul class="pagination justify-content-center border border-white rounded d-inline-flex">
          <li class="page-item"><a class="page-link rounded w-auto px-4" href="blog.html" aria-label="Pagination Arrow">Prev</a></li>
          <li class="page-item active ">
            <a href="blog.html" class="page-link rounded">1</a>
          </li>
          <li class="page-item">
            <a href="blog.html" class="page-link rounded">2</a>
          </li>
          <li class="page-item mt-2 mx-2">...</li>
          <li class="page-item"><a class="page-link rounded" href="blog.html" aria-label="Pagination Arrow">16</a></li>
          <li class="page-item"><a class="page-link rounded w-auto px-4" href="blog.html" aria-label="Pagination Arrow">Next</a></li>
        </ul>
      </nav>
      
    </div>
  </div>
</div>
@endsection