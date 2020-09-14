<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users';
    public $timestamps = false;

    public function getUsuarios(){
    	$sql = "SELECT 
        i.descripcion AS 'tipo_identificacion', 
        u.identificacion AS 'identificacion',
        CONCAT(u.primer_nombre,' ',u.segundo_apellido,' ',u.primer_apellido,' ',u.segundo_apellido) AS 'nombre',
        d.descripcion AS 'departamento', 
        m.nombre_municipio AS 'municipio', 
        u.corregimiento AS 'corregimiento', 
        u.barrio AS 'barrio', 
        u.direccion AS 'direccion', 
        u.fecha_nacimiento AS 'fecha_nacimiento', 
        u.email AS 'email',
        u.celular AS 'celular', 
        u.telefono_movil AS 'telefono', 
        e.descripcion AS 'escolaridad', 
        u.profesion AS 'profesion',
        (CASE WHEN u.estudiante = '1' THEN 'SI' WHEN u.estudiante = '2' THEN 'NO' END) AS 'estudiante',  
        c.descripcion AS 'escolaridad',
        s.descripcion AS 'discapacidad',
        g.descripcion AS 'grupo_sanguineo',
        p.descripcion AS 'eps', 
        r.descripcion AS 'rol' 
        FROM users u
        JOIN parametro_detalle i ON i.id_parametro_detalle = u.fk_tipo_documento AND i.fk_parametro = 1
        LEFT JOIN parametro_detalle d ON d.id_parametro_detalle = u.fk_departamento AND d.fk_parametro = 2
        LEFT JOIN municipio m ON m.id_municipio = u.fk_municipio
        LEFT JOIN parametro_detalle e ON e.id_parametro_detalle = u.nivel_escolaridad AND e.fk_parametro = 3
        LEFT JOIN parametro_detalle c ON c.id_parametro_detalle = u.Colegio AND c.fk_parametro = 4
        LEFT JOIN parametro_detalle s ON s.id_parametro_detalle = u.discapacidad AND s.fk_parametro = 5
        LEFT JOIN parametro_detalle g ON g.id_parametro_detalle = u.tipo_sangre AND g.fk_parametro = 6
        LEFT JOIN parametro_detalle p ON p.id_parametro_detalle = u.Eps AND p.fk_parametro = 7
        LEFT JOIN parametro_detalle r ON r.id_parametro_detalle = u.Rol AND r.fk_parametro = 8";
    	$informacion = DB::select($sql);
    	return $informacion;
    }
}
