/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Modulo encargado de interaccion en interfaz
 */
$CASEIN.UI = (function() {

    function init()
    {
        _inputTags();
        _inputDatepicker();
        _maskInputs();
        _generateField();
        _countBlakSpace();
        _genDinamycUserName();
        _viewModal();
        _typificationFields(); // This Script is for "/its_data_entry/typification/create" view
        //_accesscontrol();
        _changeSetUserRol();
        _validationCrmCustomer();
        _products();
        _prueba();
    }
    
   (function(a) {
        a.fn.validCampoFranz = function(b) {
            a(this).on({keypress: function(a) {
                    var c = a.which, d = a.keyCode, e = String.fromCharCode(c).toLowerCase(),
                            f = b;
                    (-1 != f.indexOf(e) || 9 == d || 37 != c && 37 == d || 39 == d && 39 != c || 8 == d || 46 == d && 46 != c) && 161 != c || a.preventDefault()
                }})
        }
    })(jQuery);

        $('#resetpassword-new_password').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz0123456789*-#$Â°áéíóúñÑ');
        $('#resetpassword-verify_password').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz0123456789*-#$Â°áéíóúñÑ');

        var options = {};
        options.common = {
            minChar: 1
        };
        options.rules = {
            activated: {
                wordTwoCharacterClasses: true,
                wordRepetitions: true
            }
        };
        options.ui = {
            verdicts: ["Débil", "Normal", "Medio", "Fuerte", "Muy fuerte"],
            errorMessages: {
                wordLength: "La contraseña es demasiado corta",
                wordNotEmail: "No utilice su dirección de correo electrónico como contraseñaa",
                wordSimilarToUsername: "La contraseña no puede contener su nombre de usuario",
                wordTwoCharacterClasses: "Use diferentes tipos de caracteres",
                wordRepetitions: "Demasiados repeticiones",
                wordSequences: "La contraseña contiene secuencias",
                wordOneSpecialChar:"Por lo menos un caracter especial",
                wordUppercase: "Por lo menos un caracter en Mayúscula",
                wordLowercase:"Por lo menos un caracter en Minúscula"
                
            },
            showVerdictsInsideProgressBar: true,
            showErrors: true
        };
        "use strict";
        var password1=$(':password').pwstrength(options);
        var password2=$('#users-password_hash').pwstrength(options);
                      $('#users-password_hash').attr('maxlength','16');
    
        var form1 = $('.validaMetro');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
            rules: {
                'SysCompany[name]': {
                    minlength: 2,
                    required: true
                },
                'Profile[first_name]': {
                    minlength: 2,
                    required: true
                },
                'SysCompany[country_id]': {
                    required: true
                },
                'Profile[first_surname]': {
                    minlength: 2,
                    required: true
                },
                'SysCompany[state_id]': {
                    required: true
                },
                'Contact[corporate_address]': {
                 
                    required: true
                },
                'SysCompany[city_id]': {
                    required: true
                },
                'Contact[corporate_phone]': {
                    minlength: 2,
                    required: true,
                },
                'Contact[corporate_email]': {
                    minlength: 2,
                    required: true,
                    email: true
                },
                'SysUsers[password_hash]': {
                    minlength: 8,
                    maxlength: 16,
                    required: true,
                },
                'SysUsers[username]': {
                    required: true,
                },
                'Users[password_hash]': {
                    required: true,
                },
                'Users[username]': {
                    required: true,
                },
                'SysRecoverPasswordForm[email]': {
                    required: true,
                    email: true
                },
                'ResetPassword[new_password]': {
                    required: true,
                    minlength: 8,
                    maxlength: 16,          
                },
                'ResetPassword[verify_password]': {
                    required: true,
                    equalTo: "#resetpassword-new_password"           
                },
                 'RecoverPasswordForm[email]': {
                    required: true,           
                },
                 'Ticket[customer_id]': {
                    required: true,           
                },
                 'ContactPerson[contact_method]': {
                    required: true,           
                },                
                 'Customer[name]': {
                    required: true,           
                },                
                
            },
            invalidHandler: function(event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                Metronic.scrollTo(error1, -200);
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
//                    success1.show();
//                    error1.hide();
                form[0].submit(); // submit the form

            }
        });
    
    
    function _validationCrmCustomer()
    {
       var form1 = $('.validaMetroCrm');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
            rules: {
                          
                 'Customer[name]': {
                    required: true,           
                },                
                 'Customer[surname]': {
                    required: true,           
                },                
                 'Customer[office]': {
                    required: true,           
                },                
                 'Customer[phone_home]': {
                    required: true,           
                },                
                 'Customer[email]': {
                    required: true,   
                    email: true
                },                
                 'Customer[movil]': {
                    required: true,           
                },                
                 'Contact[corporate_address]': {
                    required: true,           
                },                
                 'Company[state_id]': {
                    required: true,           
                },                
                 'Company[country_id]': {
                    required: true,           
                },                
                
            },
            invalidHandler: function(event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                Metronic.scrollTo(error1, -200);
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
//                    success1.show();
//                    error1.hide();
                form[0].submit(); // submit the form

            }
        });  
    }
       
        
    function _inputTags()
    {
        if (!jQuery().tagsInput) {
            return;
        }
        $('.tags').tagsInput({
            width: 'auto',
            'onAddTag': function() {
//                alert("etiqueta agregada");
            },
        });
    }
    
    function _maskInputs()
    {
        $(".mask_number1").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); 
        
        $('#company-country_id').on('change', function() {
            var callPref='';
       
            callPref = $RIBELA.AJAX.consultation("POST", "/sys_timezone/country/countrylist?idCountry=" + $(this).val());
       
            $("#contact-corporate_phone").val(" ");
            $("#contact-corporate_phone").inputmask("mask", {
                mask: callPref+' 999 999 9999 [9999]',
                greedy: false,
            });

        });
        
    }

    function _inputDatepicker()
    {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
        }

    }
  
      function _generateField()
      {
          
        $('#syscompany-name').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyzÃ¡Ã©Ã­Ã³Ãº0123456789() -.,Â°áéíóúñÑ');
        $('#profile-first_name').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz áéíóúñÑ');
        $('#profile-first_surname').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz áéíóúñÑ');
        $('#users-username').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz áéíóúñÑ');
        $('#sysusers-password_hash').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz0123456789*-#$Â °áéíóúñÑ');
        $('#users-password_hash').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz0123456789*-#$Â °áéíóúñÑ');
        $('#resetpassword-new_password').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz0123456789*-#$Â°áéíóúñÑ');
        $('#resetpassword-verify_password').validCampoFranz('abcdefghijklmnÃ±opqrstuvwxyz0123456789*-#$Â°áéíóúñÑ');
        $('#contact-corporate_phone').validCampoFranz('0123456789');
      }
      
      function _countBlakSpace()
      {
      
        $('#profile-first_name').on('keypress', function(event) {
          
            var cadena = $('#profile-first_name').val();
            var contadorLetras = 0;
            var contadorEspacios = 0;

            for (var i = 0; i < cadena.length; i++) {
                if (cadena[i] != ' ')
                    contadorLetras++;
                else
                    contadorEspacios++;
            }          
        });
        
      }
      
    function _ValidarNumero(e, campo)
    {
        ///key es una variable que recoge el valor ASCII de la tecla pulsada.
        key = e.keyCode ? e.keyCode : e.which
        /// Validamos la tecla backspace
        if (key == 8)
            return false;
        
        ///En caso de que se presione cualquier otra tecla el valor no se introduce.
        return false
    }

    function _genDinamycUserName()
    {
        $('input[name="Profile[first_name]"]').on('keyup', function(){
            var value = $(this).val();
       
                $.ajax({
                   'url': '/sys_account_manager/user/dinamycusername',
                   'type':  'POST',
                   'data': {'name':value},
                   success: function(response) {
                       var data = JSON.parse(response);
                       if(data != 'Empty'){
                           $('input[name="SysUsers[username]"]').val(data);
                       }else{
                           $('input[name="SysUsers[username]"]').val('');
                       }
                   }
               });
        }).keyup();
    }
    
    function _viewModal()
    {
        $('.view-modal').on('click', function(){
            $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
        });
    }

    // This Script is for "/its_data_entry/typification/create" view

    function _typificationFields() {
        $("#dynamic-field_values").prop("readonly", "true");
        $("#dynamic-field_values_tag").css("display", "none");
        $("#dynamic-field_type").on('change', function(){
            if($(this).val() == "list"){
                $("#dynamic-field_values").prop("readonly", "false");
                $("#dynamic-field_values_tag").css("display", "block");
            }else{
                $("#dynamic-field_values").prop("readonly", "true");
                $("#dynamic-field_values_tag").css("display", "none");
            }
        });
    }
    
    function _changeSetUserRol()
    {
        var ids_user = new Array();
        $('input[name="Users[list_users_get][]"]').change(function() {
            if($(this).is(":checked")) {
                _itemRemove(ids_user, $(this).val());
            }else{
                $('input[name="Users[list_users_get][]"]').each(function(index){
                    if($(this).is(":checked")) {
                        _itemRemove(ids_user, $(this).val());
                    }else{
                        ids_user[index] = $(this).val();
                    }
                });
            } 
            console.log(ids_user);
            $('input[name="Users[list_users]"]').val(ids_user);
        });
    }
    
    function _itemRemove(array, item) {
        for(var i = array.length; i--;) {
            if(array[i] === item) {
                array.splice(i, 1);
            }
        }
    }

    function _products(){
        $('#form_control_8').on('change', function(){
          if($(this).val() == 'crear_editar'){
            $('#category_creation').modal('toggle');
            $(this).val('');
          }
        })
    }

    function prueba(){
        console.log('entro en el initi');
    }

    return {
        init: init, 
        
    };
})();

(function(a) {
    a.fn.validCampoFranz = function(b) {
        a(this).on({keypress: function(a) {
            var c = a.which, d = a.keyCode, e = String.fromCharCode(c).toLowerCase(),
                    f = b;
            (-1 != f.indexOf(e) || 9 == d || 37 != c && 37 == d || 39 == d && 39 != c || 8 == d || 46 == d && 46 != c) && 161 != c || a.preventDefault()
        }})
    }
})(jQuery);