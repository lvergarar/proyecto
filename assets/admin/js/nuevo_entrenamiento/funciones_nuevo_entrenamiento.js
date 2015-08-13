/* 
 * Funciones generales de pantalla de creación de ruta
 */

function cambiarTipoRutaEntrenamiento(tipo){
    
     $("#ruta_entrenamiento").prop('type', tipo);
}


function crear_entrenamiento() {
  
    $("#ruta_entrenamiento").val(coordenadas_ruta);
   
      $( "#fecha_nuevo_entrenamiento" ).datepicker({dateFormat : 'yy-mm-dd'});
    cambiarTipoRutaEntrenamiento('text');
    var url = CI_ROOT + "entrenamiento/crear_entrenamiento";
    validarYEnviarFormGenerico(null, $('#form_nuevo_entrenamiento'), url, '');
}

// this one requires the text "buga", we define a default message, too
	$.validator.addMethod("buga", function(value) {
		return value == "buga";
	}, 'Please enter "buga"!');
        
function validarYEnviarFormGenerico(datosForm, form, url, fn_callback) {

     if (typeof datosForm == 'undefined' || datosForm == null) {
        form.validate({
		
			rules: {
				number: {
					required: true,
					minlength: 3,
					maxlength: 15,
					number: true
				},
				secret: "buga",
				math: {
					equal: 11
				}
			}
		});        
        if (!form.valid()) {
            cambiarTipoRutaEntrenamiento('hidden');
            return;
        }
        datosForm = form.serializeArray();
        
    }

    var request = $.ajax({
        url: url,
        type: "POST",
        context: document.body,
        data: datosForm,
        dataType: "json"

    });

    request.done(function (msg) {
        $.fancybox.close();
        if (msg.resultado != null) {
            if ((msg.resultado) == 'true') {
                alert("se ingresó OK");
                window[fn_callback](msg.redirect);

            } else {
                alert("ERROR");
            }
        }
    });

}

