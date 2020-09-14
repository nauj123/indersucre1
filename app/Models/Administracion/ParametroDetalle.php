<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParametroDetalle extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'parametro_detalle';
    public $timestamps = false;

    public function getDepartamentos(){
    	$departamentos = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion, '</option>' SEPARATOR '')) as 'option'"))
    	->join("parametro", "id_parametro", "=", "fk_parametro")
    	->where([
    		['fk_parametro', 2],
    		['estado', 1]
    	])
    	->get();
    	return $departamentos;
    }
    public function getMunicipios($id_departamento){
    	$municipios = DB::table('municipio')
    	->select(DB::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_municipio, '\">', nombre_municipio , '</option>' SEPARATOR '')) AS 'option'"))
    	->where('fk_id_departamento', $id_departamento)
    	->get();
    	return $municipios;
    }
    public function getTipoUbicacion(){
    	$tipo_ubicaion = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 11],
    		['estado', 1]
    	])
    	->get();
    	return $tipo_ubicaion;
    }
    public function getPropiedad(){
    	$propiedad = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 12],
    		['estado', 1]
    	])
    	->get();
    	return $propiedad;
    }
    public function getDeportes(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 14],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
    public function getEstadoGeneral(){
    	$estado_general = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 13],
    		['estado', 1]
    	])
    	->get();
    	return $estado_general;
    }
    public function getCategorias(){
    	$categorias = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 10],
    		['estado', 1]
    	])
    	->get();
    	return $categorias;
    }
    public function getSubcategorias($id_categoria){
    	$sub_categorias = DB::table('subcategoria')
    	->select(DB::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_subcategoria, '\">', nombre_subcategoria, '</option>' SEPARATOR '')) AS 'option'"))
    	->where('fk_id_categoria', $id_categoria)
    	->get();
    	return $sub_categorias;
    }
    public function getParametros(){
        $parametros = DB::table('parametro')
        ->select(DB::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro, '\">', nombre, '</option>' SEPARATOR '')) AS 'option'"))
        ->get();
        return $parametros;
    }
    public function getParametroAsociados($id_parametro){
        $categorias = ParametroDetalle::select("id_parametro_detalle", "descripcion", "estado")
        ->where('fk_parametro', $id_parametro)
        ->get();
        return $categorias;
    }
    public function getSubRegion(){
        $sub_regiones = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
        ->where([
            ['fk_parametro', 15],
            ['estado', 1]
        ])
        ->get();
        return $sub_regiones;
    }
    public function getTipoEscenario(){
        $sub_regiones = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
        ->where([
            ['fk_parametro', 9],
            ['estado', 1]
        ])
        ->get();
        return $sub_regiones;
    }
    public function getEps(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 7],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
    public function getGrupoSanguineo(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 6],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
    public function getDiscapacidades(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 5],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
    public function getNivelEscolaridad(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 3],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
    public function getColegios(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 4],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
    public function getTiposDocumento(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 1],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
	}
	public function getroles(){
    	$deportes = ParametroDetalle::select(ParametroDetalle::raw("CONCAT(GROUP_CONCAT('<option value=\"', id_parametro_detalle, '\">', descripcion , '</option>' SEPARATOR '')) AS 'option'"))
    	->where([
    		['fk_parametro', 8],
    		['estado', 1]
    	])
    	->get();
    	return $deportes;
    }
}
