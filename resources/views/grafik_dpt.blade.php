@extends('layout')

@section('title', 'Dashboard')
 
@section('content')
	
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Toolbar-->
		<div class="toolbar" id="kt_toolbar">
			<!--begin::Container-->
			<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
				<!--begin::Page title-->
				<div class="d-flex align-items-center me-3">
					<!--begin::Title-->
					<h1 class="d-flex align-items-center fw-bolder my-1 fs-3">Dashboard</h1>
					<!--end::Title--> 
					<!--begin::Separator-->
					<span class="h-20px border-gray-200 border-start mx-4"></span>
					<!--end::Separator-->	
				</div>
				<!--end::Page title-->

				<!--begin::Actions-->
				<div class="d-flex align-items-center py-1">
					<!--begin::Button-->
					<!-- <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_area" id="btn_area_add">Create</a> -->
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
						<div class="row card-px py-10">
							<div class="row mb-5">
								<div class="col-2 fv-row mb-7">
                    				<label class="form-label fw-bolder text-dark fs-6">Provinsi</label>
									<select id="select_provinsi" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                                	<option value="all" selected>Semua</option>
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-sel-kabkota">
                    				<label class="form-label fw-bolder text-dark fs-6">Kab/Kota</label>
									<select id="select_kabkota" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-sel-kecamatan">
                    				<label class="form-label fw-bolder text-dark fs-6">Kecamatan</label>
									<select id="select_kecamatan" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-sel-kelurahan">
                    				<label class="form-label fw-bolder text-dark fs-6">Kelurahan</label>
									<select id="select_kelurahan" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-sel-tps">
                    				<label class="form-label fw-bolder text-dark fs-6">TPS</label>
									<select id="select_tps" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                            	</select>	
								</div>
								<div class="col-2 fv-row mt-9">
                    				<a id="btn_search" class="btn btn-icon btn-primary"><i class="bi bi-search fs-4"></i></a>
                    				<a id="btn_reset" class="btn btn-icon btn-danger"><i class="bi bi-arrow-repeat fs-2"></i></a>
								</div>
							</div>
							
							<div id="div_data" class="row">
								<div class="col-6">
									<div id="div_chart_pie"></div>
								</div>
								<div class="col-3 fs-4">
									<ul class="list-group list-group-flush">
									  <li class="list-group-item d-flex justify-content-between align-items-start li-provinsi">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Provinsi</div>
									      <span class="tx-provinsi"></span>
									    </div>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-start li-kabkota">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Kab/Kota</div>
									      <span class="tx-kabkota"></span>
									    </div>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-start li-kecamatan">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Kecamatan</div>
									      <span class="tx-kecamatan"></span>
									    </div>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-start li-kelurahan">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Kelurahan</div>
									      <span class="tx-kelurahan"></span>
									    </div>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-start li-tps">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">TPS</div>
									      <span class="tx-tps"></span>
									    </div>
									  </li>
									</ul>
								</div>
								<div class="col-3 fs-4">
									<ul class="list-group list-group-flush">
									  <li class="list-group-item d-flex justify-content-between align-items-start">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Total</div>
									      <span id="tx_total" class="tx-total">0</span>
									    </div>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-start">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Laki-laki</div>
									      <span id="tx_laki" class="tx-laki">0</span>
									    </div>
									  </li>
									  <li class="list-group-item d-flex justify-content-between align-items-start">
									    <div class="ms-2 me-auto">
									      <div class="fw-bolder">Perempuan</div>
									      <span id="tx_perempuan" class="tx-perempuan">0</span>
									    </div>
									  </li>
									</ul>
								</div>
							</div>
							<div id="div_loading" class="container my-20 text-center">
								<div>Loading...</div>
								<div class="spinner-grow text-primary" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-secondary" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-success" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-danger" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-warning" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-info" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-light" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
								<div class="spinner-grow text-dark" role="status">
								  <span class="visually-hidden">Loading...</span>
								</div>
							</div>
							<!-- <div id="map"></div> -->
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

	
@endsection

@section('javascript')


	{{-- <script src="assets/js/area/general.js"></script> --}}

	<script type="text/javascript">

		var user_id = '{{ Session::get('user_id') }}';
		var email = '{{ Session::get('email') }}';
		var privilege = '{{ implode(",", Session::get('privilege')) }}';
		var arr_privilege = privilege.split(',');
		var priv_area_update = arr_privilege.includes('area_setup_update');
		var priv_area_delete = arr_privilege.includes('area_setup_delete');

		// var map = L.map('map').setView([51.505, -0.09], 13);

		// Create root pie chart
		var rootPie = am5.Root.new("div_chart_pie");

		rootPie.setThemes([
			am5themes_Animated.new(rootPie)
		]);

		var chartPie = rootPie.container.children.push(
			am5percent.PieChart.new(rootPie, {})
		);

		// Create series
		var seriesPie = chartPie.series.push(
			am5percent.PieSeries.new(rootPie, {
				name: "Series",
				valueField: "value",
				categoryField: "category",
				alignLabels: true
			})
		);
		
		seriesPie.get("colors").set("colors", [
		  	am5.color("#0984e3"),
		  	am5.color("#fd79a8")
		]);

		var legendPie = chartPie.children.push(am5.Legend.new(rootPie, {
			              	// nameField: "name",
			              	// fillField: "color",
			               //  strokeField: "color",
			              	centerX: am5.percent(50),
			              	x: am5.percent(50),
			              	y: am5.percent(2),
			              	layout: rootPie.horizontalLayout
			            }));

		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success',
				cancelButton: 'btn btn-danger'
			},
			buttonsStyling: false
		});	

		function initSelectProvinsi() {

            var el_select = $('#select_provinsi');

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/grafik_dpt/option_provinsi/all',
                success: function (data) {

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            });
        }

        function initSelectKabKota() {

            var el_select = $('#select_kabkota');

            var val_selected = $('#select_provinsi').val();

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/grafik_dpt/option_kabkota/'+val_selected,
                success: function (data) {

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            });
        }

        function initSelectKecamatan() {

            var el_select = $('#select_kecamatan');

            var val_selected = $('#select_kabkota').val();

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/grafik_dpt/option_kecamatan/'+val_selected,
                success: function (data) {

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            });
        } 

        function initSelectKelurahan() {

            var el_select = $('#select_kelurahan');

            var val_selected = $('#select_kecamatan').val();

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/grafik_dpt/option_kelurahan/'+val_selected,
                success: function (data) {

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            });
        }

        function initSelectTPS() {

            var el_select = $('#select_tps');

            var val_selected = $('#select_kelurahan').val();

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/grafik_dpt/option_tps/'+val_selected,
                success: function (data) {

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            });
        }  

		function initCharts() {

			var provinsi_name 	= $('#select_provinsi option:selected').text();
			var kabkota_name 	= $('#select_kabkota option:selected').text();
			var kecamatan_name 	= $('#select_kecamatan option:selected').text();
			var kelurahan_name 	= $('#select_kelurahan option:selected').text();
			var tps_name 		= $('#select_tps option:selected').text();

			if (
				provinsi_name.length == 0 &&
				kabkota_name.length == 0 &&
				kecamatan_name.length == 0 &&
				kelurahan_name.length == 0 &&
				tps_name.length == 0
			) {
				swalWithBootstrapButtons.fire(
				    'Perhatian!',
				    'Harap pilih data terlebih dahulu',
				    'error'
				);
			}
			else {

				$.ajax({
					headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
				    url: '/grafik_dpt/data_gender',
				    type:'POST',
				    cache: false,
				    data: {
				    	provinsi_name : provinsi_name,
				    	kabkota_name : kabkota_name,
				    	kecamatan_name : kecamatan_name,
				    	kelurahan_name : kelurahan_name,
				    	tps_name : tps_name
				    },
				    beforeSend: function() {
			            $("#div_data").hide();
			            $("#div_loading").show();
			        },
				    success: function(data) {

				        //console.log(data);

				        $("#div_loading").hide();
				        $("#div_data").show();

				        if (data.result == 'success') {

				            var datachartpie = [];
							datachartpie.push({category : 'Laki-laki', value : data.data_man});
							datachartpie.push({category : 'Perempuan', value : data.data_woman});

				            seriesPie.data.setAll(datachartpie);

				            seriesPie.labels.template.setAll({
				            	fontSize: 12,
				            	text: "{category} ({value})",
				            	textType: "adjusted",
				            	radius: 10
				            });

				            seriesPie.ticks.template.setAll({
				              	location: 0.8
				            });

				            seriesPie.animate({
				              key: "startAngle",
				              from: 240,
				              to: -90,
				              duration: 1500,
				              easing: am5.ease.out(am5.ease.cubic)
				            });

				            legendPie.data.setAll(seriesPie.dataItems);
				            // legendPie.data.setAll([{
				            //   name: "Perempuan",
				            //   color: am5.color("#fd79a8")
				            // },{
				            //   name: "Laki-laki",
				            //   color: am5.color("#0984e3")
				            // }]);
			  	

				            // $(".tx-total").text(data.data_total);
				            // $(".tx-laki").text(data.data_man);
				            // $(".tx-perempuan").text(data.data_woman);

				            const countUpTotal 		= new countUp.CountUp('tx_total', data.data_total);
				            const countUpLaki 		= new countUp.CountUp('tx_laki', data.data_man);
				            const countUpPerempuan 	= new countUp.CountUp('tx_perempuan', data.data_woman);

				            if (!countUpTotal.error && !countUpLaki.error && !countUpPerempuan.error) {
				              countUpTotal.start();
				              countUpLaki.start();
				              countUpPerempuan.start();
				            } else {
				              console.error(countUpTotal.error);
				              console.error(countUpLaki.error);
				              console.error(countUpPerempuan.error);
				            }
				        }
				        else{

				            
				        }
				        
				    }
				});
			}
		}

		$(document).ready(function() {

			// initMap();
			// initMapMarkers('all');
			initSelectProvinsi();

			$("#div_loading").hide();
			$('#div_data').hide();		

			$('.div-sel-kabkota').hide();
			$('.div-sel-kecamatan').hide();
			$('.div-sel-kelurahan').hide();
			$('.div-sel-tps').hide();

			$(".li-kabkota").addClass('d-none');
			$('.li-kecamatan').addClass('d-none');
			$('.li-kelurahan').addClass('d-none');
			$('.li-tps').addClass('d-none');

			// initCharts();
			$(".tx-provinsi").text('Semua');

			$('#btn_reset').hide();

			$('#btn_reset').click(function(){

				$('#select_provinsi').val('all').trigger('select2:select');
				$('.select2-selection__rendered').text('Semua');

				$('#div_data').hide();

				$(this).hide();

				$('#select_kabkota option:selected').text('');
				$('#select_kecamatan option:selected').text('');
				$('#select_kelurahan option:selected').text('');
				$('#select_tps option:selected').text('');
			});

			$('#btn_search').click(function(){

				initCharts();
			});		

			$('#select_provinsi').on('select2:select', function (e) {
			  	
				// initCharts();

				$('#div_data').hide();
				
				$(".tx-provinsi").text($(this).find('option:selected').text());				

				$("#select_kabkota").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua");
	 
				$("#select_kabkota").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectKabKota();

					$('.div-sel-kabkota').show();
					$('#btn_reset').show();	
				}
				else{

					$('#btn_reset').hide();	

					$('.div-sel-kabkota').hide();
					$('.div-sel-kecamatan').hide();
					$('.div-sel-kelurahan').hide();
					$('.div-sel-tps').hide();

					$(".li-kabkota").addClass('d-none');
					$('.li-kecamatan').addClass('d-none');
					$('.li-kelurahan').addClass('d-none');
					$('.li-tps').addClass('d-none');

					$('#select_kabkota option:selected').text('');
					$('#select_kecamatan option:selected').text('');
					$('#select_kelurahan option:selected').text('');
					$('#select_tps option:selected').text('');
				}
			});

			$('#select_kabkota').on('select2:select', function (e) {
			  	
			  	// initCharts();

			  	$('#div_data').hide();

			  	$(".li-kabkota").removeClass('d-none');

			  	$(".tx-kabkota").text($(this).find('option:selected').text());	

				$("#select_kecamatan").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_kecamatan").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectKecamatan();

					$('.div-sel-kecamatan').show();
				}
				else{

					$('.div-sel-kecamatan').hide();
					$('.div-sel-kelurahan').hide();
					$('.div-sel-tps').hide();

					$('.li-kecamatan').addClass('d-none');
					$('.li-kelurahan').addClass('d-none');
					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_kecamatan').on('select2:select', function (e) {
			  	
				// initCharts();

				$('#div_data').hide();

			  	$(".li-kecamatan").removeClass('d-none');

				$(".tx-kecamatan").text($(this).find('option:selected').text());	

				$("#select_kelurahan").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_kelurahan").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectKelurahan();

					$('.div-sel-kelurahan').show();
				}
				else{

					$('.div-sel-kelurahan').hide();
					$('.div-sel-tps').hide();

					$('.li-kelurahan').addClass('d-none');
					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_kelurahan').on('select2:select', function (e) {
			  	
				// initCharts();

				$('#div_data').hide();

			  	$(".li-kelurahan").removeClass('d-none');


				$(".tx-kelurahan").text($(this).find('option:selected').text());	

				$("#select_tps").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_tps").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectTPS();

					$('.div-sel-tps').show();
				}
				else{

					$('.div-sel-tps').hide();

					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_tps').on('select2:select', function (e) {
			  	
				// initCharts();

				$('#div_data').hide();

			  	$(".li-tps").removeClass('d-none');


				$(".tx-tps").text($(this).find('option:selected').text());	
			});
		});
		
	</script>

@endsection