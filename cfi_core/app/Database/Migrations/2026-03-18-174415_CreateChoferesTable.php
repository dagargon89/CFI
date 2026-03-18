<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChoferesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'           => ['type' => 'VARCHAR', 'constraint' => '255'],
            'numero_licencia'  => ['type' => 'VARCHAR', 'constraint' => '100', 'unique' => true],
            'status'           => ['type' => 'ENUM', 'constraint' => ['activo', 'inactivo', 'en_viaje'], 'default' => 'activo'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('choferes');
    }

    public function down()
    {
        $this->forge->dropTable('choferes');
    }
}
