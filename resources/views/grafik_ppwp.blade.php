@extends('layout')

@section('title', 'Dashboard')

@section('style')
<style>
	#div_chart_bar {
	  	width: 100%;
	  	height: 500px;
	}

	#div_legend_pie {
	  width: 100%;
	  height: 100px;
	  /*border: 1px dotted #888;*/
	}
</style>

@endsection
 
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
						<div id="div_banner" class="m-5" style="width:1160px;height:200px;background-color: black;"></div>
						<div class="row card-px py-10">
							<div class="row mb-5">
								<div class="col-3 fv-row mb-7">
                    				<label class="form-label fw-bolder text-dark fs-6">Provinsi</label>
									<select id="select_provinsi" class="form-select form-select-lg" data-control="select2" data-placeholder="Pilih Provinsi">
	                            	</select>	
								</div>
								<div class="col-3 fv-row mb-7 div-sel-kabkota">
                    				<label class="form-label fw-bolder text-dark fs-6">Kab/Kota</label>
									<select id="select_kabkota" class="form-select form-select-lg" data-control="select2" data-placeholder="Pilih kab/kota">
	                            	</select>	
								</div>
								<div class="col-2 fv-row mt-9">
                    				<a id="btn_reset" class="btn btn-danger"><i class="bi bi-arrow-repeat fs-"2></i> Reset</a>
								</div>
							</div>
							
							<div class="col-12" id="div_grafik">
								<div id="div_chart_bar"></div>
								<div id="div_chart_pie"></div>
								<div id="div_legend_pie"></div>
							</div>
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

		var rootBar = am5.Root.new("div_chart_bar");

		console.log($('#div_banner').height());
		console.log($('#div_banner').width());

		// Set themes
		rootBar.setThemes([
		  	am5themes_Animated.new(rootBar)
		]);


		// Create chart
		var chartBar = rootBar.container.children.push(am5xy.XYChart.new(rootBar, {
		  	panX: false,
		  	panY: false,
		  	wheelX: "panX",
		  	wheelY: "zoomX",
		  	layout: rootBar.verticalLayout
		}));


		// Add legend
		var legendBar = chartBar.children.push(
		  	am5.Legend.new(rootBar, {
		    	centerX: am5.p50,
		    	x: am5.p50
		  	})
		);

		// Create axes
        var xRenderer = am5xy.AxisRendererX.new(rootBar, { 
        	minGridDistance: 30,
            cellStartLocation: 0.1,
            cellEndLocation: 0.9 });

        xRenderer.labels.template.setAll({
			rotation: -45,
			centerY: am5.p50,
			centerX: am5.p100,
			paddingRight: 15
        });

        var xAxis = chartBar.xAxes.push(am5xy.CategoryAxis.new(rootBar, {
          	categoryField: "nama_kab",
          	renderer: xRenderer,
          	tooltip: am5.Tooltip.new(rootBar, {})
        }));


        var yAxis = chartBar.yAxes.push(am5xy.ValueAxis.new(rootBar, {
          	renderer: am5xy.AxisRendererY.new(rootBar, {})
        }));
        

        // Create root pie chart
		var rootPie = am5.Root.new("div_chart_pie");

		rootPie.setThemes([
			am5themes_Animated.new(rootPie)
		]);

		var chartPie = rootPie.container.children.push(
			am5percent.PieChart.new(rootPie, {
    			layout: rootPie.verticalLayout
  			})
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
		  	am5.color("#8f1d1d"),
		  	am5.color("#FFD700")
		]);

		var rootLegendPie = am5.Root.new("div_legend_pie");

		rootLegendPie.setThemes([
		  am5themes_Animated.new(chartPie)
		]);

		var legendPie = rootLegendPie.container.children.push( 
		  am5.Legend.new(rootLegendPie, {
		    width: am5.percent(100),
		    centerX: am5.percent(50),
		    x: am5.percent(75)
		    //layout: rootLegendPie.grid
		  })
		);

		// var legendPie = chartPie.children.push(am5.Legend.new(rootPie, {
		// 	              	// nameField: "name",
		// 	              	// fillField: "color",
		// 	               //  strokeField: "color",
		// 	              	centerX: am5.percent(50),
		// 	              	x: am5.percent(50),
		// 	              	y: am5.percent(2),
		// 	              	layout: rootPie.horizontalLayout
		// 	            }));


		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success',
				cancelButton: 'btn btn-danger'
			},
			buttonsStyling: false
		});	

		chartBar.get("colors").set("colors", [
			am5.color("#8f1d1d"),
			am5.color("#FFD700"),
			am5.color(0x5aaa95),
			am5.color(0x86a873),
			am5.color(0xbb9f06)
		]);

		function initSelectProvinsi() {

            var el_select = $('#select_provinsi');

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/grafik_ppwp/option_provinsi/all',
                success: function (data) {

    	            var $newOption = $("<option selected='selected' disabled></option>").val("").text("Pilih Provinsi");
    	 
    				$("#select_provinsi").append($newOption).trigger('change');

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.nama_prov,
                            text : item.nama_prov 
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
                url: '/grafik_ppwp/option_kabkota/'+val_selected,
                success: function (data) {

                    $.each(data, function (index, item) {
                        el_select.append($('<option>', { 
                            value: item.nama_kab,
                            text : item.nama_kab 
                        }));
                    });
                }
            });
        }
        
        function makeSeries(name, fieldName, data) {
          
    	

          var series = chartBar.series.push(am5xy.ColumnSeries.new(rootBar, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "nama_kab"
          }));

          series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(50),
            tooltipY: 0
          });


          	xAxis.data.setAll(data);

          	series.data.setAll(data);


          	// Make stuff animate on load
          	series.appear();

          	series.bullets.push(function () {
            	return am5.Bullet.new(rootBar, {
              		locationY: 0,
              		sprite: am5.Label.new(rootBar, {
						text: "{valueY}",
						fill: rootBar.interfaceColors.get("alternativeText"),
						centerY: 0,
						centerX: am5.p50,
						populateText: true
              		})
            	});
          	});

          	legendBar.data.push(series);
        }

		function initChartBar() {

			var provinsi_name 	= $('#select_provinsi option:selected').text();
			var kabkota_name 	= $('#select_kabkota option:selected').text();

			var dataChart = [];

			// var dataChart = [
			// {nama_kab: "ACEH SELATAN", nomor_01: 3267680, nomor_02: 31334160},
			// {nama_kab: "ACEH TENGGARA", nomor_01: 13105015, nomor_02: 35300265},
			// {nama_kab: "ACEH TIMUR", nomor_01: 10984869, nomor_02: 91387359},
			// {nama_kab: "ACEH TENGAH", nomor_01: 14001880, nomor_02: 21683385},
			// {nama_kab: "ACEH BARAT", nomor_01: 5079183, nomor_02: 31261548},
			// {nama_kab: "ACEH BESAR", nomor_01: 11669884, nomor_02: 123278212},
			// {nama_kab: "PIDIE", nomor_01: 12959690, nomor_02: 153618280},
			// {nama_kab: "ACEH UTARA", nomor_01: 20413068, nomor_02: 243603840},
			// {nama_kab: "SIMEULUE", nomor_01: 2592744, nomor_02: 4284624},
			// {nama_kab: "ACEH SINGKIL", nomor_01: 2131964, nomor_02: 5607672},
			// {nama_kab: "BIREUEN", nomor_01: 9525978, nomor_02: 130112850},
			// {nama_kab: "ACEH BARAT DAYA", nomor_01: 1337600, nomor_02: 11656728},
			// {nama_kab: "GAYO LUES", nomor_01: 2553264, nomor_02: 4821064},
			// {nama_kab: "ACEH JAYA", nomor_01: 970080, nomor_02: 8226244},
			// {nama_kab: "NAGAN RAYA", nomor_01: 2884668, nomor_02: 19316442},
			// {nama_kab: "ACEH TAMIANG", nomor_01: 5125206, nomor_02: 27857418},
			// {nama_kab: "BENER MERIAH", nomor_01: 8504500, nomor_02: 12428919},
			// {nama_kab: "PIDIE JAYA", nomor_01: 1474968, nomor_02: 17943372},
			// {nama_kab: "KOTA BANDA ACEH", nomor_01: 1359270, nomor_02: 9618480},
			// {nama_kab: "KOTA SABANG", nomor_01: 49158, nomor_02: 345114},
			// {nama_kab: "KOTA LHOKSEUMAWE", nomor_01: 546856, nomor_02: 5942928},
			// {nama_kab: "KOTA LANGSA", nomor_01: 685278, nomor_02: 5381442},
			// {nama_kab: "KOTA SUBULUSSALAM", nomor_01: 768012, nomor_02: 3206118}];

			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
			    url: '/grafik_ppwp/data_provinsi',
			    type:'POST',
			    cache: false,
			    data: { provinsi_name : provinsi_name },
			    success: function(data) {

			        console.log(data.data);

			        while(chartBar.series.length) {
		                 chartBar.series.removeIndex(0).dispose();
		             }

			        if (data.result == 'success') {

			            chartBar.series.clear();

			            legendBar.data.clear();

			            makeSeries("01", "nomor_01", data.data);
			            makeSeries("02", "nomor_02", data.data);

			            chartBar.appear(1000, 100);
			        }
			        else{

			            
			        }
			        
			    }
			});
		}

		function initChartPie() {

			var provinsi_name 	= $('#select_provinsi option:selected').text();
			var kabkota_name 	= $('#select_kabkota option:selected').text();

			if (
				provinsi_name.length == 0 &&
				kabkota_name.length == 0
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
				    url: '/grafik_ppwp/data_kabkota',
				    type:'POST',
				    cache: false,
				    data: {
				    	provinsi_name : provinsi_name,
				    	kabkota_name : kabkota_name
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
							datachartpie.push({category : "01 Joko Widodo - Ma'ruf Amin :", value : data.data[0].nomor_01});
							datachartpie.push({category : '02 Prabowo Subianto - Sandiaga Uno :', value : data.data[0].nomor_02});

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

				            // const countUpTotal 		= new countUp.CountUp('tx_total', data.data_total);
				            // const countUpLaki 		= new countUp.CountUp('tx_laki', data.data_man);
				            // const countUpPerempuan 	= new countUp.CountUp('tx_perempuan', data.data_woman);

				            // if (!countUpTotal.error && !countUpLaki.error && !countUpPerempuan.error) {
				            //   countUpTotal.start();
				            //   countUpLaki.start();
				            //   countUpPerempuan.start();
				            // } else {
				            //   console.error(countUpTotal.error);
				            //   console.error(countUpLaki.error);
				            //   console.error(countUpPerempuan.error);
				            // }
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

			$('.div-kabkota').hide();
			$('.div-kecamatan').hide();
			$('.div-kelurahan').hide();
			$('.div-tps').hide();

			$(".li-kabkota").addClass('d-none');
			$('.li-kecamatan').addClass('d-none');
			$('.li-kelurahan').addClass('d-none');
			$('.li-tps').addClass('d-none');

			// initChartBar();
			// $(".tx-provinsi").text('Semua');

			$('#btn_reset').hide();		

			$('#btn_reset').click(function(){

				$('#select_provinsi').val('all').trigger('select2:select');
				$('.select2-selection__rendered').text('Semua');

				$(this).hide();
				$('#div_chart_bar').hide();
				$('#div_chart_pie').hide();
				$('#div_legend_pie').hide();
			});		

			$('#select_provinsi').on('select2:select', function (e) {
			  	
				initChartBar();
			  	$('#div_chart_pie').hide();
			  	$('#div_chart_bar').show();
			  	$('#div_grafik').focus();

			  	// $(window).scrollTop($('#div_chart_bar').offset().top);

				
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
			  	
			  	// initChartBar();

			  	initChartPie();
			  	$('#div_chart_bar').hide();
			  	$('#div_chart_pie').show();
			  	$('#div_legend_pie').show();

			  	$(".li-kabkota").removeClass('d-none');

			  	$(".tx-kabkota").text($(this).find('option:selected').text());	

				$("#select_kecamatan").empty();

	            var $newOption = $("<option selected='selected'></option>").val("all").text("Semua")
	 
				$("#select_kecamatan").append($newOption).trigger('change');
			});



			
		});
		
	</script>

@endsection