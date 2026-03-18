<?php

namespace App\Models;

use CodeIgniter\Model;

class GastosOperativosModel extends Model
{
    protected $table            = 'gastos_operativos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tractocamion', 'id_viaje', 'tipo_gasto', 'monto', 'fecha', 'descripcion'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_tractocamion' => 'required|is_natural_no_zero',
        'id_viaje'        => 'permit_empty|is_natural_no_zero',
        'tipo_gasto'      => 'required|in_list[diesel,casetas,viaticos,reparacion,otro]',
        'monto'           => 'required|numeric|greater_than[0]',
        'fecha'           => 'required|valid_date',
        'descripcion'     => 'permit_empty|string'
    ];
}
