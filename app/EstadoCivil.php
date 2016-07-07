<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'tb_estado_civil';
    public $incrementing = false;
    protected $primaryKey = 'id_estado_civil';
    public $timestamps = false;

    protected $fillable = ['id_estado_civil', 'est_descricao'];

    public function pessoas()
    {
        return $this->hasMany('Consulta\Pessoa');
    }

    public static function getEstadoCivil()
    {
        $estadoCivil = EstadoCivil::all();
        $option = "<option value=''></option>";
        foreach($estadoCivil as $linha) {
            $option .= "<option value='$linha->id_estado_civil'> $linha->est_descricao</option>";
        }
        return $option;
    }
}
