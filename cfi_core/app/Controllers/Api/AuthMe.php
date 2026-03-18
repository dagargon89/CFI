<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class AuthMe extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->failUnauthorized();
        }

        return $this->respond([
            'id'       => $user->id,
            'username' => $user->username,
            'email'    => $user->email,
            'groups'   => $user->getGroups(),
        ]);
    }
}
