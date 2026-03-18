<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GastosOperativosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tractocamion' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_viaje' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'tipo_gasto' => [
                'type'       => 'ENUM',
                'constraint' => ['diesel', 'casetas', 'viaticos', 'reparacion', 'otro'],
                'default'    => 'otro',
            ],
            'monto' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha' => [
                'type' => 'DATE',
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_tractocamion', 'tractocamiones', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('id_viaje', 'viajes', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('gastos_operativos');
    }

    public function down()
    {
        $this->forge->dropTable('gastos_operativos');
    }
}
