<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MvpTestDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Limpiar o deshabilitar chequeos de FK momentáneamente
        $this->db->disableForeignKeyChecks();
        $this->db->table('tractocamiones')->truncate();
        $this->db->table('choferes')->truncate();
        $this->db->table('cajas_remolques')->truncate();
        $this->db->table('viajes')->truncate();
        $this->db->table('ordenes_trabajo')->truncate();
        $this->db->enableForeignKeyChecks();

        // 2. Insertar Tractocamiones
        $tractocamiones = [
            ['economico' => 'T-100', 'placas' => '84-AB-1M', 'status_operativo' => 'disponible'],
            ['economico' => 'T-101', 'placas' => '99-XY-2Z', 'status_operativo' => 'en_ruta'],
            ['economico' => 'T-102', 'placas' => '12-QR-4T', 'status_operativo' => 'taller'],
            ['economico' => 'T-103', 'placas' => '15-PL-7N', 'status_operativo' => 'disponible'],
        ];
        $this->db->table('tractocamiones')->insertBatch($tractocamiones);
        
        // Asumiendo los IDs 1 al 4 generados
        
        // 3. Insertar Choferes
        $choferes = [
            ['nombre' => 'Roberto Sánchez', 'numero_licencia' => 'A12345678', 'status' => 'disponible'],
            ['nombre' => 'Luis Mendoza', 'numero_licencia' => 'B87654321', 'status' => 'en_ruta'],
            ['nombre' => 'Carlos Castillo', 'numero_licencia' => 'C11223344', 'status' => 'disponible'],
        ];
        $this->db->table('choferes')->insertBatch($choferes);

        // 4. Insertar Cajas/Remolques
        $cajas = [
            ['economico' => 'C-500', 'subtipo' => 'Seca', 'status' => 'disponible'],
            ['economico' => 'C-501', 'subtipo' => 'Refrigerada', 'status' => 'en_ruta'],
            ['economico' => 'C-502', 'subtipo' => 'Plataforma', 'status' => 'taller'],
        ];
        $this->db->table('cajas_remolques')->insertBatch($cajas);

        // 5. Insertar Viajes de Ejemplo
        // Para id_cliente utilizaremos 1 (simulando que sudo/admin u otro usuario existe ahí)
        $viajes = [
            [
                'id_chofer' => 2,                // Luis Mendoza (ocupado)
                'id_tractocamion' => 2,          // T-101 (en_ruta)
                'id_caja_remolque' => 2,         // C-501 (en_ruta)
                'id_cliente' => 1,
                'origen' => 'Monterrey, NL',
                'destino' => 'Laredo, TX',
                'status' => 'en_ruta',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_chofer' => 1,                // Roberto
                'id_tractocamion' => 1,          // T-100
                'id_caja_remolque' => 1,         // C-500
                'id_cliente' => 1,
                'origen' => 'Guadalajara, JAL',
                'destino' => 'CDMX',
                'status' => 'entregado',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-1 days'))
            ],
        ];
        $this->db->table('viajes')->insertBatch($viajes);

        // 6. Insertar Órdenes de Trabajo (Mantenimiento)
        $ordenes = [
            [
                'id_tractocamion' => 3,          // T-102 (está en taller según insert arriba)
                'fecha_reporte' => date('Y-m-d H:i:s', strtotime('-1 days')),
                'falla_reportada' => 'Fuga de aire en sistema de frenos',
                'nivel_urgencia' => 'AOG',
                'status' => 'abierta',
                'id_viaje' => null, // Ocurrió en patio
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tractocamion' => 1,          // T-100
                'fecha_reporte' => date('Y-m-d H:i:s', strtotime('-5 days')),
                'falla_reportada' => 'Cambio de balatas y aceite preventivo',
                'nivel_urgencia' => 'Rutinaria',
                'status' => 'cerrada',
                'id_viaje' => null, 
                'created_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
        ];
        $this->db->table('ordenes_trabajo')->insertBatch($ordenes);

        echo "Seeder completado: Activos, Choferes, Viajes y Órdenes insertadas. \n";
    }
}
