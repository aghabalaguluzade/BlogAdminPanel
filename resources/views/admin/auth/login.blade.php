@include('admin.layouts.head')
@section('title', 'Giriş')
<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">
					<!-- Login card -->
					<form class="login-form" action="{{ route('login') }}" method="POST" id="login-recaptcha">
                         @include('admin.errors.errors')
                              @csrf
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
										<img src="https://demo.interface.club/limitless/demo/template/assets/images/logo_icon.svg" class="h-48px" alt="">
									</div>
									<h5 class="mb-0">Login to your account</h5>
									{{-- <span class="d-block text-muted">Enter your credentials below</span> --}}
								</div>

								<div class="mb-3">
									<label class="form-label">E-poçt</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="email" class="form-control" placeholder="E-poçt daxil et..." name="email" required />
										<div class="form-control-feedback-icon">
											<i class="ph-user-circle text-muted"></i>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label class="form-label">Şifrə</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="password" class="form-control" placeholder="•••••••••••" name="password" required />
										<div class="form-control-feedback-icon">
											<i class="ph-lock text-muted"></i>
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center mb-3">
									<label class="form-check">
										<input type="checkbox" name="remember_token" class="form-check-input" />
										<span class="form-check-label">Məni xatırla</span>
									</label>
								</div>

								<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" />

								<div class="mb-3">
									<button type="button" class="btn btn-primary w-100" onClick="onClick(event)">Giriş et</button>
								</div>

							</div>
						</div>
					</form>
					<!-- /login card -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /inner content -->

		<div class="btn-to-top"><button class="btn btn-secondary btn-icon rounded-pill" type="button"><i class="ph-arrow-up"></i></button></div></div>
		<!-- /main content -->

	</div>
	<script>
		function onClick(e) {
		e.preventDefault();
		grecaptcha.ready(function() {
			grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'login'}).then(function(token) {
				document.getElementById("g-recaptcha-response").value = token;
				document.getElementById("login-recaptcha").submit();
			});
		});
		}
  	</script>
