/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Modulo encargado dela interaccion con servidor a traves de AJAX
 */
$RIBELA.AJAX=(function()
{ 
    function consultation(type, action, formulario)
    {

        var idDivision = $.ajax({
            type: type,
            url: action,
            async: false,
            data: formulario,
            success: function(data)
            {}
        }).responseText;

        return idDivision;
    }
    
    
     return {
        consultation:consultation
    };
    
})();