@extends('admin.layouts.master')
@section('title', 'Kateqoriya Siyahısı')
@section('header')
     Kateqoriya - <span class="fw-normal">Siyahısı</span>
@endsection
@section('content')
	<div class="content">
		<!-- Pagination types -->
     <div class="card">

       <div class="card-header d-flex justify-content-between">
               <h5 class="mb-0">Kateqoriya Siyahısı</h5>
               <a href="{{ route('categories.create') }}">
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
                                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Əməliyyatlar</th>
                              </tr>
                         </thead>
                         <tbody>

                         @foreach ($categories as $category)

                              <tr class="odd" id="all">
                                   <td class="sorting_1" id="loop">{{ $loop->iteration }}</td>
                                   <td id="title">{{ $category->name }}</td>
                                   <td id="operation">
                                        <button type="button" class="btn btn-danger my-1 me-2" onclick="category_delete({{ $category->id }})">Sil</button>
                                        <a href="{{ route('categories.edit',$category->id) }}">
                                        <button type="button" class="btn btn-info my-1 me-2">
                                             Redaktə et
                                        </button>
                                        </a>
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