require('./../../app');
require('./../../jquery.dataTables.min');
require('./../../dataTables.bootstrap.min');
require('./../../../vendor/iziModal/js/iziModal.min');
require('./../../../vendor/iziToast/dist/js/iziToast');
require('./../../formvalidation');

require('./../../common');

;(function(global, $, Pace, iziToast){
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
            let self = this;
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
                    resetFormData:true,
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
                        formId   = $('#frm-user-master')
                        fv          = $form.data('formValidation'),
                        actionUrl   = $form.attr('action'),
                        type        = "POST";
                        data        = self.jsonify($form.serializeArray());
                        self.submitData(actionUrl, type, data, formId);
                    
                });
            });
        },
        jsonify:function(formData){
            var returnArray = {};
            for (var i = 0; i < formData.length; i++){
                returnArray[formData[i]['name']] = formData[i]['value'];   
            }
            return returnArray;
        },
        submitData: function(actionUrl, type, data, formId){
            let self = this;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Pace.track(function(){
                $.ajax({
                    dataType: 'json',
                    url: actionUrl,
                    type: type,
                    data: data,
                    success: function(response) {
                        if(response.success){
                            self.resetForm(formId);
                            iziToast.success({
                                title: 'Success!',
                                message: 'User has been successfully saved!',
                                position: 'topRight'
                            });
                        }else{
                            let error = response.error;
                            let arr_errmsg = [];
                            let errors = "";
                            for (let element in error) {
                                errors += `<br/><label><strong>${element.charAt(0).toUpperCase() + element.slice(1)}</strong></label>
                                            <ul>`;
                                if( error.hasOwnProperty(element) ) {
                                    arr_errmsg = error[element];
                                    for(let msg in arr_errmsg){
                                        errors += `<li>${arr_errmsg[msg]}</li>`;
                                    }
                                } 
                                errors += `</ul>`;
                                } 
                            iziToast.error({
                                title: 'Error!',
                                message: `<div class='float-right'> ${errors} </div>`,
                                position: 'topRight',
                            });
                        }
                        
                    }
                });
            });
        },
        resetForm: function(formId) {
            formId.find('input:text, input:password, input:file, select, textarea').val('');
            formId.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');

            $(formId).data('formValidation').resetForm();
        }
    }
    User.init.prototype = User.prototype;

    global.User = global.$U = User;
})(window, $, Pace, iziToast);

$("document").ready(function(){
    $U();
});
    