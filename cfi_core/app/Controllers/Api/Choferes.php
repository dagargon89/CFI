<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Choferes extends ResourceController
{
    protected $modelName = 'App\Models\ChoferesModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound();
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();
        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respondCreated(['id' => $this->model->getInsertID()], 'Creado exitosamente');
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true) ?? $this->request->getRawInput();
        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respond(['message' => 'Actualizado exitosamente']);
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->failNotFound();
        }
        return $this->respondDeleted(['id' => $id], 'Eliminado exitosamente');
    }
}
