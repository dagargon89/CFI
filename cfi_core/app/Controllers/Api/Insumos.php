<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Insumos extends ResourceController
{
    protected $modelName = 'App\Models\InsumosModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();
        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respondCreated(['id' => $this->model->getInsertID()], 'Insumo registrado');
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) return $this->failNotFound();
        return $this->respondDeleted(['id' => $id]);
    }
}
