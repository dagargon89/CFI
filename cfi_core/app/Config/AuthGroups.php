<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'cliente';

    public array $groups = [
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Control total del sistema',
        ],
        'finanzas' => [
            'title'       => 'Finanzas',
            'description' => 'Visualización de costos, auditoría de viajes',
        ],
        'mantenimiento' => [
            'title'       => 'Mantenimiento',
            'description' => 'Órdenes de trabajo, inventario, reportes de fallas',
        ],
        'trafico' => [
            'title'       => 'Tráfico',
            'description' => 'Asignación de viajes, control de unidades',
        ],
        'cliente' => [
            'title'       => 'Cliente',
            'description' => 'Solo visualiza sus propios viajes',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'    => 'Acceso a la administración',
        'viajes.ver'      => 'Ver viajes',
        'viajes.crear'    => 'Crear viajes',
        'unidades.ver'    => 'Ver unidades',
        'unidades.crear'  => 'Crear unidades',
    ];

    public array $matrix = [
        'admin'         => ['*.*'],
        'finanzas'      => ['viajes.ver', 'unidades.ver'],
        'mantenimiento' => ['unidades.ver'],
        'trafico'       => ['viajes.*', 'unidades.*'],
        'cliente'       => ['viajes.ver'],
    ];
}
