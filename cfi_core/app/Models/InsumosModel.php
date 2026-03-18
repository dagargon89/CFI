<?php

namespace App\Models;

use CodeIgniter\Model;

class InsumosModel extends Model
{
    protected $table            = 'insumos_mantenimiento';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tractocamion', 'nombre_insumo', 'cantidad', 'costo_unitario', 'fecha_consumo'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'id_tractocamion' => 'required|is_natural_no_zero',
        'nombre_insumo'   => 'required|string|max_length[255]',
        'cantidad'        => 'required|numeric',
        'costo_unitario'  => 'required|numeric',
        'fecha_consumo'   => 'required|valid_date'
    ];
}
