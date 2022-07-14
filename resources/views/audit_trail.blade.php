@extends('layout')

@section('title', 'Audit Trail')

@section('content')
    
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    	<!--begin::Toolbar-->
    	<div class="toolbar" id="kt_toolbar">
    		<!--begin::Container-->
    		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    			<!--begin::Page title-->
    			<div class="d-flex align-items-center me-3">
    				<!--begin::Title-->
    				<h1 class="d-flex align-items-center fw-bolder my-1 fs-3">Audit Trail</h1>
    				<!--end::Title-->
    				<!--begin::Separator-->
    				<span class="h-20px border-gray-200 border-start mx-4"></span>
    				<!--end::Separator-->
    			</div>
    			<!--end::Page title-->

    			<!--begin::Actions-->
    			<div class="d-flex align-items-center py-1">
    				<!--begin::Button-->
                    @if(in_array("area_setup_create", Session::get('privilege')))
    				<a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_area" id="btn_area_add">Create</a>
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
                                            <th class="">Timestamp</th>
                                            <th class="">Username</th>
    							            <th class="">Activity</th>
    							            <th class="">Details</th>
    							        </tr>
    							    </thead>
    							    <tbody>
    							    </tbody>
    							</table>
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

    <div class="modal fade" tabindex="-1" id="modal_area">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register Audit Trail</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <img src="assets/media/icons/stockholm/Navigation/Close.svg"/>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <!--begin::Form-->
                    <form enctype="multipart/form-data" class="form w-100" novalidate="novalidate" id="form_area">

                    	@method("POST")
                    	@csrf
                        <input class="d-none" type="text" name="area_id" id="area_id" disabled="disabled" />
                    	<div class="fv-row mb-7">
                    		<label class="form-label fw-bolder text-dark fs-6">Name</label>
                    		<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" id="name" maxlength="20" />
                    	</div>
                    	<div class="fv-row mb-7">
                    		<label class="form-label fw-bolder text-dark fs-6">Description</label>
                    		<textarea class="form-control form-control-lg form-control-solid" placeholder="" name="description" autocomplete="off" id="description" maxlength="100"></textarea>
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

    
@endsection

@section('javascript')


	{{-- <script src="assets/js/area/general.js"></script> --}}

	<script type="text/javascript">

		var user_id = '{{ Session::get('user_id') }}';
		var email = '{{ Session::get('email') }}';

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
	            url: '/audit_trail/all',
	            success: function (data) {

	                console.log(data);

	                //data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));
	                table.clear().draw();

	                for (var i = 0; i < data.length; i++) {

                        var id         = data[i].id;
	                  	var username   = data[i].username;
                        var activity   = data[i].activity;
	                  	var details    = data[i].details;
                        var timestamp  = data[i].created_at;
                        var timestamp  = new Date(timestamp);
                        var timestamp  = timestamp.toISOString().substring(0, 10) + ' ' + timestamp.toLocaleTimeString();

	                    var element =
	                        //'<td>'+ (i + 1) +'</td>' +
                            '<td data-id="'+id+'" class="d-none"></td>' +
                            '<td data-timestamp="'+timestamp+'">'+timestamp+'</td>' +
	                        '<td data-username="'+username+'">'+username+'</td>' +
                            '<td data-activity="'+activity+'">'+activity+'</td>' +
	                        '<td data-details="'+details+'">'+details+'</td>';

	                    var jRow = $('<tr>').append(element);

	                    table.row.add(jRow).draw();
	                }
	            }
	        });
	    }

		$(document).ready(function() {

			initTable();


            $('#btn_area_add').click(function() {
                
                $('.modal-title').text('Register Audit Trail').change();

                $('#form_area').trigger("reset");
            });
		});
	    
	</script>

@endsection

