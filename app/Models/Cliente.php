<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Util\RuleManager;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "clientes";
    protected $primaryKey = "idcliente";
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'estado',
        'fecharegistro',
    ];

    protected $casts = [
        'fecharegistro' => 'datetime:Y-m-d H:i:s',
    ];

    //$appends para crear nuevos atributos si necesitamos en la api Json
    protected $appends = [
        'isactive',
        'statename',
        'fecha',
    ];

    //para crear la funcion que indicara que valor tomar a los atrubutos dentro de appends se tiene que crear
    //las funciones es con este formato: get+Nombre+Attribute()
    public function getIsactiveAttribute(){
        return RuleManager::getIsActive($this->estado);
    }

    public function getStatenameAttribute(){
        return RuleManager::getStateName($this->estado);
    }

    public function getFechaAttribute(){
        return optional($this->fecharegistro)->format('d-m-y');
    }


}
