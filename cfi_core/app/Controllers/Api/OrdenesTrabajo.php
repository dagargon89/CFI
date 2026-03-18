<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class OrdenesTrabajo extends ResourceController
{
    protected $modelName = 'App\Models\OrdenesTrabajoModel';
    protected $format    = 'json';

    public function index()
    {
        // Enviar resultados ordenados por prioridad en un escenario real, pero findAll basta
        return $this->respond($this->model->orderBy('created_at', 'DESC')->findAll());
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
        
        // User identity mockup para entorno local
        if (!isset($data['id_usuario_reporta'])) {
            $data['id_usuario_reporta'] = 1; 
        }
        
        // Reglas operativas dictan que inicia abierta
        if (!isset($data['status'])) {
            $data['status'] = 'abierta';
        }

        // Parse Checklist
        if (isset($data['checklist_fallas']) && is_array($data['checklist_fallas'])) {
            $data['checklist_fallas'] = json_encode($data['checklist_fallas']);
        }

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        
        return $this->respondCreated(['id' => $this->model->getInsertID()], 'Orden de Trabajo creada exitosamente desde Reporte Móvil');
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true) ?? $this->request->getRawInput();
        
        if (isset($data['checklist_fallas']) && is_array($data['checklist_fallas'])) {
            $data['checklist_fallas'] = json_encode($data['checklist_fallas']);
        }

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respond(['message' => 'Orden de trabajo actualizada']);
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->failNotFound();
        }
        return $this->respondDeleted(['id' => $id], 'Orden de trabajo eliminada');
    }
}
