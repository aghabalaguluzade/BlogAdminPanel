@extends('admin.layouts.master')
@section('title', 'Profilim')
@section('content')
     <div class="card">
									<div class="card-header">
										<h5 class="mb-0">Account settings</h5>
									</div>

									<div class="card-body">
										<form action="#">
											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Username</label>
														<input type="text" value="Vicky" readonly="" class="form-control">
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Current password</label>
														<input type="password" value="password" readonly="" class="form-control">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">New password</label>
														<input type="password" placeholder="Enter new password" class="form-control">
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Repeat password</label>
														<input type="password" placeholder="Repeat new password" class="form-control">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Profile visibility</label>

														<label class="form-check mb-2">
															<input type="radio" name="visibility" class="form-check-input" checked="">
															<span class="form-check-label">Visible to everyone</span>
														</label>

														<label class="form-check mb-2">
															<input type="radio" name="visibility" class="form-check-input">
															<span class="form-check-label">Visible to friends only</span>
														</label>

														<label class="form-check mb-2">
															<input type="radio" name="visibility" class="form-check-input">
															<span class="form-check-label">Visible to my connections only</span>
														</label>

														<label class="form-check">
															<input type="radio" name="visibility" class="form-check-input">
															<span class="form-check-label">Visible to my colleagues only</span>
														</label>
													</div>
												</div>

												<div class="col-lg-6">
													<div class="mb-3">
														<label class="form-label">Notifications</label>

														<label class="form-check mb-2">
															<input type="checkbox" class="form-check-input" checked="">
															<span class="form-check-label">Password expiration notification</span>
														</label>

														<label class="form-check mb-2">
															<input type="checkbox" class="form-check-input" checked="">
															<span class="form-check-label">New message notification</span>
														</label>

														<label class="form-check mb-2">
															<input type="checkbox" class="form-check-input" checked="">
															<span class="form-check-label">New task notification</span>
														</label>

														<label class="form-check">
															<input type="checkbox" class="form-check-input">
															<span class="form-check-label">New contact request notification</span>
														</label>
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