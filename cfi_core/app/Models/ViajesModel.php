<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DataException;

class ViajesModel extends Model
{
    protected $table            = 'viajes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_chofer', 'id_tractocamion', 'id_caja_remolque', 
        'id_cliente', 'origen', 'destino', 'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'id_chofer'       => 'required|is_natural_no_zero',
        'id_tractocamion' => 'required|is_natural_no_zero',
        'id_cliente'      => 'required|is_natural_no_zero',
        'origen'          => 'required|string|max_length[255]',
        'destino'         => 'required|string|max_length[255]',
        'status'          => 'in_list[creado,en_ruta,entregado,cancelado]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['checkActiveTrips'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Validación Cruzada (Business Logic)
     * Verifica que un chofer o tractocamión no tengan un viaje en curso.
     */
    protected function checkActiveTrips(array $data)
    {
        if (isset($data['data']['id_chofer'])) {
            $activeTrips = $this->where('id_chofer', $data['data']['id_chofer'])
                                ->whereIn('status', ['creado', 'en_ruta'])
                                ->countAllResults();
            if ($activeTrips > 0) {
                throw new DataException('El chofer ya tiene un viaje activo.');
            }
        }

        if (isset($data['data']['id_tractocamion'])) {
            $activeTrucks = $this->where('id_tractocamion', $data['data']['id_tractocamion'])
                                 ->whereIn('status', ['creado', 'en_ruta'])
                                 ->countAllResults();
            if ($activeTrucks > 0) {
                throw new DataException('El tractocamión ya está asignado a un viaje activo.');
            }
        }

        return $data;
    }
}
