@extends('layout')

@section('title', 'Change Profile')

@section('content')
    
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    	<!--begin::Toolbar-->
    	<div class="toolbar" id="kt_toolbar">
    		<!--begin::Container-->
    		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    			<!--begin::Page title-->
    			<div class="d-flex align-items-center me-3">
    				<!--begin::Title-->
    				<h1 class="d-flex align-items-center fw-bolder my-1 fs-3">Change Profile</h1>
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
                <div class="card">
        			<div class="card-body">
                        <!--begin::Form-->
                        <form enctype="multipart/form-data" class="form w-100" novalidate="novalidate" id="form_user">

                            @method("POST")
                            @csrf
                            <!--begin::Action-->
                            {{-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                            <img alt="Logo" src="assets/media/svg/social-icons/google.svg" class="h-20px me-3" />Sign in with Google</button>
                            <!--end::Action-->
                            <!--begin::Separator-->
                            <div class="d-flex align-items-center mb-10">
                                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                                <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            </div> --}}
                            <!--end::Separator-->
                            <!--begin::Input group-->
                            <input class="d-none" type="text" name="user_id" id="user_id" disabled="disabled" />
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Employee Number</label>
                                <input class="form-control form-control-lg form-control-solid bg-secondary" type="text" placeholder="" name="employee_number" autocomplete="off" id="employee_number" disabled/>
                            </div>
                            <div class="row fv-row mb-7">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first_name" autocomplete="off" id="first_name" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" autocomplete="off" id="last_name" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid bg-secondary" type="email" placeholder="" name="email" autocomplete="off" id="email" disabled/>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Phone</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="phone" autocomplete="off" id="phone" maxlength="14" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Birth of Date</label>
                                <input class="form-control form-control-solid" type="text" placeholder="" name="birth_of_date" autocomplete="off" id="birth_of_date" maxlength="10" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Address</label>
                                <textarea class="form-control form-control-lg form-control-solid" placeholder="" name="address" autocomplete="off" id="address" maxlength="100"></textarea>
                            </div>
                            <div class="fv-row mb-7 d-none">
                                <label class="form-label fw-bolder text-dark fs-6">Select Group</label>
                                <select id="select_group" class="form-select form-select-lg" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" >
                                    <option value="" selected disabled></option>
                                </select>
                            </div>
                            <div class="fv-row mb-7 d-none">
                                <label class="form-label fw-bolder text-dark fs-6">Select Area</label>
                                <select id="select_area" class="form-select form-select-lg" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" >
                                    <option value="" selected disabled></option>
                                </select>
                            </div>
                            <div class="fv-row mb-7 d-none">
                                <label class="form-label fw-bolder text-dark fs-6">Select Division</label>
                                <select id="select_division" class="form-select form-select-lg" data-control="select2" data-allow-clear="true" data-placeholder="Select an option" >
                                    <option value="" selected disabled></option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <div class="mb-5 info-password">
                                <span class="badge badge-light-danger"><i class="bi bi-info-circle text-danger"></i> Fill the fields below will reset the password</span>
                            </div>
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" id="password" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hint-->
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
                            </div>
                            <!--end::Input group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <div class="card-footer">
                    <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                </div>
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

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });	

        function initSelectGroup() {

            var select = $('#select_group');

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/group/all',
                success: function (data) {

                    $.each(data, function (index, item) {
                        select.append($('<option>', { 
                            value: item.id,
                            text : item.name 
                        }));
                    });
                }
            });
        }

        function initTable(){

            var dateNow = '{{ now() }}';

            console.log(user_id);

            $.ajax({
                dataType: 'JSON',
                type: 'GET',
                url: '/user/'+user_id,
                success: function (data) {

                    //console.log(data);

                    var id                  = data[0].id;
                    var employee_number     = data[0].employee_number;
                    var first_name          = data[0].first_name;
                    var last_name           = data[0].last_name;
                    var email               = data[0].email;
                    var phone               = data[0].phone;
                    var birth_of_date       = data[0].birth_of_date;
                    var address             = data[0].address;
                    var group_id            = data[0].group_id;
                    var group_name          = data[0].group_name;
                    var area_name           = data[0].area_name;

                    $('#user_id').val(id);
                    $('#employee_number').val(employee_number);
                    $('#first_name').val(first_name);
                    $('#last_name').val(last_name);
                    $('#email').val(email);
                    $('#phone').val(phone);
                    $('#birth_of_date').val(birth_of_date);
                    $('#address').val(address);
                    $('#select_group').val(group_id).change();
                    
                }
            });
        }


		$(document).ready(function() {

			initTable();
            initSelectGroup();
		});

        // Class definition
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
                            'employee_number': {
                                validators: {
                                    notEmpty: {
                                        message: 'Employee number is required'
                                    }
                                }
                            },
                            'first_name': {
                                validators: {
                                    notEmpty: {
                                        message: 'First Name is required'
                                    }
                                }
                            },
                            'last_name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Last Name is required'
                                    }
                                }
                            },
                            'email': {
                                validators: {
                                    notEmpty: {
                                        message: 'Email address is required'
                                    },
                                    emailAddress: {
                                        message: 'The value is not a valid email address'
                                    }
                                }
                            },
                            'phone': {
                                validators: {
                                    notEmpty: {
                                        message: 'Phone is required'
                                    },
                                    regexp: {
                                        regexp: /^[0-9]{8,14}$/i,
                                        message: 'The phone number consist of 8 -14 digit number only'
                                    }
                                }
                            },
                            'birth_of_date': {
                                validators: {
                                    notEmpty: {
                                        message: 'Birth of date is required'
                                    }
                                }
                            },
                            'address': {
                                validators: {
                                    notEmpty: {
                                        message: 'Address is required'
                                    }
                                }
                            },
                            'password': {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    },
                                    callback: {
                                        message: 'Please enter valid password',
                                        callback: function(input) {
                                            if (input.value.length > 0) {
                                                return validatePassword();
                                            }
                                        }
                                    }
                                }
                            },
                            'confirm-password': {
                                validators: {
                                    notEmpty: {
                                        message: 'The password confirmation is required'
                                    },
                                    identical: {
                                        compare: function() {
                                            return form.querySelector('[name="password"]').value;
                                        },
                                        message: 'The password and its confirm are not the same'
                                    }
                                }
                            },
                            'toc': {
                                validators: {
                                    notEmpty: {
                                        message: 'You must accept the terms and conditions'
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

                    validator.revalidateField('password');

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

                            var formData = new FormData($('#form_user')[0]);
                            var employee_number = $('#employee_number').val();
                            var email = $('#email').val();
                            var group_id = $('#select_group').val();
                            var user_id = $('#user_id').val();

                            formData.append('employee_number', employee_number);
                            formData.append('email', email);
                            formData.append('user_id', user_id);
                            formData.append('group_id', group_id);

                            for(var pair of formData.entries()) {
                                //console.log(pair[0]+ ', '+ pair[1]);
                            }

                            formData.set('_method', 'PATCH');

                            $.ajax({
                                url: '/profile/'+user_id,
                                type:'POST',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function(data) {
                                    //console.log(data);

                                    if (data.result == 'success') {

                                        Swal.fire({
                                            text: data.message,
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            },
                                            timer: 1000
                                        }).then(() => {
                                            location.reload();
                                        });
                                    }
                                    else{

                                        form.reset();  // reset form                    
                                        passwordMeter.reset();  // reset password meter

                                        swalWithBootstrapButtons.fire(
                                            'Gagal!',
                                            data.message,
                                            'error'
                                        )
                                    }
                                    
                                }
                            });
                    
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

                // Handle password input
                form.querySelector('input[name="password"]').addEventListener('input', function() {
                    if (this.value.length > 0) {
                        validator.updateFieldStatus('password', 'NotValidated');
                    }
                });

                if ($('#password').val() == '') {
                    validator.disableValidator('password');
                    validator.disableValidator('confirm-password');
                }else{
                    validator.enableValidator('password');
                    validator.enableValidator('confirm-password');
                }
            }

            // Password input validation
            var validatePassword = function() {
                return  (passwordMeter.getScore() === 100);
            }

            // Public functions
            return {
                // Initialization
                init: function() {
                    // Elements
                    form = document.querySelector('#form_user');
                    submitButton = document.querySelector('#kt_sign_up_submit');
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

