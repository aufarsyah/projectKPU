@php
//dd(session()->all());
@endphp
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<meta charset="utf-8" />
		<title>Aplikasi Data DPT - 64 - @yield('title')</title>
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
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
		<link href="assets/js/leaflet_1.7/leaflet.css" rel="stylesheet" type="text/css"/>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<style type="text/css">
		.form-select-lg {
			padding-top: 1rem;
		    padding-bottom: 2.5rem;
		    padding-left: 1rem;
		    font-size: 1.15rem;
		}

		#map { height: 512px; }

		#div_chart_xy {
		  	width: 100%;
		  	height: 300px;
		}

		#div_chart_pie {
		  	width: 100%;
		  	height: 300px;
		}

		.toolbar-fixed .toolbar {
			background-color: #8f1d1d;
			color: #ffffff !important;
		}

		.btn-gold {
		  color: #000000;
		  background-color: #ffd700;
		  border-color: #ffd700;
		  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
		}
		.btn-gold:hover {
		  color: #000000;
		  background-color: #e6c200;
		  border-color: #ccac00;
		}
		.btn-check:focus + .btn-gold, .btn-gold:focus {
		  color: #000000;
		  background-color: #e6c200;
		  border-color: #ccac00;
		  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 0 0.25rem rgba(68, 174, 116, 0.5);
		}
		.btn-check:checked + .btn-gold, .btn-check:active + .btn-gold, .btn-gold:active, .btn-gold.active, .show > .btn-gold.dropdown-toggle {
		  color: #000000;
		  background-color: #998100;
		  border-color: #ccac00;
		}
		.btn-check:checked + .btn-gold:focus, .btn-check:active + .btn-gold:focus, .btn-gold:active:focus, .btn-gold.active:focus, .show > .btn-gold.dropdown-toggle:focus {
		  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125), 0 0 0 0.25rem rgba(68, 174, 116, 0.5);
		}
		.btn-gold:disabled, .btn-gold.disabled {
		  color: #000000;
		  background-color: #ffd700;
		  border-color: #ffd700;
		}

		.aside.aside-gold {
		  background-color: #ffd700;
		}
		.aside.aside-gold .aside-logo {
		  background-color: #e6c200;
		}
		.aside.aside-gold .aside-toggle svg [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		  fill: #494b74;
		}
		.aside.aside-gold .aside-toggle svg:hover [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		}
		.aside.aside-gold .separator {
		  border-bottom-color: #282a3d;
		}

		.aside-gold .hover-scroll-overlay-y {
		  --scrollbar-space: 0.4rem;
		  scrollbar-color: #3b3b64 transparent;
		}
		.aside-gold .hover-scroll-overlay-y::-webkit-scrollbar-thumb {
		  background-color: #3b3b64;
		}
		.aside-gold .menu .menu-item .menu-section {
		  color: #000000 !important;
		}
		.aside-gold .menu .menu-item .menu-link {
		  color: #000000;
		}
		.aside-gold .menu .menu-item .menu-link .menu-title {
		  color: #000000;
		}
		.aside-gold .menu .menu-item .menu-link .menu-icon i {
		  color: #000000;
		}
		.aside-gold .menu .menu-item .menu-link .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		  fill: #000000;
		}
		.aside-gold .menu .menu-item .menu-link .menu-icon .svg-icon svg:hover [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		}
		.aside-gold .menu .menu-item .menu-link .menu-bullet .bullet {
		  background-color: #000000;
		}
		.aside-gold .menu .menu-item .menu-link .menu-arrow:after {
		  background-repeat: no-repeat;
		  background-position: center;
		  background-color: transparent;
		  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 9' fill='%239899ac'%3e%3cpath fill-rule='evenodd' clip-rule='evenodd' d='M5.93537 4.57889C6.03839 4.77912 6.0191 5.0363 5.87137 5.21403L2.87153 8.82282C2.68598 9.04603 2.36951 9.06026 2.16468 8.8546C1.95985 8.64893 1.94422 8.30126 2.12977 8.07804L4.80594 4.85863L2.15586 1.93583C1.96104 1.72096 1.96165 1.37314 2.15722 1.15895C2.35279 0.944757 2.66927 0.945311 2.86409 1.16018L5.85194 4.45551C5.8859 4.49296 5.91371 4.53459 5.93537 4.57889Z'/%3e%3c/svg%3e");
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active),
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) {
		  transition: color 0.2s ease, background-color 0.2s ease;
		  background-color: #1b1b28;
		  color: #ffffff;
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active) .menu-title,
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-title {
		  color: #ffffff;
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active) .menu-icon i,
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-icon i {
		  color: #009EF7;
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active) .menu-icon .svg-icon svg [fill]:not(.permanent):not(g),
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		  fill: #009EF7;
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active) .menu-icon .svg-icon svg:hover [fill]:not(.permanent):not(g),
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-icon .svg-icon svg:hover [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active) .menu-bullet .bullet,
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-bullet .bullet {
		  background-color: #009EF7;
		}
		.aside-gold .menu .menu-item.hover > .menu-link:not(.disabled):not(.active) .menu-arrow:after,
		.aside-gold .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-arrow:after {
		  background-repeat: no-repeat;
		  background-position: center;
		  background-color: transparent;
		  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 9' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' clip-rule='evenodd' d='M5.93537 4.57889C6.03839 4.77912 6.0191 5.0363 5.87137 5.21403L2.87153 8.82282C2.68598 9.04603 2.36951 9.06026 2.16468 8.8546C1.95985 8.64893 1.94422 8.30126 2.12977 8.07804L4.80594 4.85863L2.15586 1.93583C1.96104 1.72096 1.96165 1.37314 2.15722 1.15895C2.35279 0.944757 2.66927 0.945311 2.86409 1.16018L5.85194 4.45551C5.8859 4.49296 5.91371 4.53459 5.93537 4.57889Z'/%3e%3c/svg%3e");
		}
		.aside-gold .menu .menu-item.here > .menu-link, .aside-gold .menu .menu-item.show > .menu-link {
		  transition: color 0.2s ease, background-color 0.2s ease;
		  background-color: #1b1b28;
		  color: #ffffff;
		}
		.aside-gold .menu .menu-item.here > .menu-link .menu-title, .aside-gold .menu .menu-item.show > .menu-link .menu-title {
		  color: #ffffff;
		}
		.aside-gold .menu .menu-item.here > .menu-link .menu-icon i, .aside-gold .menu .menu-item.show > .menu-link .menu-icon i {
		  color: #009EF7;
		}
		.aside-gold .menu .menu-item.here > .menu-link .menu-icon .svg-icon svg [fill]:not(.permanent):not(g), .aside-gold .menu .menu-item.show > .menu-link .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		  fill: #009EF7;
		}
		.aside-gold .menu .menu-item.here > .menu-link .menu-icon .svg-icon svg:hover [fill]:not(.permanent):not(g), .aside-gold .menu .menu-item.show > .menu-link .menu-icon .svg-icon svg:hover [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		}
		.aside-gold .menu .menu-item.here > .menu-link .menu-bullet .bullet, .aside-gold .menu .menu-item.show > .menu-link .menu-bullet .bullet {
		  background-color: #009EF7;
		}
		.aside-gold .menu .menu-item.here > .menu-link .menu-arrow:after, .aside-gold .menu .menu-item.show > .menu-link .menu-arrow:after {
		  background-repeat: no-repeat;
		  background-position: center;
		  background-color: transparent;
		  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 9' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' clip-rule='evenodd' d='M5.93537 4.57889C6.03839 4.77912 6.0191 5.0363 5.87137 5.21403L2.87153 8.82282C2.68598 9.04603 2.36951 9.06026 2.16468 8.8546C1.95985 8.64893 1.94422 8.30126 2.12977 8.07804L4.80594 4.85863L2.15586 1.93583C1.96104 1.72096 1.96165 1.37314 2.15722 1.15895C2.35279 0.944757 2.66927 0.945311 2.86409 1.16018L5.85194 4.45551C5.8859 4.49296 5.91371 4.53459 5.93537 4.57889Z'/%3e%3c/svg%3e");
		}
		.aside-gold .menu .menu-item .menu-link.active {
		  transition: color 0.2s ease, background-color 0.2s ease;
		  background-color: #1b1b28;
		  color: #ffffff;
		}
		.aside-gold .menu .menu-item .menu-link.active .menu-title {
		  color: #ffffff;
		}
		.aside-gold .menu .menu-item .menu-link.active .menu-icon i {
		  color: #009EF7;
		}
		.aside-gold .menu .menu-item .menu-link.active .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		  fill: #009EF7;
		}
		.aside-gold .menu .menu-item .menu-link.active .menu-icon .svg-icon svg:hover [fill]:not(.permanent):not(g) {
		  transition: fill 0.3s ease;
		}
		.aside-gold .menu .menu-item .menu-link.active .menu-bullet .bullet {
		  background-color: #009EF7;
		}
		.aside-gold .menu .menu-item .menu-link.active .menu-arrow:after {
		  background-repeat: no-repeat;
		  background-position: center;
		  background-color: transparent;
		  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 9' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' clip-rule='evenodd' d='M5.93537 4.57889C6.03839 4.77912 6.0191 5.0363 5.87137 5.21403L2.87153 8.82282C2.68598 9.04603 2.36951 9.06026 2.16468 8.8546C1.95985 8.64893 1.94422 8.30126 2.12977 8.07804L4.80594 4.85863L2.15586 1.93583C1.96104 1.72096 1.96165 1.37314 2.15722 1.15895C2.35279 0.944757 2.66927 0.945311 2.86409 1.16018L5.85194 4.45551C5.8859 4.49296 5.91371 4.53459 5.93537 4.57889Z'/%3e%3c/svg%3e");
		}

		.menu-title-gray-800 .menu-item .menu-link .menu-title {
		    color: #000000;
		}

		.svg-icon svg [fill]:not(.permanent):not(g) {
		    fill: #000000;
		}

		.btn.btn-active-color-primary.active .svg-icon svg [fill]:not(.permanent):not(g) {
			fill: #000000;
		}

		.text-muted {
		    color: #000000 !important;
		}

		hr {
		  	border:none;
		  	border-top:1px dashed #ffd700;
		  	color:#000000;
		  	background-color:#000000;
		  	height:1px;
		  	margin: 15px 0 0 0;
		}

		marquee {
			margin-top: 40px;
			width: 100%;
		}
	</style>
	@yield('style')

	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-gold aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto align-items-left" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="/dashboard">
							<img alt="Logo" src="assets/media/logos/instlogo.svg" class="h-45px logo" />
							<img alt="Logo" src="assets/media/logos/64-logo-white.png" class="h-40px logo" />
							<!-- <span class="fw-bold fs-6 text-white logo">MANAGEMENT ASSET</span> -->

						</a>
						<!--end::Logo-->
						<!--begin::Aside toggler-->
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/stockholm/Navigation/Angle-double-left.svg-->
							<span class="svg-icon svg-icon-1 rotate-180">
								{{-- <img src="assets/media/icons/stockholm/Navigation/Angle-double-left.svg"/> --}}
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside toggler-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item">
									<a class="menu-link" href="/dashboard">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/stockholm/Design/PenAndRuller.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
													<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
								</div>
								<hr></hr>
								<!-- if(
									in_array("perizinan_ln_setup", Session::get('privilege')) ||
									in_array("perizinan_nikah_setup", Session::get('privilege'))
									) -->
								<div class="menu-item">
									<div class="menu-content pt-8 pb-0">
										<span class="menu-section text-muted text-uppercase fs-8">Menu</span>
									</div>
								</div>
								<!-- endif -->
								
								<!-- if(in_array("perizinan_ln_setup", Session::get('privilege'))) -->
								<div class="menu-item">
									<a class="menu-link" href="/grafik_dpt">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.25" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z" fill="#12131A" />
													<path d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z" fill="#12131A" />
													<path opacity="0.25" d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z" fill="#12131A" />
													<path d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z" fill="#12131A" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Data DPT</span>
									</a>
								</div>
								<!-- endif -->

								<!-- if(in_array("perizinan_nikah_setup", Session::get('privilege'))) -->
								<div class="menu-item">
									<a class="menu-link" href="/grafik_ppwp">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.25" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z" fill="#12131A" />
													<path d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z" fill="#12131A" />
													<path opacity="0.25" d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z" fill="#12131A" />
													<path d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z" fill="#12131A" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Data PPWP</span>
									</a>
								</div>
								<!-- endif -->

								@if(
									in_array("user_setup", Session::get('privilege')) ||
									in_array("group_setup", Session::get('privilege'))
									)
								<div class="menu-item">
									<div class="menu-content pt-8 pb-0">
										<span class="menu-section text-muted text-uppercase fs-8">Config</span>
									</div>
								</div>
								@endif

								@if(in_array("user_setup", Session::get('privilege')))
								<div class="menu-item">
									<a class="menu-link" href="/user">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.25" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z" fill="#12131A" />
													<path d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z" fill="#12131A" />
													<path opacity="0.25" d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z" fill="#12131A" />
													<path d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z" fill="#12131A" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">User Setup</span>
									</a>
								</div>
								@endif

								@if(in_array("group_setup", Session::get('privilege')))
								<div class="menu-item">
									<a class="menu-link" href="/group">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.25" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z" fill="#12131A" />
													<path d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z" fill="#12131A" />
													<path opacity="0.25" d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z" fill="#12131A" />
													<path d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z" fill="#12131A" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Group Setup</span>
									</a>
								</div>
								@endif

							</div>
							<!--end::Menu-->
						</div>
					</div>
					<!--end::Aside menu-->
					<!--begin::Footer-->
					<div class="aside-footer flex-column-auto" id="kt_aside_footer"></div>
					<!--end::Footer-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" data-bs-toggle="tooltip" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
									<!--begin::Svg Icon | path: icons/stockholm/Text/Menu.svg-->
									<span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
												<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
											</g>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Mobile logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="/dashboard" class="d-lg-none">
									<!-- <img alt="Logo" src="assets/media/logos/instlogo.svg" class="h-35px" /> -->
									<!-- <img alt="Logo" src="assets/media/logos/64-logo-blue.png" class="h-40px logo" /> -->
								</a>
								<span class="menu-title fw-bolder fs-1">APLIKASI DATA DPT - 64</span>
							</div>
							<!--end::Mobile logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
								
								<!--begin::Topbar-->
								<div class="d-flex align-items-stretch flex-shrink-0">
									<!--begin::Toolbar wrapper-->
									<div class="d-flex align-items-stretch flex-shrink-0">
										<!--begin::User-->
										<div class="d-flex align-items-center ms-1 ms-lg-3">
											<!--begin::Menu toggle-->
											<ul class="list-unstyled m-0">
												<li class="text-gray-600 fw-bold text-center">{{ Session::get('first_name').' '.Session::get('last_name') }}</li>
												<li class="text-center"><span class="badge badge-light-primary fs-8">{{ Session::get('group_name') }}</span></li>
											</ul>
										</div>
										<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
											<!--begin::Menu-->
											<div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
												<img src="assets/media/avatars/blank.png" alt="metronic" />
											</div>
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="assets/media/avatars/blank.png" />
														</div>
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">{{ Session::get('first_name').' '.Session::get('last_name') }}
															</div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Session::get('email') }}</a>
															<span class="badge badge-light-primary fw-bolder mt-2">{{ Session::get('group_name') }}</span>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<!-- <div class="menu-item px-5 my-1">
													<a href="/profile" class="menu-link px-5">Change Profile</a>
												</div> -->
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="/signout_process" class="menu-link px-5">Sign Out</a>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
											<!--end::Menu-->
										</div>
										<!--end::User -->
									</div>
									<!--end::Toolbar wrapper-->
								</div>
								<!--end::Topbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					@yield('content')
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2022©</span>
								<a href="" target="_blank" class="text-gray-800 text-hover-primary">aufr</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<!-- <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com/faqs" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul> -->
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/jsPDF-1.3.2/dist/jspdf.min.js"></script>
		<script src="assets/js/jsPDF-1.3.2/dist/jspdf.plugin.autotable.js"></script>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="assets/js/leaflet_1.7/leaflet.js"></script>
		<script src="assets/js/amcharts_5.1.11/index.js"></script>
		<script src="assets/js/amcharts_5.1.11/xy.js"></script>
		<script src="assets/js/amcharts_5.1.11/percent.js"></script>
		<script src="assets/js/amcharts_5.1.11/themes/Animated.js"></script>
		<script src="assets/js/countUp_2.1.0/dist/countUp.min.js" type="module"></script>
		<!-- <script src="assets/js/amcharts_5.1.11/geodata/germanyLow.js"></script> -->
		<!-- <script src="assets/js/amcharts_5.1.11/fonts/notosans-sc.js"></script> -->
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
@yield('javascript')
