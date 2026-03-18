<?php

namespace App\Models;

use CodeIgniter\Model;

class EvidenciasViajeModel extends Model
{
    protected $table            = 'evidencias_viaje';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_viaje', 'uuid', 'tipo_documento', 
        'nombre_original', 'path_archivo', 'uploaded_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'id_viaje'        => 'required|is_natural_no_zero',
        'uuid'            => 'required|string|max_length[50]|is_unique[evidencias_viaje.uuid]',
        'tipo_documento'  => 'required|in_list[xml,pdf,otro]',
        'nombre_original' => 'required|string|max_length[255]',
        'path_archivo'    => 'required|string|max_length[255]',
        'uploaded_by'     => 'required|is_natural_no_zero'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
