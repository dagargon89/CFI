<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Exportacion extends ResourceController
{
    public function gastos()
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('gastos_operativos g');
        $builder->select('g.id, t.economico as tractocamion, g.id_viaje, g.tipo_gasto, g.monto, g.fecha, g.descripcion');
        $builder->join('tractocamiones t', 't.id = g.id_tractocamion', 'left');
        $query = $builder->get();
        $result = $query->getResultArray();

        if(empty($result)) {
            return $this->failNotFound('No hay gastos para exportar');
        }

        $filename = 'gastos_operativos_' . date('Ymd_His') . '.csv';
        
        $output = fopen('php://temp', 'w');
        // BOM for Excel
        fputs($output, $bom =(chr(0xEF) . chr(0xBB) . chr(0xBF)));
        fputcsv($output, array_keys($result[0]));
        foreach ($result as $row) {
            fputcsv($output, $row);
        }
        rewind($output);
        $csvText = stream_get_contents($output);
        fclose($output);

        return $this->response->download($filename, $csvText)->setContentType('text/csv');
    }
}
