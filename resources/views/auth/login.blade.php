@extends('backend.layouts.blank')

@section('content')

		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{ static_asset('assets/dashboard/media/bg/bg-3.jpg') }}');">
					<div class="overflow-hidden text-center login-form p-7 position-relative">
						<!--begin::Login Header-->
						<div class="mb-5 d-flex flex-center">
							<a href="#">
                                @if(get_setting('system_logo_black') != null)
                                    <img src="{{ uploaded_asset(get_setting('system_logo_black')) }}" alt="{{ get_setting('site_name') }}" class="max-h-75px" style="width:100%">
                                @else
                                    <img src="{{ static_asset('assets/img/logo.svg') }}" alt="{{ get_setting('site_name') }}" class="max-h-75px">
                                @endif
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>{{ translate('Welcome to') }} @if(get_setting('site_name')) {{ get_setting('site_name') }} @else {{ translate('Spotlayer Framework') }}  @endif</h3>
								<div class="text-muted font-weight-bold">{{ translate('Login to your account.') }}</div>
							</div>
							@if(env('DEMO_MODE') == 'On')
								<p>Please check secure login</p>
							@endif
                            <form class="form" method="POST" role="form" action="{{ route('login') }}">
                                @csrf
								<div class="mb-5 form-group">
                                    <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ translate('Email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
								<div class="mb-5 form-group">
                                    <input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ translate('Password') }}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
								</div>
								<button type="submit" class="py-4 mx-4 my-3 btn btn-primary font-weight-bold px-9">{{ translate('Login') }}</button>
							</form>
							@if (\App\Addon::where('activated', 1)->count() > 0)
								@foreach(\File::files(base_path('resources/views/backend/inc/addons/login')) as $path)
									@include('backend.inc.addons.login.'.str_replace('.blade','',pathinfo($path)['filename']))
								@endforeach
							@endif
						</div>
						<!--end::Login Sign in form-->

					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->



@endsection
