/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};


// Class definition
var KTSignupGeneral = function() {
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

                    // Simulate ajax request
                    setTimeout(function() {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;

                        var formData = new FormData($('#form_area')[0]);
                        var area_id = $('#area_id').val();

                        formData.append('area_id', area_id);

                        for(var pair of formData.entries()) {
                            //console.log(pair[0]+ ', '+ pair[1]);
                        }

                        modalHeader = $('.modal-title').text();

                        if (modalHeader == 'Register Area') {

                            $.ajax({
                                url: '/area',
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

                                                window.location.replace("/area");
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
                                url: '/area/'+area_id,
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

                                                window.location.replace("/area");
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

    }

    // Public functions
    return {
        // Initialization
        init: function() {
            // Elements
            form = document.querySelector('#form_area');
            submitButton = document.querySelector('#btn_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            handleForm ();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSignupGeneral.init();
});

/******/ })()
;