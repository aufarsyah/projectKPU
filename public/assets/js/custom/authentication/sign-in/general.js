/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					
					// 'email': {
     //                    validators: {
					// 		notEmpty: {
					// 			message: 'Email address is required'
					// 		},
     //                        emailAddress: {
					// 			message: 'The value is not a valid email address'
					// 		}
					// 	}
					// },
                    'user_login_data': {
                        validators: {
                            notEmpty: {
                                message: 'Username is required'
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
                                        return _validatePassword();
                                    }
                                }
                            } 
                        }
                    },
                    'captcha_input': {
                        validators: {
                            notEmpty: {
                                message: 'Captcha is required'
                            },
                            identical: {
                                compare: function() {
                                    return code;
                                },
                                message: 'Invalid captcha'
                            }
                        }
                    } 
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
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
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click 
                    submitButton.disabled = true;

                    // Hide loading indication
                    submitButton.removeAttribute('data-kt-indicator');

                    // Enable button
                    submitButton.disabled = false;

                    var formData = new FormData($('#form_signin')[0]);

                    for(var pair of formData.entries()) {
                        console.log(pair[0]+ ', '+ pair[1]);
                    }

                    var text = $('#captcha_input').val();

                    console.log(text);
                    console.log(code);


                    $.ajax({
                        url: '/signin_process',
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
                                    timer: 2000,
                                    showConfirmButton:false, 
                                    showCancelButton:false,
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(() => {

                                    window.location.replace("/dashboard");
                                    
                                });
                            }
                            else{

                                form.reset();  // reset form

                                swalWithBootstrapButtons.fire(
                                    'Gagal!',
                                    data.message,
                                    'error'
                                )
                            }
                            
                        }
                    });
                    
                    // // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    // Swal.fire({
                    //     text: "You have successfully logged in!",
                    //     icon: "success",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn btn-primary"
                    //     }
                    // }).then(function (result) {
                    //     if (result.isConfirmed) { 
                    //         //form.querySelector('[name="email"]').value= "";
                    //         //form.querySelector('[name="password"]').value= "";                                
                    //         form.submit();
                    //     }
                    // }); 						
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    // Swal.fire({
                    //     text: "Sorry, looks like there are some errors detected, please try again.",
                    //     icon: "error",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn btn-primary"
                    //     }
                    // });
                }
            });
		});
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#form_signin');
            submitButton = document.querySelector('#kt_sign_in_submit');
            
            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});

/******/ })()
;
//# sourceMappingURL=general.js.map