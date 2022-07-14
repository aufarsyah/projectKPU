@extends('layout')

@section('title', 'Group Setup')

@section('content')
    
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    	<!--begin::Toolbar-->
    	<div class="toolbar" id="kt_toolbar">
    		<!--begin::Container-->
    		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    			<!--begin::Page title-->
    			<div class="d-flex align-items-center me-3">
    				<!--begin::Title-->
    				<h1 class="d-flex align-items-center fw-bolder my-1 fs-3">Group Setup</h1>
    				<!--end::Title-->
    				<!--begin::Separator-->
    				<span class="h-20px border-gray-200 border-start mx-4"></span>
    				<!--end::Separator-->
    			</div>
    			<!--end::Page title-->

    			<!--begin::Actions-->
    			<div class="d-flex align-items-center py-1">
    				<!--begin::Button-->
    				@if(in_array("group_setup_create", Session::get('privilege')))
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
    							<table id="table_group" class="table table-rounded table-striped border gy-7 gs-7">
    							    <thead>
    							        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                            <th class="d-none"></th>
    							            <th class="min-w-80px">Name</th>
    							            <th class="min-w-80px">Description</th>
    							            <th class="min-w-100px">Action</th>
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

    <div class="modal fade" tabindex="-1" id="modal_data">
        <div class="modal-dialog" style="max-width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register Group</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <img src="assets/media/icons/stockholm/Navigation/Close.svg"/>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <!--begin::Form-->
                    <form enctype="multipart/form-data" class="form w-100" novalidate="novalidate" id="form_group">

                    	@method("POST")
                    	@csrf
                    	<!--begin::Action-->
                    	<!--end::Separator-->
                    	<!--begin::Input group-->
                        <input class="d-none" type="text" name="group_id" id="group_id" disabled="disabled" />
                    	<div class="row fv-row mb-7">
                    		<!--begin::Col-->
                    		<div class="col-xl-12">
                    			<label class="form-label fw-bolder text-dark fs-6"><span class="required">Name</span></label>
                    			<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" id="name" maxlength="20" />
                    		</div>
                    		<!--end::Col-->
                    	</div>
                    	<div class="row fv-row mb-10">
                    		<!--begin::Col-->
                    		<div class="col-xl-12">
                    			<label class="form-label fw-bolder text-dark fs-6">Description</label>
                    			<textarea class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="description" autocomplete="off" id="description" maxlength="100"></textarea>
                    		</div>
                    		<!--end::Col-->
                    	</div>
                    	<!--end::Input group-->
                    	<!--begin::Permissions-->
						<div class="fv-row">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">Privilege Permissions</label>
							<!--end::Label-->
							<!--begin::Table wrapper-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table align-middle fs-6 gy-5" id="table_privilege">
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">Full Control Access 
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
											<td>
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-9">
													<input class="form-check-input chkall" type="checkbox" value="" id="select_all" />
													<span class="form-check-label">Select all</span>
												</label>
												<!--end::Checkbox-->
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										
										<!--end::Table row-->
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Table wrapper-->
						</div>
						<!--end::Permissions-->
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


	{{-- <script src="assets/js/group/validator.js"></script> --}}

	<script type="text/javascript">

		var group_id = '{{ Session::get('group_id') }}';
		var email = '{{ Session::get('email') }}';
        var privilege = '{{ implode(",", Session::get('privilege')) }}';
        var arr_privilege = privilege.split(',');
        var priv_group_update = arr_privilege.includes('group_setup_update');
        var priv_group_delete = arr_privilege.includes('group_setup_delete');
		$("#birth_of_date").flatpickr();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        $('#select_all').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        }); 

		function initTable()
	    {
	        var table = $('#table_group').DataTable();
	        var dateNow = '{{ now() }}';

	        $.ajax({
	            dataType: 'JSON',
	            type: 'GET',
	            url: '/group/'+group_id,
	            success: function (data) {

	                //console.log(data);

	                //data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));
	                table.clear().draw();

	                for (var i = 0; i < data.length; i++) {

                        var id              	= data[i].id;
	                  	var name     			= data[i].name;
	                  	var description      	= data[i].description;

	                    var element =
	                        //'<td>'+ (i + 1) +'</td>' +
                            '<td data-id="'+id+'" class="d-none"></td>' +
	                        '<td data-name="'+name+'">'+name+'</td>' +
	                        '<td data-description="'+description+'">'+description+'</td>';

	                    element += '<td>';

	                    if (priv_group_update) {

		                    element+= '<a class="btn btn-icon btn-success me-2 btn_group_update" data-bs-toggle="modal" data-bs-target="#modal_data" onClick="updateClick(this)"><i class="bi bi-pencil-square fs-4"></i></a>';
	                    }

	                    if (priv_group_delete) {

	                    	if (id > 1) {

		                    	if (id != group_id) {

			                    	element+= '<a class="btn btn-icon btn-danger" id="btn_group_delete" onClick="deleteClick(this)"><i class="bi bi-trash fs-4"></i></a>';
		                    	}
	                    	}
	                	} 

                        if (!priv_group_update && !priv_group_delete) {

                            element+= '<p class="text-gray-600 fst-italic fs-8">You don&apos;t have any privileges</p>';
                        }

                        element += '</td>';

	                    var jRow = $('<tr>').append(element);

	                    table.row.add(jRow).draw();
	                }
	            }
	        });
	    }

	    function initPrivilege()
	    {
	        $.ajax({
	            dataType: 'JSON',
	            type: 'GET',
	            url: '/privilege/option/all',
	            success: function (data) {

	                //console.log(data);

	                for (var i = 0; i < data.length; i++) {

                        var id      	= data[i].id;
	                  	var name 		= data[i].name;
	                  	var label		= data[i].label;
	                  	var type		= data[i].type;
	                  	var option_name	= name +'_'+ type.toLowerCase();


	                  	if ($('#table_privilege tr:last').attr('class') == name) {

		                    var element = '<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-10">';
		                    element+= '<input class="form-check-input chkdata" type="checkbox" value="'+id+'" name="privilege" />';
		                    element+= '<span class="form-check-label">'+type+'</span></label></div></td>';

	                  		$("#table_privilege").find('tbody').find('tr:last').find('td:last').find('div').append($(element));

	                  	}else{

	                  		var element = '<td class="text-gray-800">'+label+'</td>';
		                    element+= '<td class="'+name+'"><div class="d-flex">';
		                    element+= '<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-10">';
		                    element+= '<input class="form-check-input chkdata" type="checkbox" value="'+id+'" name="privilege" />';
		                    element+= '<span class="form-check-label">'+type+'</span></label></div></td>';

		                    var optionRow = $('<tr class="'+name+'">').append(element);

		                    $("#table_privilege").find('tbody').append($(optionRow));
	                  	}
	                    
	                }
	            }
	        });
	    }

	    function updateClick(btn){
	    	//console.log(btn.closest('tr'));
	    	
	    	var row = $(btn.closest('tr'));
			
	    	var cells = row.find('td');

	    	$('#form_group').trigger("reset");

            $('.modal-title').text('Update Group').change();

	    	$.each(cells, function() {  

                if($(this).data('id')) $('#group_id').val($(this).data('id'));
                if($(this).data('name')) $('#name').val($(this).data('name'));
                if($(this).data('description')) $('#description').val($(this).data('description'));
	    	});

	    	var update_group_id = $('#group_id').val();
	    	var privilege_checked = 0;

	    	$.ajax({
	            dataType: 'JSON',
	            type: 'GET',
	            url: '/privilege/option/'+update_group_id,
	            success: function (data) {

	                //console.log(data);

	                for (var i = 0; i < data.length; i++) {

                        var privilege_id = data[i].privilege_id;
	                  	
	                  	$("input[value='"+privilege_id+"']").prop('checked', true);
	                    
	                }

	                if (data.length == $('.chkdata').length) {
				       $('.chkall').prop('checked', true);
				    }
	            }
	        });

	        $(".chkdata").change(function(){
			    if ($('.chkdata:checked').length == $('.chkdata').length) {
			       $('.chkall').prop('checked', true);
			    }
			    else{
			    	$('.chkall').prop('checked', false);
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
                        url: '/group/'+id,
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
                                        // window.location.replace("/group");
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
			initPrivilege();

            $('#btn_group_add').click(function() {

                $('.modal-title').text('Register Group').change();

                $('#form_group').trigger("reset");

                $(".chkdata").change(function(){
        		    if ($('.chkdata:checked').length == $('.chkdata').length) {
        		       $('.chkall').prop('checked', true);
        		    }
				    else{
				    	$('.chkall').prop('checked', false);
				    }
        		});
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
                            'name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Name is required'
                                    }
                                }
                            },
                            'description': {
                                validators: {
                                    notEmpty: {
                                        message: 'Description is required'
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

                            var formData = new FormData($('#form_group')[0]);
                            var update_group_id = $('#group_id').val();
                            var arrPrivilege = [];

                            $("input:checkbox[name=privilege]:checked").each(function() {
                                arrPrivilege.push($(this).val());
                            });

                            formData.delete('privilege');
                            formData.append('privilege', arrPrivilege);


                            for(var pair of formData.entries()) {
                                //console.log(pair[0]+ ', '+ pair[1]);
                            }

                            modalHeader = $('.modal-title').text();

                            if (modalHeader == 'Register Group') {

                                $.ajax({
                                    url: '/group',
                                    type:'POST',
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: formData,
                                    success: function(data) {
                                        
                                        if (data.result == 'success') {

                                            Swal.fire({
                                                text: data.message,
                                                icon: "success",
			                                    showConfirmButton:false, 
			                                    showCancelButton:false,
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                },
                                                timer: 1000
                                            }).then(() => {
                                                
                                                initTable();
                                                $('#btn_close').click(); 
                                                location.reload;
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
                                    url: '/group/'+update_group_id,
                                    type:'POST',
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: formData,
                                    success: function(data) {
                                        //console.log(data);

                                        $('#btn_close').click();

                                        if (data.result == 'success') {

                                            Swal.fire({
                                                text: data.message,
                                                icon: "success",
			                                    showConfirmButton:false, 
			                                    showCancelButton:false,
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                },
                                                timer: 1500
                                            }).then(() => {

                                            	if (update_group_id == group_id) {

	                                                window.location.replace("/group");
                                            	}
                                            	else{

                                            		initTable();
                                            	}
                                            });

                                        	// window.location.reload;
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
                    form = document.querySelector('#form_group');
                    submitButton = document.querySelector('#btn_submit');
                    passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

                    handleForm ();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTGeneral.init();
        });
	    
	</script>

@endsection

