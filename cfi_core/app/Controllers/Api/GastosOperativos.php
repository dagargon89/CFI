<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class GastosOperativos extends ResourceController
{
    protected $modelName = 'App\Models\GastosOperativosModel';
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
        return $this->respondCreated(['id' => $this->model->getInsertID()], 'Gasto registrado correctamente');
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound();
        return $this->respond($data);
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->failNotFound('No se pudo eliminar');
        }
        return $this->respondDeleted(['id' => $id], 'Gasto reversado');
    }
}
