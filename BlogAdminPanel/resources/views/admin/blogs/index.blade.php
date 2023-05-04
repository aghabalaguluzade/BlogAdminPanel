@extends('admin.layouts.master')
@section('title', 'Bloq Siyahısı')
@section('links')
     <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
     <script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection
@section('header')
     Bloq - <span class="fw-normal">Siyahısı</span>
@endsection
@section('content')
	<div class="content">
		<!-- Pagination types -->
     <div class="card">

       <div class="card-header d-flex justify-content-between">
               <h5 class="mb-0">Bloq Siyahısı</h5>
               <a href="{{ route('blogs.create') }}">
                    <button type="button" class="btn btn-info my-1 me-2">
                         Əlavə et
                    </button>
               </a>
          </div>

          <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
               
               <div class="datatable-scroll">
                    <table class="table datatable-pagination dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                         <thead>
                              <tr>
                                   <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">#</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Başlıq</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Status</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Əməliyyatlar</th>
                              </tr>
                         </thead>
                         <tbody>

                         @foreach ($blogs as $blog)

                              <tr class="odd" id="all">
                                   <td class="sorting_1" id="loop">{{ $loop->iteration }}</td>
                                   <td id="title">{{ Str::limit($blog->title, 60, '...') }}</td>
                                   <td id="status_td">
                                   @if($blog->status == 0)
                                        <span class="badge bg-danger bg-opacity-10 text-primary" id="status-{{ $blog->id }}">Deaktiv</span>
                                   @else
                                   <span class="badge bg-danger bg-opacity-10 text-primary" id="status-{{ $blog->id }}">Aktiv</span>
                                   @endif
                                   </td>
                                   <td id="operation">
                                        <button type="button" class="btn btn-danger my-1 me-2" onclick="blog_delete({{ $blog->id }})">Sil</button>
                                        <a href="{{ route('blogs.edit',$blog->id) }}">
                                        <button type="button" class="btn btn-info my-1 me-2">
                                             Redaktə et
                                        </button>
                                        </a>
                                        <div class="form-check form-switch mb-2" style="display:inline">
									<input type="checkbox" class="form-check-input form-check-input-success status-checkbox" data-id="{{ $blog->id }}" id="sc_r_danger" {{ $blog->status ? 'checked' : '' }}  style="margin-top:16px;" />
							     </div>
                                   <td>
                              </tr>
                              
                         @endforeach  
                              
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     <!-- /pagination types -->
	</div>
@endsection
@section('scripts')
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="{{ asset('ajax/blogs.js') }}"></script>
@endsection