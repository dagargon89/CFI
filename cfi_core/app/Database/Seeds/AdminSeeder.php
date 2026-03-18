<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();
        
        // Administrador Global
        $admin = new User([
            'username' => 'sudo',
            'email'    => 'sudo@cfi.test',
            'password' => 'Dataholics2026',
        ]);
        
        $users->save($admin);
        $admin = $users->findById($users->getInsertID());
        $admin->addGroup('admin');

        // Cliente de Prueba
        $cliente = new User([
            'username' => 'cliente_demo',
            'email'    => 'cliente@cfi.test',
            'password' => 'Cliente2026',
        ]);
        
        $users->save($cliente);
        $cliente = $users->findById($users->getInsertID());
        $cliente->addGroup('cliente');
    }
}
