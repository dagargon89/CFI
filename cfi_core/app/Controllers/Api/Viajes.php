<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DataException;

class Viajes extends ResourceController
{
    protected $modelName = 'App\Models\ViajesModel';
    protected $format    = 'json';

    public function index()
    {
        $user = auth()->user();
        
        // RBAC: Si es cliente, SOLO ve sus propios viajes
        if ($user && $user->inGroup('cliente')) {
            $this->model->where('id_cliente', $user->id);
        }

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
        
        try {
            if (!$this->model->insert($data)) {
                return $this->failValidationErrors($this->model->errors());
            }
            return $this->respondCreated(['id' => $this->model->getInsertID()], 'Creado exitosamente');
        } catch (DataException $e) {
            return $this->failValidationError($e->getMessage());
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true) ?? $this->request->getRawInput();
        
        try {
            if (!$this->model->update($id, $data)) {
                return $this->failValidationErrors($this->model->errors());
            }
            return $this->respond(['message' => 'Actualizado exitosamente']);
        } catch (DataException $e) {
            return $this->failValidationError($e->getMessage());
        }
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->failNotFound();
        }
        return $this->respondDeleted(['id' => $id], 'Eliminado exitosamente');
    }
}
