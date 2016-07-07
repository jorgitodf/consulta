<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class LogradouroTipo extends Model
{
    protected $table = 'tb_logradouro_tipo';
    public $incrementing = false;
    protected $primaryKey = 'id_logradouro_tipo';
    public $timestamps = false;

    protected $fillable = ['id_logradouro_tipo', 'tp_log_descricao'];

    public function logradouros()
    {
        return $this->hasMany('Consulta\Logradouro');
    }

    public static function getAllLogradouroTipo()
    {
        $logTipo = LogradouroTipo::all();
        $option = "<option value=''></option>";
        foreach($logTipo as $linha) {
            $option .= "<option value='$linha->id_logradouro_tipo'> $linha->tp_log_descricao</option>";
        }
        return $option;
    }
}
