@extends('admin.layouts.master')
@section('title', 'Profilim')
@section('content')
     <div class="card">
									<div class="card-header">
										<h5 class="mb-0">Account settings</h5>
									</div>

									<div class="card-body">
									@include('admin.errors.errors')
										<form method="POST" action="{{ route('profile.update') }}">
											@csrf
                        							@method('PUT')
											<div class="row">

												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Ad Soyad</label>
														<input type="text" class="form-control" placeholder="Ad Soyad daxil edin..." name="name" value="{{ $user?->name }}" />
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">E-poçt</label>
														<input type="email" class="form-control" placeholder="E-poçt daxil edin..." name="email" value="{{ $user?->email }}" />
													</div>
												</div>

												<div class="col-lg-12">
													<div class="mb-3">
														<label class="form-label">Çari Şifrə</label>
														<input type="password" class="form-control" placeholder="Çari şifrəni daxil edin..." name="password" />
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Yeni şifrə</label>
														<input type="password" placeholder="Yeni şifrə daxil edin..." class="form-control" name="new_password" />
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Şifrə təkrarı</label>
														<input type="password" placeholder="Şifrə təkrarını daxil edin..." class="form-control" name="repeat_password" />
													</div>
												</div>
											</div>

					                        <div class="text-end">
					                        	<button type="submit" class="btn btn-primary">Save changes</button>
					                        </div>
				                        </form>
									</div>
								</div>
@endsection