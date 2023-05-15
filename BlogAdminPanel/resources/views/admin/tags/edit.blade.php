@extends('admin.layouts.master')
@section('title', 'Redaktə etmək')
@section('header')
    Taq - <span class="fw-normal">Redaktə et</span>
@endsection
@section('content')
				<!-- Content area -->
				<div class="content"> 

					<!-- Form inputs -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Taq redaktə et</h5>
						</div>
						<div class="card-body">
                            @include('admin.errors.errors')
                            <form action="{{ route('tags.update',$tag?->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-4">
                                   <div class="mb-4">
                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-2">Taq başlığı</label>
                                        <div class="col-lg-10">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Placeholder" name="name" value="{{ $tag?->name }}" />
                                                <label>Başlıq daxil edin....</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-end">
								<button type="submit" class="btn btn-primary">Redaktə et <i class="ph-paper-plane-tilt ms-2"></i></button>
							</div>
                                </div>
                            </form>
						</div>
					</div>
					<!-- /form inputs -->

				</div>
				<!-- content area -->
@endsection