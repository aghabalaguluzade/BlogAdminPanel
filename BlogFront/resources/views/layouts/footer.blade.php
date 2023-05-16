<!-- start of footer -->
<footer>
  <div class="container">
    <div class="pb-4 mt-3">
      <div class="row g-2 g-lg-4 align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
          <p class="mb-0 copyright-text content">&copy; 2023{{ (date('Y') !== "2023") ? '-' . date('Y') : '' }}</p>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <ul class="list-inline footer-menu">
            <li class="list-inline-item m-0"><a href="{{ route('404') }}">404 Səhifəsi</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- end of footer -->