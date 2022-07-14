<!DOCTYPE html>
<!--
Product Name: Metronic - Bootstrap 5 HTML Multi-purpose Admin Dashboard ThemeAuthor: KeenThemes
Purchase: https://1.envato.market/EA4JPWebsite: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Aplikasi Data DPT - 64</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="Craft admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Craft, bootstrap, Angular 10, Vue, React, Laravel, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/start" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<style type="text/css">
		canvas{
		  	/*prevent interaction with the canvas*/
		  	pointer-events:none;
		}
	</style>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" onload="createCaptcha()">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size1: 100% 50%; background-image: url(assets/media/svg/illustrations/progress.svg)">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="/signin" class="mb-5">
						<img alt="Logo" src="assets/media/logos/instlogo.svg" class="h-100px" />
					</a>
					<span class="h1 mb-10">Aplikasi Data DPT - 64</span>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-white rounded shadow-sm p-10 px-lg-15 pt-5 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="form_signin" method="POST">
							@method("POST")
							@csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<!-- <h1 class="text-dark mb-3">Sign In</h1> -->
								<!--end::Title-->
								<!--begin::Link-->
								{{-- <div class="text-gray-400 fw-bold fs-4">New Here?
									<a href="/signup" class="link-primary fw-bolder">Create an Account</a>
								</div> --}}
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Username</label>
								<!--end::Label-->
								<!--begin::Input-->
								{{-- <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" /> --}}
								<input class="form-control form-control-lg form-control-solid" type="text" name="user_login_data" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!--end::Label-->
									<!--begin::Link-->
									{{-- <a href="authentication/flows/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a> --}}
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
								<!--end::Input-->
							</div>
							<div class="fv-row mb-10 row">
								<label class="form-label fs-6 fw-bolder text-dark">Captcha</label>
								<div id="captcha" class="col-3"></div>
								<div class="col-9">
									<input class="form-control form-control-lg form-control-solid" type="text" id="captcha_input" name="captcha_input" autocomplete="off" />
								</div>
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2 w-100">
									<span class="indicator-label">Sign In</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!-- <button type="button" id="btn_sign_up" class="btn btn-lg btn-secondary fw-bolder me-3 my-2">
									<span class="indicator-label">Sign Up</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button> -->
								<!--end::Submit button-->
								<!--begin::Google link-->
								{{-- <a href="#" class="btn btn-light-primary btn-lg fw-bolder my-2">
								<img alt="Logo" src="assets/media/svg/social-icons/google.svg" class="h-20px me-3" />Sign in with Google</a> --}}
								<!--end::Google link-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<!-- <div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com/faqs" class="text-muted text-hover-primary px-2">About</a>
						<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
				</div> -->
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/authentication/sign-in/general.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>

<script type="text/javascript">

	var code;
	function createCaptcha() {
		//clear the contents of captcha div first 
		document.getElementById('captcha').innerHTML = "";
		var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		// var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
		var lengthOtp = 6;
		var captcha = [];
		for (var i = 0; i < lengthOtp; i++) {
		//below code will not allow Repetition of Characters
		var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
		if (captcha.indexOf(charsArray[index]) == -1)
		  captcha.push(charsArray[index]);
		else i--;
		}
		var canv = document.createElement("canvas");
		canv.id = "captcha";
		canv.width = 100;
		canv.height = 50;
		var ctx = canv.getContext("2d");
		ctx.font = "25px Georgia";
		ctx.strokeText(captcha.join(""), 0, 30);
		//storing captcha so that can validate you can save it somewhere else according to your specific requirements
		code = captcha.join("");
		document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element

		// console.log(code);
	}

	function validateCaptcha() {
	  	event.preventDefault();
	 	//debugger
	  	if (document.getElementById("captcha_input").value == code) {
	    	alert("Valid Captcha")
	  	}else{
	    	alert("Invalid Captcha. try Again");
	    	createCaptcha();
	  	}
	}

	$('#btn_sign_up').click( function () {
				
		Swal.fire({
		  title: 'Sign Up',
		  input: 'email',
		  inputLabel: "Currently we're restricting for open sign up. Tell me your email address and i'll create one for you.",
		  inputPlaceholder: 'Enter your email address'
		}).then( function(result) {

			var email = result.value;

		    $.ajax({
		    	headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
                url: '/mail',
                type:'POST',
                cache: false,
                data: {email : email},
                success: function(data) {
                    console.log(data);

                    if (data.result == 'success') {

                        Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) { 
                                // window.location.replace("/area");
                            }
                        });
                    }
                    else{

                        // form.reset();  // reset form                    

                        swalWithBootstrapButtons.fire(
                            'Failed!',
                            data.message,
                            'error'
                        )
                    }
                    
                }
            });
		    
		});
	});


</script>