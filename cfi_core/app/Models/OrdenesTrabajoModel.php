<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdenesTrabajoModel extends Model
{
    protected $table            = 'ordenes_trabajo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_tractocamion', 'id_caja_remolque', 'id_usuario_reporta', 
        'checklist_fallas', 'descripcion_falla', 'prioridad', 
        'status', 'costo_estimado', 'fecha_resolucion'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation Zero-Trust
    protected $validationRules = [
        'id_usuario_reporta' => 'required|is_natural_no_zero',
        'checklist_fallas'   => 'permit_empty|valid_json',
        'prioridad'          => 'in_list[alta,media,baja]',
        'status'             => 'in_list[abierta,en_proceso,cerrada]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
