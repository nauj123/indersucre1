var options_parametro;
var tabla_parametros_asociados;
var info_tabla_parametros_asociados;
var boton_estado;
$(document).ready(function(){

	$("#parametro").html(getParametros()).selectpicker("refresh");

	$("#parametro").on("change", function(){
		getParametroAsociados();
	})

	tabla_parametros_asociados = $("#tabla_parametros_asociados").DataTable({
		autoWidth: false,
		responsive: true,
		pageLength: 50,
		columnDefs: [
		{ "width": "80%", "targets": 0 }
		],
		"language": {
			"lengthMenu": "Ver _MENU_ registros por página",
			"zeroRecords": "No hay información, lo sentimos.",
			"info": "Mostrando página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay registros disponibles",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"search": "Filtrar",
			"paginate": {
				"first": "Primera",
				"last": "Última",
				"next": "Siguiente",
				"previous": "Anterior"
			},
		}
	});

	function getParametros() {
		$.ajax({
			url: "/indersucre/public/administracion/getParametros",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_parametro += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de parámetros, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
		return options_parametro;
	}

	function getParametroAsociados() {
		$.ajax({
			url: "/indersucre/public/administracion/getParametroAsociados",
			type: 'POST',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data:{
				id_parametro: $("#parametro").val()
			},
			success: function(data) {
				info_tabla_parametros_asociados = data;	
				tabla_parametros_asociados.clear().draw();
				info_tabla_parametros_asociados.forEach((value, index) => {
					boton_estado = info_tabla_parametros_asociados[index]["estado"] == 0 ? "<button class='btn btn-block btn-danger edit' data-action='edit' id='estado-parametro-asociado-"+info_tabla_parametros_asociados[index]["id_parametro_detalle"]+"' type='button' data-hide='"+info_tabla_parametros_asociados[index]["estado"]+"' data-id-parametro-asociado='"+info_tabla_parametros_asociados[index]["id_parametro_detalle"]+"'><i class='far fa-eye-slash'></i></button>" : "<button class='btn btn-block btn-success edit' data-action='edit' id='estado-parametro-asociado-"+info_tabla_parametros_asociados[index]["id_parametro_detalle"]+"' type='button' data-hide='"+info_tabla_parametros_asociados[index]["estado"]+"' data-id-parametro-asociado='"+info_tabla_parametros_asociados[index]["id_parametro_detalle"]+"'><i class='far fa-eye'></i></button>"; 
					rowNode = tabla_parametros_asociados.row.add([
						"<span id='parametro-asociado-"+info_tabla_parametros_asociados[index]["id_parametro_detalle"]+"'>"+info_tabla_parametros_asociados[index]["descripcion"]+"</span>",
						"<button type='button' class='btn btn-block btn-warning edit' data-id-parametro-asociado='"+info_tabla_parametros_asociados[index]["id_parametro_detalle"]+"' data-action='edit' data-type='contenido'><i class='far fa-edit'></i></button>",
						boton_estado
						]).draw().node();
				});
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de parámetros, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
	}

	function modificarParametroAsociado(id_parametro_asociado, descripcion_parametro_asociado, estado_parametro_asociado){
		$.ajax({
			url: "/indersucre/public/administracion/modificarParametroAsociado",
			type: 'POST',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data:{
				id_parametro_asociado: id_parametro_asociado,
				descripcion_parametro_asociado: descripcion_parametro_asociado,
				estado_parametro_asociado: estado_parametro_asociado
			},
			success: function(data) {
				getParametroAsociados();
			},
			error: function(data){
				Swal.fire("Error", "No se pudo actualizar el parámetro asociado seleccionado, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
	}

	$("#tabla_parametros_asociados").on("click", ".edit", function(){
		var input_id = "parametro-asociado-"+$(this).attr("data-id-parametro-asociado");
		var input_value = $("#"+input_id).text();

		if($(this).attr("data-action") == "edit"){
			if(!$(this).is('[data-hide]')){
				$("#"+input_id).replaceWith(function(){
					return '<input type="text" class="form-control" id='+input_id+' value="'+input_value+'">';
				});
				$(this).html("").html("<i class='far fa-save'></i>");
				$(this).removeClass("btn-warning").addClass("btn-success");
				$(this).attr("data-action", "save");
			}
			else{
				$(this).attr("data-hide") == 1 ? $(this).html("").html("<i class='far fa-eye-slash'></i>") : $(this).html("").html("<i class='far fa-eye'></i>");
				$(this).attr("data-hide") == 1 ? $(this).removeClass("btn-success").addClass("btn-danger") : $(this).removeClass("btn-danger").addClass("btn-success");
				$(this).attr("data-hide") == 1 ? $(this).attr("data-hide", 0) : $(this).attr("data-hide", 1);
				
				modificarParametroAsociado($(this).attr("data-id-parametro-asociado"), $("#"+input_id).text(), $("#estado-"+input_id).attr("data-hide"))
			}
		}else{
			modificarParametroAsociado($(this).attr("data-id-parametro-asociado"), $("#"+input_id).val(), $("#estado-"+input_id).attr("data-hide"))
		}
	});

	$("#form-nuevo-parametro-asociado").submit(function(e){
		e.preventDefault();
		if($("#parametro").val() != "" || $("#parametro-asociado").val() != ""){
			$.ajax({
				url: "/indersucre/public/administracion/guardarNuevoParametroAsociado",
				type: 'POST',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data:{
					id_parametro: $("#parametro").val(),
					nuevo_parametro_asociado: $("#parametro-asociado").val()
				},
				success: function(data) {
					if(data == 200){
						Swal.fire("Éxito", "Parámetro asociado correctamente", "success");
						$("#parametro-asociado").val("");
						getParametroAsociados();
					}
				},
				error: function(data){
					Swal.fire("Error", "No se pudo guardar el parámetro asociado, por favor inténtelo nuevamente", "error");
				},
				async: false
			});
		}
	});
});