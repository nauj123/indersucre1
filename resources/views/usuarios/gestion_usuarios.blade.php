@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection

@section("scripts")
<!-- <script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script> -->
<script src="{{ asset('js/usuarios/usuarios.js') }}" defer></script>

@endsection

@section('contenido')


<h2>Administración de Usuarios</h2>
<div class="container-fluid">
	<div class="panel-body">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#creacion_usuario">Creación de usuario</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#consulta_usuario">Consultar y edición de usuarios</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="creacion_usuario">
				<div class="card" id="nuevo-usuario-contenedor">
					<div class="card-header bg-primary text-white">Creación de usuario</div>
					<div class="card-body">
						<form id="form-nuevo-usuario">
							<div class="form-group">
								<div class="row">
									<div class="col-xs-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">
										<br>
									</div>
									<div class="col-xs-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">
										<label>Tipo de usuario:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="rol" required></select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-12 col-md-6 col-lg-6">
										<label>Tipo de documento:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="tipo-documento" required></select>

									</div>
									<div class="col-xs-12 col-md-6 col-lg-6">
										<label>Número de documento:</label>
										<input class="form-control" type="text" id="documento" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Pimer nombre:</label>
										<input class="form-control" type="text" id="primer_nombre" required>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Segundo nombre:</label>
										<input class="form-control" type="text" id="segundo_nombre">
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Primer apellido:</label>
										<input class="form-control" type="text" id="primer_apellido" required>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Segundo apellido:</label>
										<input class="form-control" type="text" id="segundo_apellido">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Departamento:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="departamento" required></select>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Municipio:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="municipio" required></select>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Corregimiento</label>
										<input class="form-control" type="text" id="corregimiento">
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Barrio:</label>
										<input class="form-control" type="text" id="barrio" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Dirección:</label>
										<input class="form-control" type="text" id="direccion" required>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Celular:</label>
										<input class="form-control" type="text" id="celular" required>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Teléfono:</label>
										<input class="form-control" type="text" id="telefono">
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Email:</label>
										<input class="form-control" type="email" id="email" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Fecha de nacimiento</label>
										<input class="form-control" type="date" id="fecha-nacimiento">
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Eps:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="eps"></select>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Grupo Sanguineo:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="grupo-sanguineo" required></select>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Discapacidad:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="discapacidad" required></select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Nivel de escolaridad:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="nivel-escolaridad" required></select>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Profesión:</label>
										<input class="form-control" type="text" id="profesion">
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Estudiante:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="estudiante" required>
											<option value='1'>SI</option>
											<option value='2'>NO</option>
										</select>
									</div>
									<div class="col-xs-6 col-md-3 col-lg-3">
										<label>Colegio:</label>
										<select class="form-control selectpicker" title="Seleccione una opción" id="colegio"></select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-4 offset-lg-4">
									<button class="btn btn-block btn-primary" type="submit">Guardar Registro</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="consulta_usuario">
				<table class="table nowrap" id="tabla-info-usuarios" style="width: 100%;">
					<thead>
						<tr>
							<th>Identificación</th>
							<th>Tipo de identificación</th>
							<th>Nombre usuario</th>
							<th>departamento</th>
							<th>Municipio</th>
							<th>Corregimiento</th>
							<th>Barrio</th>
							<th>Dirección</th>
							<th>Fecha de nacimiento</th>
							<th>Email</th>
							<th>Celular</th>
							<th>Escolaridad</th>
							<th>Profesión</th>
							<th>Estudiante</th>
							<th>Discapacidad</th>
							<th>Grupo Sanguineo</th>
							<th>Eps</th>
							<th>Rol</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

		</div>
	</div>
</div>
@endsection