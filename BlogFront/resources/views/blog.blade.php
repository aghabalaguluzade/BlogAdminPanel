@extends('layouts.master')
@section('title', $blog->title)
@section('content')
     <section class="section-sm pb-0">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="mb-5">
          <h3 class="h1 mb-4 post-title">{{ $blog?->title }}</h3>

          <ul class="card-meta list-inline mb-2">
            <li class="list-inline-item mt-2">
                <img class="w-auto" src="{{ config('apidomain.path') .'settings/'. $user?->img }}" alt="{{ $user?->name }}" width="26" height="26"><span>{{ $user?->name }}</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>{{ $reading_time }}</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>{{ $blog?->created_at }}</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-eye"></i>
              <span>{{ $blog?->view_count }}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="mb-5 text-center">
          <img class="w-100 h-auto rounded" src="{{ config('domain.path') .'blogs/'. $blog?->img }}" alt="{{ $blog?->title }}" width="970" height="500">
        </div>
      </div>
      <div class="col-lg-2 post-share-block order-1 order-lg-0 mt-5 mt-lg-0">
        <div class="position-sticky" style="top:150px">
          <span class="d-inline-block mb-3 small">SHARE</span>
          <ul class="social-share icon-box">
            <li class="d-inline-block d-lg-block me-2 mb-2" onclick="return tbs_click()"><i class="ti ti-brand-twitter"></i></li>
            <li class="d-inline-block d-lg-block me-2 mb-2" onclick="return fbs_click()"><i class="ti ti-brand-facebook"></i></li>
            <li class="d-inline-block d-lg-block me-2 mb-2" onclick="return ins_click()"><i class="ti ti-brand-linkedin"></i></li>
            <li class="d-inline-block d-lg-block me-2 mb-2" onclick="return red_click()"><i class="ti ti-brand-reddit"></i></li>
            <li class="d-inline-block d-lg-block me-2 mb-2" onclick="return pin_click()"><i class="ti ti-brand-pinterest"></i></li>
          </ul>
        </div>
        <script type="text/javascript">
          var pageLink = window.location.href;
          var pageTitle = String(document.title).replace(/\&/g, '%26');
          function tbs_click(){pageLink = 'https://twitter.com/intent/tweet?text={{ $blog->title }}&amp;url={{ route('blog', $blog->slug) }}';socialWindow(pageLink, 570, 570);}
          function fbs_click(){pageLink = 'https://www.facebook.com/sharer.php?u={{ route('blog', $blog->slug) }}&amp;quote={{ $blog->title }}';socialWindow(pageLink, 570, 570);}
          function ins_click(){pageLink = 'https://www.linkedin.com/sharing/share-offsite/?url={{ route('blog', $blog->slug) }}';socialWindow(pageLink, 570, 570);}
          function red_click(){pageLink = 'https://www.reddit.com/submit?url={{ route('blog', $blog->slug) }}';socialWindow(pageLink, 570, 570);}
          function pin_click(){pageLink = 'https://www.pinterest.com/pin/create/button/?&amp;text={{ $blog->title }}&amp;url={{ route('blog', $blog->slug) }}&amp;description=${pageTitle}';socialWindow(pageLink, 570, 570);}
          function socialWindow(pageLink, width, height){var left = (screen.width - width) / 2;var top = (screen.height - height) / 2;var params = "menubar=no,toolbar=no,status=no,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;window.open(pageLink,"",params);}
        </script>
      </div>
      <div class="col-lg-8 post-content-block order-0 order-lg-2">
        <div class="content">
          {!! $blog?->content !!}
        </div>
      </div>
    </div>

    <div class="single-post-similer">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="text-center">
            <h2 class="section-title">
              <span>Ən son bloqlar</span>
            </h2>
          </div>
          <div class="row gy-5 gx-4 g-xl-5">
            

            @foreach ($recent_blog as $key => $blog)
            <div class="col-lg-6">
              <article class="card post-card h-100 border-0 bg-transparent">
                <div class="card-body">
                  <a class="d-block" href="{{ route('blog', $blog?->slug) }}" title="{{ $blog?->title }}">
                    <div class="post-image position-relative">
                      <img class="w-100 h-auto rounded" src="{{ config('apidomain.path') .'blogs/'. $blog?->img }}" alt="{{ $blog?->title }}" width="970" height="500">
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
                      <span>{{ $reading_time_recent_blog[$key] }}</span>
                    </li>
                    <li class="list-inline-item mt-2">—</li>
                    <li class="list-inline-item mt-2">
                      <i class="ti ti-eye"></i>
                      <span>{{ $blog?->view_count }}</span>
                    </li>
                  </ul>
                  <a class="d-block" href="{{ route('blog', $blog->slug) }}"
                    title="{{ $blog?->title }}">
                    <h3 class="mb-3 post-title">{{ $blog?->title }}</h3>
                  </a>
                  <p>{!! Str::limit($blog?->content, 260, '...') !!}</p>
                </div>
                <div class="card-footer border-top-0 bg-transparent p-0">
                  <ul class="card-meta list-inline">
                    <li class="list-inline-item mt-2">
                        <img class="w-auto" src="{{ config('apidomain.path') .'settings/'. $user?->img }}" alt="{{ $user?->name }}" width="26" height="26"><span>{{ $user?->name }}</span>
                    </li>
                  </ul>
                </div>
              </article>
            </div>


            @endforeach
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection