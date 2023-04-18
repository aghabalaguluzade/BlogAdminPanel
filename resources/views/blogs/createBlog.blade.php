@extends('layouts.master')
@section('title', 'Əlavə etmək')
@section('content')
     <div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light shadow">
					<div class="page-header-content d-lg-flex">
						<div class="d-flex">
							<h4 class="page-title mb-0">
								Forms - <span class="fw-normal">Floating Labels</span>
							</h4>

							<a href="#page_header" class="btn btn-light align-self-center d-lg-none border-transparent rounded-pill p-0 ms-auto collapsed" data-bs-toggle="collapse" aria-expanded="false">
								<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
							</a>
						</div>

					
					</div>

					<div class="page-header-content d-lg-flex border-top">
						<div class="d-flex">
							<div class="breadcrumb py-2">
								<a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
								<a href="#" class="breadcrumb-item">Forms</a>
								<span class="breadcrumb-item active">Floating labels</span>
							</div>

							<a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
								<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Form inputs -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Floating labels</h5>
						</div>
						<div class="card-body">
							<div class="mb-4">

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Başlıq</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control" placeholder="Placeholder" />
											<label>Başlıq daxil edin....</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">With value</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control" value="Input value" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2" for="focus_click">Focus on label click</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control" id="focus_click" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">With form text</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
										<div class="form-text">Form helper text</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Framed form helper</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control rounded-bottom-0" placeholder="Placeholder">
											<div class="form-text bg-light border border-top-0 rounded-bottom px-2 py-1 mt-0">Form helper</div>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Badge form helper</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control rounded-bottom-0" placeholder="Placeholder">
											<div class="mt-1">
												<span class="badge bg-primary">Badge helper</span>
											</div>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Static text</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<div class="form-control-plaintext">This is a static text</div>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Static input</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control-plaintext" readonly="" value="This is a static readonly input" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Select</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<select class="form-select">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
											</select>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Data list combo</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input list="datalist_example" class="form-control" placeholder="Select option">
											<datalist id="datalist_example">
											    <option value="Option 1"></option>
											    <option value="Option 2"></option>
											    <option value="Option 3"></option>
											    <option value="Option 4"></option>
											    <option value="Option 5"></option>
											    <option value="Option 6"></option>
											    <option value="Option 7"></option>
											    <option value="Option 8"></option>
											</datalist>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Textarea</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Placeholder" style="height: 100px;"></textarea>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Textarea with value</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Placeholder" style="height: 100px;">Textarea text</textarea>
											<label>Floating label</label>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-4">
								<div class="fw-bold border-bottom pb-2 mb-3">States</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Readonly field</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control" value="Field value" placeholder="Placeholder" readonly="">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Disabled field</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control" placeholder="Placeholder" disabled="">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Readonly textarea</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Placeholder" readonly="" style="height: 100px;">Textarea value</textarea>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Disabled textarea</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Placeholder" disabled="" style="height: 100px;"></textarea>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Disabled select</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<select class="form-select" disabled="">
												<option value="1" selected="">Selected option</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
											</select>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Disabled data list</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input list="datalist_example" class="form-control" placeholder="Select option" disabled="">
											<datalist id="datalist_example">
											    <option value="Option 1"></option>
											    <option value="Option 2"></option>
											    <option value="Option 3"></option>
											    <option value="Option 4"></option>
											    <option value="Option 5"></option>
											    <option value="Option 6"></option>
											    <option value="Option 7"></option>
											    <option value="Option 8"></option>
											</datalist>
											<label>Floating label</label>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-4">
								<div class="fw-bold border-bottom pb-2 mb-3">Icons, spinners and buttons</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Left icon</label>
									<div class="col-lg-10">
										<div class="form-floating form-control-feedback form-control-feedback-start">
											<div class="form-control-feedback-icon">
												<i class="ph-user"></i>
											</div>
											<input type="text" class="form-control" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Left spinner</label>
									<div class="col-lg-10">
										<div class="form-floating form-control-feedback form-control-feedback-start">
											<div class="form-control-feedback-icon">
												<div class="spinner-border" role="status">
													<span class="visually-hidden">Loading...</span>
												</div>
											</div>
											<input type="text" class="form-control" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Right icon</label>
									<div class="col-lg-10">
										<div class="form-floating form-control-feedback form-control-feedback-end">
											<input type="text" class="form-control" placeholder="Placeholder">
											<div class="form-control-feedback-icon">
												<i class="ph-user"></i>
											</div>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Right spinner</label>
									<div class="col-lg-10">
										<div class="form-floating form-control-feedback form-control-feedback-end">
											<input type="text" class="form-control" placeholder="Placeholder">
											<div class="form-control-feedback-icon">
												<div class="spinner-border" role="status">
													<span class="visually-hidden">Loading...</span>
												</div>
											</div>
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Floating button</label>
									<div class="col-lg-10">
										<div class="position-relative">
											<div class="form-floating">
												<input type="text" class="form-control" placeholder="Placeholder">
												<label>Floating label</label>
											</div>
											<div class="position-absolute end-0 top-50 translate-middle-y me-2">
												<button type="button" class="btn btn-light btn-sm btn-icon rounded-pill">
													<i class="ph-x"></i>
												</button>
											</div>
										</div>
									</div>
								</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Icon and floating button</label>
									<div class="col-lg-10">
										<div class="position-relative">
											<div class="form-floating form-control-feedback form-control-feedback-start">
												<div class="form-control-feedback-icon">
													<i class="ph-magnifying-glass"></i>
												</div>
												<input type="text" class="form-control" placeholder="Placeholder">
												<label>Floating label</label>
											</div>
											<div class="position-absolute end-0 top-50 translate-middle-y me-2">
												<button type="button" class="btn btn-light btn-sm btn-icon rounded-pill">
													<i class="ph-x"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div>
								<div class="fw-bold border-bottom pb-2 mb-3">Validation</div>

								<div class="row mb-3">
									<label class="col-form-label col-lg-2">Success state</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control is-valid" value="Success" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>

								<div class="row">
									<label class="col-form-label col-lg-2">Error state</label>
									<div class="col-lg-10">
										<div class="form-floating">
											<input type="text" class="form-control is-invalid" value="Error" placeholder="Placeholder">
											<label>Floating label</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /form inputs -->

				</div>
				<!-- content area -->


				<!-- Footer -->
				<div class="navbar navbar-sm navbar-footer border-top">
					<div class="container-fluid">
						<span>© 2022 <a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328">Limitless Web App Kit</a></span>

						<ul class="nav">
							<li class="nav-item">
								<a href="https://kopyov.ticksy.com/" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-lifebuoy"></i>
										<span class="d-none d-md-inline-block ms-2">Support</span>
									</div>
								</a>
							</li>
							<li class="nav-item ms-md-1">
								<a href="https://demo.interface.club/limitless/demo/Documentation/index.html" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-file-text"></i>
										<span class="d-none d-md-inline-block ms-2">Docs</span>
									</div>
								</a>
							</li>
							<li class="nav-item ms-md-1">
								<a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link navbar-nav-link-icon text-primary bg-primary bg-opacity-10 fw-semibold rounded" target="_blank">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-shopping-cart"></i>
										<span class="d-none d-md-inline-block ms-2">Purchase</span>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		<div class="btn-to-top"><button class="btn btn-secondary btn-icon rounded-pill" type="button"><i class="ph-arrow-up"></i></button></div></div>
@endsection