@extends('admin.layouts.master')
@section('title', 'Mənimlə əlaqə')
@section('links')
     <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
     <script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection
@section('header')
     Mənimlə Əlaqə - <span class="fw-normal">Siyahısı</span>
@endsection
@section('content')
	<div class="content">
		<!-- Pagination types -->
     <div class="card">
          <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
               
               <div class="datatable-scroll">
                    <table class="table datatable-pagination dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                         <thead>
                              <tr>
                                   <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">#</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Ad Soyad</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">E-poçt</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Mesaj</th>
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Əməliyyatlar</th>
                              </tr>
                         </thead>
                         <tbody>

                         @foreach ($contactMe as $contact)

                              <tr class="odd" id="all">
                                   <td class="sorting_1" id="loop">{{ $loop?->iteration }}</td>
                                   <td id="title">{{ $contact?->name }}</td>
                                   <td id="title">{{ $contact?->email }}</td>
                                   <td id="title">{{ $contact?->message }}</td>
                                   <td id="operation">
                                        <button type="button" class="btn btn-danger my-1 me-2" onclick="blog_delete({{ $contact?->id }})">Sil</button>
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