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
    				<div class="card-body p-0 py-5">
    					<!--begin::Wrapper-->
    					<div class="card-px">
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>You are an <span class="text-primary">{{ Session::get('group_name') }}</span>, what you can do are:</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Permissions-->
                                    <div class="list-privilege d-flex flex-column text-gray-600">

                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
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
                    <h5 class="modal-title">Register Area</h5>

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

		var group_id = '{{ Session::get('group_id') }}';

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });	

		function initTable()
	    {
	        var table = $('#table_area').DataTable();
	        var dateNow = '{{ now() }}';

	        $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/privilege/'+group_id,
                success: function (data) {

                    console.log(data);

                    var arrPrivilege = [];

                    Array.prototype.contains = function(obj) {
                        var i = this.length;
                        while (i--) {
                            if (this[i] === obj) {
                                return true;
                            }
                        }
                        return false;
                    }

                    var label_prev = '';

                    for (var i = 0; i < data.length; i++) {

                        var id          = data[i].id;
                        var name        = data[i].name;
                        var label       = data[i].label;
                        var type        = data[i].type;
                        var option_name = name +'_'+ type.toLowerCase();

                        if (!arrPrivilege.contains(label)) {
                            arrPrivilege.push(label);

                            var text = '';

                            text = label + ' ('+type+')';

                            var element = '';

                            element += '<div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span><span class="'+name+'">'+text+'</span></div>';

                            $('.list-privilege').append(element);
                        }
                        else{

                            text = text.replace(')', ', '+type+')');

                            $('.'+name).text(text);
                        }
                    }
                }
            });
	    }

		$(document).ready(function() {

			initTable();
		});
	    
	</script>

@endsection

