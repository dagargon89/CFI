<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEvidenciasViajeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_viaje'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'uuid'             => ['type' => 'VARCHAR', 'constraint' => '50', 'unique' => true],
            'tipo_documento'   => ['type' => 'ENUM', 'constraint' => ['xml', 'pdf', 'otro'], 'default' => 'otro'],
            'nombre_original'  => ['type' => 'VARCHAR', 'constraint' => '255'],
            'path_archivo'     => ['type' => 'VARCHAR', 'constraint' => '255'],
            'uploaded_by'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_viaje', 'viajes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('uploaded_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('evidencias_viaje');
    }

    public function down()
    {
        $this->forge->dropTable('evidencias_viaje');
    }
}
