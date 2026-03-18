<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInsumosTableMigration extends Migration
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
            'nombre_insumo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'cantidad' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 1.00,
            ],
            'costo_unitario' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'fecha_consumo' => [
                'type' => 'DATE',
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
        $this->forge->createTable('insumos_mantenimiento');
    }

    public function down()
    {
        $this->forge->dropTable('insumos_mantenimiento');
    }
}
