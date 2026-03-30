<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateViajesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_chofer'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_tractocamion'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_caja_remolque' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_cliente'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'origen'           => ['type' => 'VARCHAR', 'constraint' => '255'],
            'destino'          => ['type' => 'VARCHAR', 'constraint' => '255'],
            'status'           => ['type' => 'ENUM', 'constraint' => ['creado', 'en_ruta', 'entregado', 'cancelado'], 'default' => 'creado'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_chofer', 'choferes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tractocamion', 'tractocamiones', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_caja_remolque', 'cajas_remolques', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_cliente', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('viajes');
    }

    public function down()
    {
        $this->forge->dropTable('viajes');
    }
}
