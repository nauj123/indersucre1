<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administracion\ParametroDetalle;

class ParametrosController extends Controller
{
	public function getDepartamentos(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getDepartamentos();
		return response()->json($resultado[0]);
	}
	public function getMunicipios(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getMunicipios($request->id_departamento);
		return response()->json($resultado[0]);
	}
	public function getTipoUbicacion(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getTipoUbicacion();
		return response()->json($resultado[0]);
	}
	public function getPropiedad(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getPropiedad();
		return response()->json($resultado[0]);
	}
	public function getDeportes(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getDeportes();
		return response()->json($resultado[0]);
	}
	public function getEstadoGeneral(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getEstadoGeneral();
		return response()->json($resultado[0]);
	}
	public function getCategorias(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getCategorias();
		return response()->json($resultado[0]);
	}
	public function getSubCategorias(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getSubCategorias($request->id_categoria);
		return response()->json($resultado[0]);
	}
	public function getParametros(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getParametros();
		return response()->json($resultado[0]);
	}
	public function getParametroAsociados(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getParametroAsociados($request->id_parametro);
		return response()->json(json_decode($resultado), 200);
	}
	public function getSubRegion(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getSubRegion();
		return response()->json($resultado[0]);
	}
	public function getTipoEscenario(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getTipoEscenario();
		return response()->json($resultado[0]);
	}
	public function modificarParametroAsociado(Request $request){
		$parametro = new ParametroDetalle;
		$parametro->where('id_parametro_detalle', $request->id_parametro_asociado)->update(array('descripcion' => $request->descripcion_parametro_asociado, 'estado' => $request->estado_parametro_asociado));
		return $parametro;
	}
	public function guardarNuevoParametroAsociado(Request $request){
		$parametro_asociado = new ParametroDetalle;
		$parametro_asociado->fk_parametro = $request->id_parametro;
		$parametro_asociado->descripcion = $request->nuevo_parametro_asociado;
		$parametro_asociado->estado = 1;
		if($parametro_asociado->save()){
			return 200;
		}
	}
	public function getEps(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getEps();
		return response()->json($resultado[0]);
	}
	public function getGrupoSanguineo(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getGrupoSanguineo();
		return response()->json($resultado[0]);
	}
	public function getDiscapacidades(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getDiscapacidades();
		return response()->json($resultado[0]);
	}	
	public function getNivelEscolaridad(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getNivelEscolaridad();
		return response()->json($resultado[0]);
	}	
	public function getColegios(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getColegios();
		return response()->json($resultado[0]);
	}
	public function getTiposDocumento(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getTiposDocumento();
		return response()->json($resultado[0]);
	}
	public function getroles(Request $request){
		$parametro = new ParametroDetalle;
		$resultado = $parametro->getroles();
		return response()->json($resultado[0]);
	}
}
