@extends('layout')

@section('title', 'Izin Luar Negeri')

@section('content')
	
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Toolbar-->
		<div class="toolbar" id="kt_toolbar">
			<!--begin::Container-->
			<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
				<!--begin::Page title-->
				<div class="d-flex align-items-center me-3">
					<!--begin::Title-->
					<h1 class="d-flex align-items-center fw-bolder my-1 fs-3">Izin Luar Negeri</h1>
					<!--end::Title-->
					<!--begin::Separator-->
					<span class="h-20px border-gray-200 border-start mx-4"></span>
					<!--end::Separator-->
				</div>
				<!--end::Page title-->

				<!--begin::Actions-->
				<div class="d-flex align-items-center py-1">
					<!--begin::Button-->
					@if(in_array("perizinan_ln_setup_create", Session::get('privilege')))
					<a class="btn btn-sm btn-gold" data-bs-toggle="modal" data-bs-target="#modal_data" id="btn_add">Tambah Data</a>
					@endif
					<!--end::Button-->
				</div>
				<!--end::Actions-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Toolbar-->
		<!--begin::Post-->
		<div class="post d-flex flex-column-fluid" id="kt_post">
			<!--begin::Container-->
			<div id="kt_content_container" class="container">
				<!--begin::Card-->
				<div class="card">
					<!--begin::Card body-->
					<div class="card-body p-0">
						<!--begin::Wrapper-->
						<div class="card-px py-10">
							<div class="table-responsive">
								<table id="table_data" class="table table-rounded table-striped border gy-7 gs-7">
									<thead>
										<tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
											<th class="d-none"></th>
											<th class="">Nama</th>
											<th class="">Keperluan</th>
											<th class="">Syarat</th>
											<th class="">Disposisi</th>
											<th class="">Proses</th>
											<th class="">Selesai</th>
											<th class="">Tanggal</th>
											<th class="">Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>

							<hr>

							<div class="mt-10"><h1 class="d-flex align-items-center fw-bolder my-1 fs-3">Notes</h1></div>

							@if(in_array("perizinan_ln_setup_create", Session::get('privilege')))
							<div class="d-flex justify-content-end">
								<a class="btn btn-sm btn-gold" data-bs-toggle="modal" data-bs-target="#modal_notes" id="btn_add_notes">Tambah Notes</a>
							</div>
							@endif

							<div class="table-responsive mt-3">
								<table id="table_notes" class="table table-rounded table-striped border gy-7 gs-7">
									<thead>
										<tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
											<th class="d-none"></th>
											<th class="min-w-10px">Tanggal</th>
											<th class="min-w-200px">Notes</th>
											<th class="">Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!-- <div class="runtext-container">
								<div class="main-runtext">
									<marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">

										<div class="holder">
									    	<div class="text-container">
									   			<a data-fancybox-group="gallery" class="fancybox text-danger fs-4" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.">
									   				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
									   			</a>
									   		</div>
										</div>

									</marquee>
								</div>
							</div> -->
						</div>
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Post-->
	</div>

	<div class="modal fade" id="modal_data">
		<div class="modal-dialog" style="max-width: 700px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Perizinan</h5>

					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
						<img src="assets/media/icons/stockholm/Navigation/Close.svg"/>
					</div>
					<!--end::Close-->
				</div>

				<div class="modal-body">
					<!--begin::Form-->
					<form enctype="multipart/form-data" class="form w-100" novalidate="novalidate" id="form_data">

						@method("POST")
						@csrf
						<input class="d-none" type="text" name="perizinan_ln_id" id="perizinan_ln_id" disabled="disabled" />
						<div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Nama</label>
							<input class="form-control form-control-lg form-control-solid" type="text" placeholder="input nama" name="nama" autocomplete="off" id="nama" maxlength="20" />
						</div>
						<div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Select Keperluan</label>
							<select id="select_keperluan" class="form-select form-select-lg" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" >
								<option value="" selected disabled></option>
							</select>
						</div>
						<div class="fv-row mb-7">
							<div>   
								<label class="form-label fw-bolder text-dark fs-6">Syarat</label>
							</div>
							<div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success syarat_sudah" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="syarat_sudah" name="syarat" value="sudah"/>
									<!--end::Input-->
									Sudah
								</label>
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger syarat_belum" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="syarat_belum" name="syarat" value="belum"/>
									<!--end::Input-->
									Belum
								</label>
							</div>
						</div>
						<div class="fv-row mb-7">
							<div>   
								<label class="form-label fw-bolder text-dark fs-6">Disposisi</label>
							</div>
							<div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success disposisi_sudah" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="disposisi_sudah" name="disposisi" value="sudah"/>
									<!--end::Input-->
									Sudah
								</label>
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger disposisi_belum" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="disposisi_belum" name="disposisi" value="belum"/>
									<!--end::Input-->
									Belum
								</label>
							</div>
						</div>
						<div class="fv-row mb-7">
							<div>   
								<label class="form-label fw-bolder text-dark fs-6">Proses</label>
							</div>
							<div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success proses_sudah" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="proses_sudah" name="proses" value="sudah"/>
									<!--end::Input-->
									Sudah
								</label>
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger proses_belum" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="proses_belum" name="proses" value="belum"/>
									<!--end::Input-->
									Belum
								</label>
							</div>
						</div>
						<div class="fv-row mb-7">
							<div>   
								<label class="form-label fw-bolder text-dark fs-6">Selesai</label>
							</div>
							<div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success selesai_sudah" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="selesai_sudah" name="selesai" value="sudah"/>
									<!--end::Input-->
									Sudah
								</label>
								<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-danger selesai_belum" data-kt-button="true">
									<!--begin::Input-->
									<input class="btn-check" type="radio" id="selesai_belum" name="selesai" value="belum"/>
									<!--end::Input-->
									Belum
								</label>
							</div>
						</div>
						
					</form>
					<!--end::Form-->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-bs-dismiss="modal" id="btn_close">Close</button>
					<button type="button" id="btn_submit" class="btn btn-lg btn-primary">
						<span class="indicator-label">Submit</span>
						<span class="indicator-progress">Please wait...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_notes">
		<div class="modal-dialog" style="max-width: 700px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title-notes">Tambah Notes</h5>

					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
						<img src="assets/media/icons/stockholm/Navigation/Close.svg"/>
					</div>
					<!--end::Close-->
				</div>

				<div class="modal-body">
					<!--begin::Form-->
					<form enctype="multipart/form-data" class="form w-100" novalidate="novalidate" id="form_notes">

						@method("POST")
						@csrf
						<input class="d-none" type="text" name="notes_ln_id" id="notes_ln_id" disabled="disabled" />
						<div class="fv-row mb-7">
							<label class="form-label fw-bolder text-dark fs-6">Notes</label>
							<textarea class="form-control form-control-lg form-control-solid" placeholder="" name="notes" autocomplete="off" id="notes" maxlength="200"></textarea>
						</div>
						
					</form>
					<!--end::Form-->
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-bs-dismiss="modal" id="btn_close_notes">Close</button>
					<button type="button" id="btn_submit_notes" class="btn btn-lg btn-primary">
						<span class="indicator-label">Submit</span>
						<span class="indicator-progress">Please wait...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
				</div>
			</div>
		</div>
	</div>

	
@endsection

@section('javascript')


	{{-- <script src="assets/js/area/general.js"></script> --}}

	<!-- leaflet js  -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>

	<script type="text/javascript">

		var user_id = '{{ Session::get('user_id') }}';
		var email = '{{ Session::get('email') }}';
		var privilege = '{{ implode(",", Session::get('privilege')) }}';
		var arr_privilege = privilege.split(',');
		var priv_perizinan_ln_update = arr_privilege.includes('perizinan_ln_setup_update');
		var priv_perizinan_ln_delete = arr_privilege.includes('perizinan_ln_setup_delete');
		var priv_notes_ln_update = arr_privilege.includes('notes_ln_setup_update');
		var priv_notes_ln_delete = arr_privilege.includes('notes_ln_setup_delete');
		let map;

		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success',
				cancelButton: 'btn btn-danger'
			},
			buttonsStyling: false
		});	
  
		var table = $('#table_data').DataTable({
							"language": {
							"lengthMenu": "Show _MENU_",
						},
						"dom":
							"<'row'" +
							"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
							"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
							">" +

							"<'table-responsive'tr>" +

							"<'row'" +
							"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
							"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
							">"
						});

		var table_notes = $('#table_notes').DataTable({
							"language": {
							"lengthMenu": "Show _MENU_",
						},
						"dom":
							"<'table-responsive'tr>" +

							"<'row'" +
							"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
							"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
							">"
						});

		
		function initSelectKeperluan() {

			var select = $('#select_keperluan');

			$.ajax({
				dataType: 'JSON',
				type: 'GET',
				url: '/keperluan/all',
				success: function (data) {

					$.each(data, function (index, item) {
						select.append($('<option>', { 
							value: item.id,
							text : item.nama 
						}));
					});
				}
			});
		}   

		function initTable()
		{
			table.destroy();

			table = $('#table_data').DataTable({
							"language": {
							"lengthMenu": "Show _MENU_",
						},
						"dom":
							"<'row'" +
							"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
							"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
							">" +

							"<'table-responsive'tr>" +

							"<'row'" +
							"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
							"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
							">"
						});

			var dateNow = '{{ now() }}';

			$.ajax({
				dataType: 'JSON',
				type: 'GET',
				url: '/perizinan_ln/all',
				success: function (data) {

					console.log(data);

					//data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));
					table.clear().draw();

					for (var i = 0; i < data.length; i++) {

						var id				= data[i].id;
						var nama			= data[i].nama;
                        var keperluan_id    = data[i].keperluan_id;
	                  	var keperluan_nama  = data[i].keperluan_nama;
						var syarat			= data[i].syarat;
						var disposisi		= data[i].disposisi;
						var proses			= data[i].proses;
						var selesai			= data[i].selesai;
						var created_at		= data[i].created_at;
                        var created_at  	= new Date(created_at);
                        var created_at  	= created_at.toLocaleTimeString() + '<br>' + created_at.toISOString().substring(0, 10);

                        var syarat_color = '';
                        if (syarat == 'sudah') syarat_color = 'class="text-success"';
                        else syarat_color = 'class="text-danger"';

                        var disposisi_color = '';
                        if (disposisi == 'sudah') disposisi_color = 'class="text-success"';
                        else disposisi_color = 'class="text-danger"';

                        var proses_color = '';
                        if (proses == 'sudah') proses_color = 'class="text-success"';
                        else proses_color = 'class="text-danger"';

                        var selesai_color = '';
                        if (selesai == 'sudah') selesai_color = 'class="text-success"';
                        else selesai_color = 'class="text-danger"';

						var element =
							//'<td>'+ (i + 1) +'</td>' +
							'<td data-id="'+id+'" class="d-none"></td>' +
							'<td data-nama="'+nama+'">'+nama+'</td>' +
							'<td data-keperluan_id="'+keperluan_id+'">'+keperluan_nama+'</td>' +
							'<td data-syarat="'+syarat+'" '+syarat_color+'>'+syarat+'</td>' +
							'<td data-disposisi="'+disposisi+'" '+disposisi_color+'>'+disposisi+'</td>' +
							'<td data-proses="'+proses+'" '+proses_color+'>'+proses+'</td>' +
							'<td data-selesai="'+selesai+'" '+selesai_color+'>'+selesai+'</td>' +
							'<td data-created_at="'+created_at+'">'+created_at+'</td>';

						element += '<td>';

						if (priv_perizinan_ln_update) {

							element+= '<a class="btn btn-icon btn-success me-2" data-bs-toggle="modal" data-bs-target="#modal_data" onClick="updateClick(this)"><i class="bi bi-pencil-square fs-4"></i></a>';
						}

						if (priv_perizinan_ln_delete) {
							
							element+= '<a class="btn btn-icon btn-danger" onClick="deleteClick(this)"><i class="bi bi-trash fs-4"></i></a>';
						}
						
						if (!priv_perizinan_ln_update && !priv_perizinan_ln_delete) {

							element+= '<p class="text-gray-600 fst-italic fs-8">You don&apos;t have any privileges</p>';
						}

						element += '</td>';

						var jRow = $('<tr>').append(element);

						table.row.add(jRow).draw();
					}
				}
			});
		}

		function initTableNotes()
		{
			table_notes.destroy();

			table_notes = $('#table_notes').DataTable({
							"language": {
							"lengthMenu": "Show _MENU_",
						},
						"dom":
							"<'table-responsive'tr>" +

							"<'row'" +
							"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
							"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
							">"
						});

			var dateNow = '{{ now() }}';

			$.ajax({
				dataType: 'JSON',
				type: 'GET',
				url: '/notes_ln/all',
				success: function (data) {

					console.log(data);

					//data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));
					table_notes.clear().draw();

					for (var i = 0; i < data.length; i++) {

						var id				= data[i].id;
						var notes			= data[i].notes;
						var created_at		= data[i].created_at;
                        var created_at  	= new Date(created_at);
                        var created_at  	= created_at.toLocaleTimeString() + '<br>' + created_at.toISOString().substring(0, 10);

						var element =
							//'<td>'+ (i + 1) +'</td>' +
							'<td data-id="'+id+'" class="d-none"></td>' +
							'<td data-created_at="'+created_at+'">'+created_at+'</td>' +
							'<td data-notes="'+notes+'" class="fst-italic">'+notes+'</td>';

						element += '<td>';

						if (priv_notes_ln_update) {

							element+= '<a class="btn btn-icon btn-success me-2" data-bs-toggle="modal" data-bs-target="#modal_notes" onClick="updateClickNotes(this)"><i class="bi bi-pencil-square fs-4"></i></a>';
						}

						if (priv_notes_ln_delete) {
							
							element+= '<a class="btn btn-icon btn-danger" onClick="deleteClickNotes(this)"><i class="bi bi-trash fs-4"></i></a>';
						}
						
						if (!priv_notes_ln_update && !priv_notes_ln_delete) {

							element+= '<p class="text-gray-600 fst-italic fs-8">You don&apos;t have any privileges</p>';
						}

						element += '</td>';

						var jRow = $('<tr>').append(element);

						table_notes.row.add(jRow).draw();
					}
				}
			});
		}

		function updateClick(btn){
			//console.log(btn.closest('tr'));
			
			var row = $(btn.closest('tr'));
			
			var cells = row.find('td');

			$('.modal-title').text('Ubah Data Perizinan').change();

			$.each(cells, function() {  

				if($(this).data('id')) $('#perizinan_ln_id').val($(this).data('id'));
				if($(this).data('nama')) $('#nama').val($(this).data('nama'));

				if($(this).data('keperluan_id')) $('#select_keperluan').val($(this).data('keperluan_id')).change();
				
				if($(this).data('syarat') == 'sudah'){
					$("#syarat_sudah").attr('checked', true);
					$(".syarat_sudah").addClass('active');
					$(".syarat_belum").removeClass('active');
				}

				if($(this).data('syarat') == 'belum'){
					$("#syarat_belum").attr('checked', true);
					$(".syarat_belum").addClass('active');
					$(".syarat_sudah").removeClass('active');
				}


				if($(this).data('disposisi') == 'sudah'){
					$("#disposisi_sudah").attr('checked', true);
					$(".disposisi_sudah").addClass('active');
					$(".disposisi_belum").removeClass('active');
				}

				if($(this).data('disposisi') == 'belum'){
					$("#disposisi_belum").attr('checked', true);
					$(".disposisi_belum").addClass('active');
					$(".disposisi_sudah").removeClass('active');
				}


				if($(this).data('proses') == 'sudah'){
					$("#proses_sudah").attr('checked', true);
					$(".proses_sudah").addClass('active');
					$(".proses_belum").removeClass('active');
				}

				if($(this).data('proses') == 'belum'){
					$("#proses_belum").attr('checked', true);
					$(".proses_belum").addClass('active');
					$(".proses_sudah").removeClass('active');
				}


				if($(this).data('selesai') == 'sudah'){
					$("#selesai_sudah").attr('checked', true);
					$(".selesai_sudah").addClass('active');
					$(".selesai_belum").removeClass('active');
				}

				if($(this).data('selesai') == 'belum'){
					$("#selesai_belum").attr('checked', true);
					$(".selesai_belum").addClass('active');
					$(".selesai_sudah").removeClass('active');
				}
			});
		}

		function deleteClick(btn){
			//console.log(btn.closest('tr'));
			
			var row = $(btn.closest('tr'));
			
			var cells = row.find('td');

			var id = $(cells).data('id');

			Swal.fire({
				text: "Are you sure to delete this data?",
				icon: "warning",
				buttonsStyling: false,
				confirmButtonText: "Yes, sure!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			}).then(function (result) {
				if (result.isConfirmed) { 

					var formData = new FormData();
					formData.set('_method', 'DELETE');
					formData.set('_token', '{{ csrf_token() }}');

					$.ajax({
						url: '/perizinan_ln/'+id,
						type:'POST',
						cache: false,
						contentType: false,
						processData: false,
						data: formData,
						success: function(data) {

							// console.log(data);

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

										initTable();
										// window.location.replace("/area");
									}
								});
							}
							else{

								swalWithBootstrapButtons.fire(
									'Gagal!',
									data.message,
									'error'
								)
							}
							
						}
					});
				}
			});
		}

		function updateClickNotes(btn){
			//console.log(btn.closest('tr'));
			
			var row = $(btn.closest('tr'));
			
			var cells = row.find('td');

			$('.modal-title-notes').text('Ubah Notes').change();

			$.each(cells, function() {  

				if($(this).data('id')) $('#notes_ln_id').val($(this).data('id'));
				if($(this).data('notes')) $('#notes').val($(this).data('notes'));
			});
		}

		function deleteClickNotes(btn){
			//console.log(btn.closest('tr'));
			
			var row = $(btn.closest('tr'));
			
			var cells = row.find('td');

			var id = $(cells).data('id');

			Swal.fire({
				text: "Are you sure to delete this data?",
				icon: "warning",
				buttonsStyling: false,
				confirmButtonText: "Yes, sure!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			}).then(function (result) {
				if (result.isConfirmed) { 

					var formData = new FormData();
					formData.set('_method', 'DELETE');
					formData.set('_token', '{{ csrf_token() }}');

					$.ajax({
						url: '/notes_ln/'+id,
						type:'POST',
						cache: false,
						contentType: false,
						processData: false,
						data: formData,
						success: function(data) {

							// console.log(data);

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

										initTableNotes();
										// window.location.replace("/area");
									}
								});
							}
							else{

								swalWithBootstrapButtons.fire(
									'Gagal!',
									data.message,
									'error'
								)
							}
							
						}
					});
				}
			});
		}

		$(document).ready(function() {

			initTable();
			initTableNotes();
			initSelectKeperluan();
			//initMap();

			$(".select2-selection__rendered").css("color", "black");


			$('#btn_add').click(function() {
				
				$('.modal-title').text('Tambah Data Perizinan').change();

				$('#form_data').trigger("reset");

				$("#syarat_belum").attr('checked', true);
				$(".syarat_sudah").removeClass('active');
				$(".syarat_belum").removeClass('active');
				$(".syarat_belum").addClass('active');

				$("#disposisi_belum").attr('checked', true);
				$(".disposisi_sudah").removeClass('active');
				$(".disposisi_belum").removeClass('active');
				$(".disposisi_belum").addClass('active');

				$("#proses_belum").attr('checked', true);
				$(".proses_sudah").removeClass('active');
				$(".proses_belum").removeClass('active');
				$(".proses_belum").addClass('active');

				$("#selesai_belum").attr('checked', true);
				$(".selesai_sudah").removeClass('active');
				$(".selesai_belum").removeClass('active');
				$(".selesai_belum").addClass('active');

				$("#select_keperluan").val("").change();
			});
		});

		var KTGeneral = function() {
			// Elements
			var form;
			var submitButton;
			var validator;
			var passwordMeter;
			var modalHeader;

			// Handle form
			var handleForm  = function(e) {
				// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
				validator = FormValidation.formValidation(
					form,
					{
						fields: {
							'nama': {
								validators: {
									notEmpty: {
										message: 'Nama wajib diisi'
									}
								}
							}
						},
						plugins: {
							trigger: new FormValidation.plugins.Trigger({
								event: {
									password: false
								}  
							}),
							bootstrap: new FormValidation.plugins.Bootstrap5({
								rowSelector: '.fv-row',
								eleInvalidClass: '',
								eleValidClass: ''
							})
						}
					}
				);

				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				});

				// Handle form submit
				submitButton.addEventListener('click', function (e) {
					e.preventDefault();

					validator.validate().then(function(status) {
						if (status == 'Valid') {
							// Show loading indication
							submitButton.setAttribute('data-kt-indicator', 'on');

							// Disable button to avoid multiple click 
							submitButton.disabled = true;

							// Hide loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							var formData = new FormData($('#form_data')[0]);
							var keperluan_id = $('#select_keperluan').val();
							var perizinan_ln_id = $('#perizinan_ln_id').val();

							formData.append('keperluan_id', keperluan_id);

							for(var pair of formData.entries()) {
								//console.log(pair[0]+ ', '+ pair[1]);
							}

							modalHeader = $('.modal-title').text();

							if (modalHeader == 'Tambah Data Perizinan') {

								$.ajax({
									url: '/perizinan_ln',
									type:'POST',
									cache: false,
									contentType: false,
									processData: false,
									data: formData,
									success: function(data) {
										//console.log(data.result);

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

													initTable();
													$('#btn_close').click(); 
													// window.location.replace("/area");
												}
											});
										}
										else{

											console.log(data);

											form.reset();  // reset form                    

											swalWithBootstrapButtons.fire(
												'Gagal!',
												data.message,
												'error'
											)
										}
										
									}
								});
							}
							else{

								formData.set('_method', 'PATCH');

								$.ajax({
									url: '/perizinan_ln/'+perizinan_ln_id,
									type:'POST',
									cache: false,
									contentType: false,
									processData: false,
									data: formData,
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

													initTable();
													$('#btn_close').click(); 
													// window.location.replace("/area");
												}
											});
										}
										else{

											// form.reset();  // reset form                    

											swalWithBootstrapButtons.fire(
												'Gagal!',
												data.message,
												'error'
											)
										}
										
									}
								});
							}                         
						} else {
							// Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
							Swal.fire({
								text: "Sorry, looks like there are some errors detected, please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							});
						}
					});
				});

			}

			// Public functions
			return {
				// Initialization
				init: function() {
					// Elements
					form = document.querySelector('#form_data');
					submitButton = document.querySelector('#btn_submit');
					passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

					handleForm ();
				}
			};
		}();

		var KTGeneralNotes = function() {
			// Elements
			var form;
			var submitButton;
			var validator;
			var passwordMeter;
			var modalHeader;

			// Handle form
			var handleForm  = function(e) {
				// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
				validator = FormValidation.formValidation(
					form,
					{
						fields: {
							'notes': {
								validators: {
									notEmpty: {
										message: 'Notes wajib diisi'
									}
								}
							}
						},
						plugins: {
							trigger: new FormValidation.plugins.Trigger({
								event: {
									password: false
								}  
							}),
							bootstrap: new FormValidation.plugins.Bootstrap5({
								rowSelector: '.fv-row',
								eleInvalidClass: '',
								eleValidClass: ''
							})
						}
					}
				);

				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				});

				// Handle form submit
				submitButton.addEventListener('click', function (e) {
					e.preventDefault();

					validator.validate().then(function(status) {
						if (status == 'Valid') {
							// Show loading indication
							submitButton.setAttribute('data-kt-indicator', 'on');

							// Disable button to avoid multiple click 
							submitButton.disabled = true;

							// Hide loading indication
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;

							var formData = new FormData($('#form_notes')[0]);
							var notes_ln_id = $('#notes_ln_id').val();

							for(var pair of formData.entries()) {
								//console.log(pair[0]+ ', '+ pair[1]);
							}

							modalHeader = $('.modal-title-notes').text();

							if (modalHeader == 'Tambah Notes') {

								$.ajax({
									url: '/notes_ln',
									type:'POST',
									cache: false,
									contentType: false,
									processData: false,
									data: formData,
									success: function(data) {
										//console.log(data.result);

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

													initTableNotes();
													$('#btn_close_notes').click(); 
													// window.location.replace("/area");
												}
											});
										}
										else{

											console.log(data);

											form.reset();  // reset form                    

											swalWithBootstrapButtons.fire(
												'Gagal!',
												data.message,
												'error'
											)
										}
										
									}
								});
							}
							else{

								formData.set('_method', 'PATCH');

								$.ajax({
									url: '/notes_ln/'+notes_ln_id,
									type:'POST',
									cache: false,
									contentType: false,
									processData: false,
									data: formData,
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

													initTableNotes();
													$('#btn_close_notes').click(); 
													// window.location.replace("/area");
												}
											});
										}
										else{

											// form.reset();  // reset form                    

											swalWithBootstrapButtons.fire(
												'Gagal!',
												data.message,
												'error'
											)
										}
										
									}
								});
							}                         
						} else {
							// Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
							Swal.fire({
								text: "Sorry, looks like there are some errors detected, please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							});
						}
					});
				});

			}

			// Public functions
			return {
				// Initialization
				init: function() {
					// Elements
					form = document.querySelector('#form_notes');
					submitButton = document.querySelector('#btn_submit_notes');
					passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

					handleForm ();
				}
			};
		}();

		// On document ready
		KTUtil.onDOMContentLoaded(function() {
			KTGeneral.init();
			KTGeneralNotes.init();
		});
		
	</script>

@endsection

