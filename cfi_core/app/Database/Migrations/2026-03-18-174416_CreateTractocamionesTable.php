<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTractocamionesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'economico'        => ['type' => 'VARCHAR', 'constraint' => '50', 'unique' => true],
            'placas'           => ['type' => 'VARCHAR', 'constraint' => '50'],
            'status_operativo' => ['type' => 'ENUM', 'constraint' => ['disponible', 'en_ruta', 'taller', 'baja'], 'default' => 'disponible'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tractocamiones');
    }

    public function down()
    {
        $this->forge->dropTable('tractocamiones');
    }
}
