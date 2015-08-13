var CI_ROOT = "http://www.lortel.cl/sport/";


$(document).ready(function () {

    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
    $('#hora_entrenamiento').timepicker();
    
    
  $('.calendario').each(function () {
     datepickear($(this));
  });
  

});
function datepickear(obj){
  var fecha = obj.val();
  obj.datepicker( );
  obj.datepicker("option", "dateFormat",  'dd-mm-yy');
  obj.datepicker( "setDate", fecha );     
}
function crear_proyecto() {

    var url = CI_ROOT + "proyecto/crear";
    validarYEnviarFormGenerico(null, $('#form_crear_proy'), url);
    // limpiaForm($('#form_crear_proy'));
}

//Retorna 20% tecnocom
function retornar20Porciento(num) {
    var return_value = (num * 20) / 100;
    console.log(return_value);
    $("#20tecnocom").val(return_value);


}
function actualizarPagina() {
    location.reload();
}
function validarYEnviarFormGenerico(datosForm, form, url) {

    if (typeof datosForm == 'undefined' || datosForm == null) {
        form.bValidator(opbValidator);
        form.data('bValidator').validate();
        if (!form.data('bValidator').isValid()) {
            return;
        }
        datosForm = form.serializeArray();
    }

    //limpiaForm(form);     
    /// $.fancybox.showLoading()

    var request = $.ajax({
        url: url,
        type: "POST",
        context: document.body,
        data: datosForm,
        dataType: "json"

    });

    request.done(function (msg) {
        //	alert("aa");

        if (msg.resultado != null) {
            if ((msg.resultado) == 'true') {

            } else {

            }
        }
    });



}