require('./../../app');
require('./../../jquery.dataTables.min');
require('./../../dataTables.bootstrap.min');
require('./../../../vendor/iziModal/js/iziModal.min');
require('./../../../vendor/iziToast/dist/js/iziToast.min');
require('./../../formvalidation');

require('./../../common');

;(function(global, $){
    const User = function(id, name, email, password){
        return new User.init();
    }
    User.init = function(id, name, email, password){
        this.id = id || "";
        this.name = name || "";
        this.email = email || "";
        this.password = password || "";
        this.action = "";
        this.initialize();
    };

    User.prototype = {
        initialize: function(){
            $('document').ready(function(){
                let userAction = "Add New User";
                let userActionSubtitle = "Add New User subtitle";
                $("#user-modal").iziModal(
                    {
                        title: userAction,
                        subtitle: userActionSubtitle,
                        appendTo: "#divcontent",
                        appendToOverlay: "#divcontent",
                        width: "40em",
                        zindex:10000,
                        padding: "5%",
                        radius: 0,
                        closeOnEscape: false,
                        overlayClose: false,
                    }
                );
                $('#frm-user-master').formValidation({
                    framework: 'bootstrap',
                    icon: icons,
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: 'The name is required'
                                },
                                stringLength: {
                                    message: 'Name must be less than 256 characters',
                                    max: 255,
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The input is not a valid email address'
                                },
                                stringLength: {
                                    message: 'Email must be less than 256 characters',
                                    max: 255,
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                different: {
                                    field: 'username',
                                    message: 'The password cannot be the same as username'
                                },
                                stringLength: {
                                    message: 'Password mmust be at least 6 characters.',
                                    min: 6,
                                }
                            }
                        },
                        password_confirmation:{
                            validators: {
                                identical: {
                                    field: 'password',
                                    message: 'The password and its confirm are not the same.'
                                }
                            }
                        }
                    }
                })
                .on('success.form.fv', function(e) {
                    // Prevent form submission
                    e.preventDefault();
        
                    let $form       = $(e.target),
                        fv          = $form.data('formValidation'),
                        actionUrl   = $form.attr('action'),
                        type        = "POST",
                        data        = $form.serialize();
                    this.submitData(actionUrl, type, data);
                    
                });
                let formValidation = $("#frm-user-master").data('formValidation');
                console.log('formValidation: '+formValidation);
            });
        },
        submitData: function(actionUrl, type, data){
            $.ajax({
                url: actionUrl,
                type: type,
                data: data,
                beforeSend:function(){

                },
                success: function(result) {
                    
                }
            });
        }
    }
    User.init.prototype = User.prototype;

    global.User = global.$U = User;
})(window, $);

$("document").ready(function(){
    $U();
});
    