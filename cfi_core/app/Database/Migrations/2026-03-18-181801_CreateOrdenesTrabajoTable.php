<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdenesTrabajoTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_tractocamion'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_caja_remolque'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_usuario_reporta' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'checklist_fallas'   => ['type' => 'JSON', 'null' => true],
            'descripcion_falla'  => ['type' => 'TEXT', 'null' => true],
            'prioridad'          => ['type' => 'ENUM', 'constraint' => ['alta', 'media', 'baja'], 'default' => 'media'],
            'status'             => ['type' => 'ENUM', 'constraint' => ['abierta', 'en_proceso', 'cerrada'], 'default' => 'abierta'],
            'costo_estimado'     => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
            'fecha_resolucion'   => ['type' => 'DATETIME', 'null' => true],
            'created_at'         => ['type' => 'DATETIME', 'null' => true],
            'updated_at'         => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'         => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_tractocamion', 'tractocamiones', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_caja_remolque', 'cajas_remolques', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_usuario_reporta', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ordenes_trabajo');
    }

    public function down()
    {
        $this->forge->dropTable('ordenes_trabajo');
    }
}
