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
								<div class="col-2 fv-row mb-7 div-kabkota">
                    				<label class="form-label fw-bolder text-dark fs-6">Kab/Kota</label>
									<select id="select_kabkota" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                                	<option value="all" selected>Semua</option>
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-kecamatan">
                    				<label class="form-label fw-bolder text-dark fs-6">Kecamatan</label>
									<select id="select_kecamatan" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                                	<option value="all" selected>Semua</option>
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-kelurahan">
                    				<label class="form-label fw-bolder text-dark fs-6">Kelurahan</label>
									<select id="select_kelurahan" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                                	<option value="all" selected>Semua</option>
	                            	</select>	
								</div>
								<div class="col-2 fv-row mb-7 div-tps">
                    				<label class="form-label fw-bolder text-dark fs-6">TPS</label>
									<select id="select_tps" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option">
	                                	<option value="all" selected>Semua</option>
	                            	</select>	
								</div>
								<div class="col-2 fv-row mt-10">
                    				<a class="btn btn-sm btn-gold fs-5" id="btn_reset">Reset Filter</a>
								</div>
							</div>
							
							<div class="col-6">
								<div id="div_chart_pie"></div>
							</div>
							<div class="col-3 fs-4 list-text">
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
								      <span class="tx-total"></span>
								    </div>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-start">
								    <div class="ms-2 me-auto">
								      <div class="fw-bolder">Laki-laki</div>
								      <span class="tx-laki"></span>
								    </div>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-start">
								    <div class="ms-2 me-auto">
								      <div class="fw-bolder">Perempuan</div>
								      <span class="tx-perempuan"></span>
								    </div>
								  </li>
								</ul>
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

		var legend = chartPie.children.push(am5.Legend.new(rootPie, {
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

		function initCharts(level_select) {

			var provinsi_name 	= $('#select_provinsi option:selected').text();
			var kabkota_name 	= $('#select_kabkota option:selected').text();
			var kecamatan_name 	= $('#select_kecamatan option:selected').text();
			var kelurahan_name 	= $('#select_kelurahan option:selected').text();
			var tps_name 		= $('#select_tps option:selected').text();

			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
			    url: '/grafik_dpt/data_gender',
			    type:'POST',
			    cache: false,
			    data: {
			    	level_select : level_select, 
			    	provinsi_name : provinsi_name,
			    	kabkota_name : kabkota_name,
			    	kecamatan_name : kecamatan_name,
			    	kelurahan_name : kelurahan_name,
			    	tps_name : tps_name
			    },
			    success: function(data) {

			        //console.log(data);

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

			            legend.data.setAll(seriesPie.dataItems);
			            // legend.data.setAll([{
			            //   name: "Perempuan",
			            //   color: am5.color("#fd79a8")
			            // },{
			            //   name: "Laki-laki",
			            //   color: am5.color("#0984e3")
			            // }]);
		  	

			            $(".tx-total").text(data.data_total);
			            $(".tx-laki").text(data.data_man);
			            $(".tx-perempuan").text(data.data_woman);
			        }
			        else{

			            
			        }
			        
			    }
			});

			
		}

		function initMap() {
			// set lokasi latitude dan longitude, lokasinya kota palembang 
			map.remove();

			map = L.map('map').setView([-2.9547949, 104.6929233], 5);   
			//setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token      
			L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=sk.eyJ1IjoiYXVmYXJzeWFoIiwiYSI6ImNsMW13NXlxeDBvdDAzcG82eDQ2ejVoMW4ifQ.sOJQY5T3FSYdWAc26v_BYg', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				maxZoom: 18,
				id: 'mapbox/streets-v11',
				tileSize: 512,
				zoomOffset: -1,
				accessToken: 'sk.eyJ1IjoiYXVmYXJzeWFoIiwiYSI6ImNsMW13NXlxeDBvdDAzcG82eDQ2ejVoMW4ifQ.sOJQY5T3FSYdWAc26v_BYg'
			}).addTo(map);
		}

		function initMapMarkers(type){


			$(".leaflet-marker-icon").remove();
			$(".leaflet-marker-shadow").remove();
			$(".leaflet-popup").remove();

			$.ajax({
				dataType: 'JSON',
				type: 'GET',
				url: '/institution_sensors/'+ type,
				success: function (data) {

					//console.log(data);
					$('#total_markers').text(data.length);

					for (var i = 0; i < data.length; i++) {

						var id          = data[i].id;
						var name        = data[i].institution_name;
						var coordinate  = data[i].coordinate;
						var description = data[i].description;
						var serial_number = data[i].serial_number;
						var expired_date = data[i].expired_date;

						coordinate = coordinate.split(',');
						long = parseFloat(coordinate[0]);
						lat  = parseFloat(coordinate[1]);

						var arr_coordinate = [];

						arr_coordinate.push(long);
						arr_coordinate.push(lat);

						//console.log(arr_coordinate);
						L.marker(arr_coordinate).bindTooltip(name +'<br>Serial Number : '+serial_number+'<br>Expired date : '+expired_date).addTo(map);
						
					}
				}
			});
		}

		$(document).ready(function() {

			// initMap();
			// initMapMarkers('all');
			initSelectProvinsi();

			$('.div-kabkota').hide();
			$('.div-kecamatan').hide();
			$('.div-kelurahan').hide();
			$('.div-tps').hide();

			$(".li-kabkota").addClass('d-none');
			$('.li-kecamatan').addClass('d-none');
			$('.li-kelurahan').addClass('d-none');
			$('.li-tps').addClass('d-none');

			initCharts('provinsi', 'all');
			$(".tx-provinsi").text('Semua');

			$('#btn_reset').hide();		

			$('#btn_reset').click(function(){

				$('#select_provinsi').val('all').trigger('select2:select');
				$('.select2-selection__rendered').text('Semua');

				$(this).hide();
			});		

			$('#select_provinsi').on('select2:select', function (e) {
			  	
				initCharts('provinsi');
				
				$(".tx-provinsi").text($(this).find('option:selected').text());				

				$("#select_kabkota").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua");
	 
				$("#select_kabkota").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectKabKota();

					$('.div-kabkota').show();
					$('#btn_reset').show();	
				}
				else{

					$('.div-kabkota').hide();
					$('.div-kecamatan').hide();
					$('.div-kelurahan').hide();
					$('.div-tps').hide();

					$(".li-kabkota").addClass('d-none');
					$('.li-kecamatan').addClass('d-none');
					$('.li-kelurahan').addClass('d-none');
					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_kabkota').on('select2:select', function (e) {
			  	
			  	initCharts('kabkota');
			  	$(".li-kabkota").removeClass('d-none');

			  	$(".tx-kabkota").text($(this).find('option:selected').text());	

				$("#select_kecamatan").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_kecamatan").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectKecamatan();

					$('.div-kecamatan').show();
				}
				else{

					$('.div-kecamatan').hide();
					$('.div-kelurahan').hide();
					$('.div-tps').hide();

					$('.li-kecamatan').addClass('d-none');
					$('.li-kelurahan').addClass('d-none');
					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_kecamatan').on('select2:select', function (e) {
			  	
				initCharts('kecamatan');
			  	$(".li-kecamatan").removeClass('d-none');

				$(".tx-kecamatan").text($(this).find('option:selected').text());	

				$("#select_kelurahan").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_kelurahan").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectKelurahan();

					$('.div-kelurahan').show();
				}
				else{

					$('.div-kelurahan').hide();
					$('.div-tps').hide();

					$('.li-kelurahan').addClass('d-none');
					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_kelurahan').on('select2:select', function (e) {
			  	
				initCharts('kelurahan');
			  	$(".li-kelurahan").removeClass('d-none');


				$(".tx-kelurahan").text($(this).find('option:selected').text());	

				$("#select_tps").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_tps").append($newOption).trigger('change');

				if ($(this).val() != 'all') {

					initSelectTPS();

					$('.div-tps').show();
				}
				else{

					$('.div-tps').hide();

					$('.li-tps').addClass('d-none');
				}
			});

			$('#select_tps').on('select2:select', function (e) {
			  	
				initCharts('tps');
			  	$(".li-tps").removeClass('d-none');


				$(".tx-tps").text($(this).find('option:selected').text());	
			});
		});
		
	</script>

@endsection