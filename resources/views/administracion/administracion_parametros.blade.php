@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection

@section("scripts")
<script src="{{ asset('js/administracion/administracion_parametros.js') }}" defer></script> 

@endsection

@section('contenido')
<div>
	<div class="col-lg-10 offset-1">
		<form id="form-nuevo-parametro-asociado">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<label>Seleccione un párametro</label>
						<select class="form-control selectpicker" id="parametro" data-live-search="true" title="Seleccione una opción" required></select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-11 offset-lg-1">
						<label>Nuevo párametro asociado</label>
					</div>
					<div class="col-lg-9 offset-lg-1">
						<input class="form-control" id="parametro-asociado" type="text" required>
					</div>
					<div class="col-lg-1">
						<button type="submit" class="btn btn-block btn-primary"><i class="fas fa-plus-circle"></i></button>
					</div>
				</div>
			</div>
		</form>
		<div class="form-group">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<table class="table" id="tabla_parametros_asociados">
						<thead>
							<tr>
								<th>Descripción</th>
								<th>Modificar</th>
								<th>Estado</th>
							</tr>
						</thead>
					</table>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection