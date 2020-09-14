<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios\Users;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
	public function guardarNuevousuario(Request $request){
		$usuario = new Users;
		$usuario->primer_nombre = $request->primer_nombre;
		$usuario->segundo_nombre = $request->segundo_nombre; 
		$usuario->primer_apellido = $request->primer_apellido;  
		$usuario->segundo_apellido = $request->segundo_apellido;   
		$usuario->fk_tipo_documento = $request->tipo_documento; 
		$usuario->identificacion = $request->identificacion;    
		$usuario->fk_departamento = $request->departamento;       
		$usuario->fk_municipio = $request->municipio;    
		$usuario->corregimiento = $request->corregimiento;
		$usuario->barrio = $request->barrio;            
		$usuario->direccion = $request->direccion;    
		$usuario->fecha_nacimiento = $request->fecha_nacimiento;   
		$usuario->email = $request->email;
		$usuario->email = $request->email_verificacion;
		$usuario->celular = $request->celular;             
		$usuario->telefono_movil = $request->telefono;   
		$usuario->nivel_escolaridad = $request->escolaridad;    
		$usuario->profesion = $request->profesion;    
		$usuario->estudiante = $request->estudiante;     
		$usuario->Colegio = $request->colegio;             
		$usuario->discapacidad = $request->discapacidad;       
		$usuario->tipo_sangre = $request->grupo_sanguineo;  
		$usuario->Eps = $request->eps;
		$usuario->Rol = $request->rol1;	
		if ($request->rol1 == '175'){
			$usuario->password = NULL;
		}else{
			$usuario->password = Hash::make($request->identificacion);
		}
		
		if($usuario->save()){
			return 200;
		}
	}

	public function getUsuarios(Request $request){
		$usuario = new Users;
		$resultado = $usuario->getUsuarios();
		return response()->json($resultado, 200);
	}

	
}
