var options_departamento; 
var options_municipio;
var options_eps;
var options_gruposanguineo;
var options_discapacidades;
var options_escolaridad;
var options_colegios;
var options_tipodocumento;
var options_roles;
var tabla_info_usuarios;
var info_tabla_info_usuarios;

$(document).ready(function(){

	getDepartamentos();

	$("#rol").html(getroles).selectpicker("refresh");
	$("#tipo-documento").html(getTiposDocumento).selectpicker("refresh");
	$("#departamento").html(options_departamento).change(function(){
		$("#municipio").html(getMunicipios()).selectpicker("refresh");
	}).selectpicker("refresh");
	$("#eps").html(getEps).selectpicker("refresh");
	$("#grupo-sanguineo").html(getGrupoSanguineo).selectpicker("refresh");
	$("#discapacidad").html(getDiscapacidades).selectpicker("refresh");
	$("#nivel-escolaridad").html(getNivelEscolaridad).selectpicker("refresh");
	$("#colegio").html(getColegios).selectpicker("refresh");


	function getroles() {
		$.ajax({
			url: "/indersucre/public/administracion/getroles",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_roles += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de roles de usaurio, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
		return options_roles;
	}

	function getDepartamentos() {
		$.ajax({
			url: "/indersucre/public/administracion/getDepartamentos",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_departamento += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de departamentos, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
		return options_departamento;
	}

	function getMunicipios() {
		var options_municipio = "";
		$.ajax({
			url: "/indersucre/public/administracion/getMunicipios",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data:{
				id_departamento: $("#departamento").val()
			},
			success: function(data) {
				options_municipio += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de municipios, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
		return options_municipio;
	}

	function getEps() {
		$.ajax({
			url: "/indersucre/public/administracion/getEps",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_eps += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de las eps, por favor inténtelo nunpevamente", "error");
			},
			async: false
		});
		return options_eps;
	}

	function getGrupoSanguineo() {
		$.ajax({
			url: "/indersucre/public/administracion/getGrupoSanguineo",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_gruposanguineo += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado del grupo sanguineo, por favor inténtelo nunpevamente", "error");
			},
			async: false
		});
		return options_gruposanguineo;
	}
	
	function getDiscapacidades() {
		$.ajax({
			url: "/indersucre/public/administracion/getDiscapacidades",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_discapacidades += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de discapacidades, por favor inténtelo nunpevamente", "error");
			},
			async: false
		});
		return options_discapacidades;
	}

	function getNivelEscolaridad() {
		$.ajax({
			url: "/indersucre/public/administracion/getNivelEscolaridad",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_escolaridad += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de niveles de escolaridad, por favor inténtelo nunpevamente", "error");
			},
			async: false
		});
		return options_escolaridad;
	}

	function getColegios() {
		$.ajax({
			url: "/indersucre/public/administracion/getColegios",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_colegios += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de colegios, por favor inténtelo nunpevamente", "error");
			},
			async: false
		});
		return options_colegios;
	}
	
	function getTiposDocumento() {
		$.ajax({
			url: "/indersucre/public/administracion/getTiposDocumento",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				options_tipodocumento += data["option"];
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado Tipo de documento, por favor inténtelo nunpevamente", "error");
			},
			async: false
		});
		return options_tipodocumento;
	}

	$("#form-nuevo-usuario").submit(function(e){
		e.preventDefault();		
			$.ajax({
				url: "/indersucre/public/usuarios/guardarNuevoUsuario",
				type: 'POST',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data:{
					primer_nombre: $("#primer_nombre").val(),
					segundo_nombre: $("#segundo_nombre").val(),
					primer_apellido: $("#primer_apellido").val(),
					segundo_apellido: $("#segundo_apellido").val(),
					tipo_documento: $("#tipo-documento").val(),
					identificacion: $("#documento").val(),
					departamento: $("#departamento").val(),
					municipio: $("#municipio").val(),
					corregimiento: $("#corregimiento").val(),
					barrio: $("#barrio").val(),
					direccion: $("#direccion").val(),
					fecha_nacimiento: $("#fecha-nacimiento").val(),
					email: $("#email").val(),
					email_verificacion: $("#email").val(),
					celular: $("#celular").val(),
					telefono: $("#telefono").val(),
					escolaridad: $("#nivel-escolaridad").val(),
					profesion: $("#profesion").val(),
					estudiante: $("#estudiante").val(),
					colegio: $("#colegio").val(),
					discapacidad: $("#discapacidad").val(),
					grupo_sanguineo: $("#grupo-sanguineo").val(),					
					eps: $("#eps").val(),
					rol1: $("#rol").val()
					
				},
				success: function(data) {
					if(data == 200){
						Swal.fire("Éxito", "Usuario registrado correctamente", "success");
						$(":input").val("");
						$('.selectpicker').selectpicker('val', '');					
					}
				},
				error: function(data){
					Swal.fire("Error", "No se pudo guardar el usuario, por favor inténtelo nuevamente", "error");
				},
				async: false
			});		
	});

	$('a[href="#consulta_usuario"]').on('shown.bs.tab', function(e){
		getUsuarios();
		$($.fn.dataTable.tables(true)).DataTable()
		.columns.adjust()
		.responsive.recalc();
	});

	tabla_info_usuarios = $("#tabla-info-usuarios").DataTable({
		pageLength: 50,
		lengthChange: false,
		responsive: true,
		dom: 'Bfrtip',
		buttons: [{
			extend: 'excel',
			text: 'Descargar datos',
			filename: 'Datos'
		}],
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
	getUsuarios();

	function getUsuarios() {
		$.ajax({
			url: "/indersucre/public/usuarios/getUsuarios",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				info_tabla_info_usuarios = data;	
				tabla_info_usuarios.clear().draw();
				info_tabla_info_usuarios.forEach((value, index) => {

					rowNode = tabla_info_usuarios.row.add([
						info_tabla_info_usuarios[index]["identificacion"],
						info_tabla_info_usuarios[index]["tipo_identificacion"],
						info_tabla_info_usuarios[index]["nombre"],
						info_tabla_info_usuarios[index]["departamento"],
						info_tabla_info_usuarios[index]["municipio"],
						info_tabla_info_usuarios[index]["corregimiento"],
						info_tabla_info_usuarios[index]["barrio"],
						info_tabla_info_usuarios[index]["direccion"],
						info_tabla_info_usuarios[index]["fecha_nacimiento"],
						info_tabla_info_usuarios[index]["email"],
						info_tabla_info_usuarios[index]["celular"],
						info_tabla_info_usuarios[index]["escolaridad"],
						info_tabla_info_usuarios[index]["profesion"],
						info_tabla_info_usuarios[index]["estudiante"],
						info_tabla_info_usuarios[index]["discapacidad"],
						info_tabla_info_usuarios[index]["grupo_sanguineo"],
						info_tabla_info_usuarios[index]["eps"],
						info_tabla_info_usuarios[index]["rol"],
						"<buton class='btn btn-warning'> editar</buton>"
						]).draw().node();
				});
			},
			error: function(data){
				Swal.fire("Error", "No se pudo obtener el listado de tipos de escenario, por favor inténtelo nuevamente", "error");
			},
			async: false
		});
		return options_tipodocumento;
	}
});