/* 
 * Funciones generales de pantalla de busqueda de ruta
 */



function unirse_entrenamiento(entrenamiento_id) {
  
    var url = CI_ROOT + "entrenamiento/unirse_entrenamiento";
    $.ajax({
		dataType: 'json',
		type: 'POST',
		url: url,
		async: true,
		data: "entrenamamiento_id=" + entrenamiento_id,
		success: function (data) {
			// alert(data.resultado);
			if (data.resultado == 'true') {
				
                              $("#unirse"+entrenamiento_id).val("Participando");  
			}else{
                            
                        }
		}
	});
}
