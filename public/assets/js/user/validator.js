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

                    // Simulate ajax request
                    setTimeout(function() {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;

                        var formData = new FormData($('#form_user')[0]);
                        var group_id = $('#select_group').val();
                        var area_id = $('#select_area').val();
                        var division_id = $('#select_division').val();
                        var user_id = $('#user_id').val();

                        formData.append('user_id', user_id);
                        formData.append('group_id', group_id);
                        formData.append('area_id', area_id);
                        formData.append('division_id', division_id);

                        for(var pair of formData.entries()) {
                            //console.log(pair[0]+ ', '+ pair[1]);
                        }

                        modalHeader = $('.modal-title').text();

                        if (modalHeader == 'Register User') {

                            $.ajax({
                                url: '/user',
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

                                                window.location.replace("/user");
                                            }
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
                        }
                        else{

                            formData.set('_method', 'PATCH');

                            $.ajax({
                                url: '/user/'+user_id,
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
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) { 

                                                window.location.replace("/user");
                                            }
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
                        }

                        
                        // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        
                    }, 1500);   						
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