<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Files\File;

class Evidencias extends ResourceController
{
    protected $modelName = 'App\Models\EvidenciasViajeModel';
    protected $format    = 'json';

    public function index()
    {
        $user = auth()->user();
        if ($user && $user->inGroup('cliente')) {
            return $this->respond($this->model
                ->select('evidencias_viaje.*')
                ->join('viajes', 'viajes.id = evidencias_viaje.id_viaje')
                ->where('viajes.id_cliente', $user->id)
                ->findAll());
        }
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $validationRule = [
            'evidencia' => [
                'label' => 'Archivo de Evidencia',
                'rules' => [
                    'uploaded[evidencia]',
                    'mime_in[evidencia,application/pdf,application/xml,text/xml]',
                    'ext_in[evidencia,pdf,xml]',
                    'max_size[evidencia,10240]', // 10MB
                ],
            ],
            'id_viaje' => 'required|is_natural_no_zero'
        ];

        if (! $this->validate($validationRule)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $file = $this->request->getFile('evidencia');
        if (! $file->hasMoved()) {
            // Guardar dentro de la Fosa Ciega (WRITEPATH)
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/evidencias', $newName);

            $uuid = bin2hex(random_bytes(16));
            $data = [
                'id_viaje'         => $this->request->getPost('id_viaje'),
                'uuid'             => $uuid,
                'tipo_documento'   => $file->getExtension() === 'pdf' ? 'pdf' : 'xml',
                'nombre_original'  => $file->getClientName(),
                'path_archivo'     => $newName,
                'uploaded_by'      => 1 // Default to 1 while auth is mock in dev
            ];

            if (!$this->model->insert($data)) {
                 return $this->failValidationErrors($this->model->errors());
            }

            return $this->respondCreated(['uuid' => $uuid], 'Archivo subido de forma segura.');
        }
        
        return $this->fail('Error en la carga del archivo.');
    }

    public function show($uuid = null)
    {
        $evidencia = $this->model->where('uuid', $uuid)->first();
        
        if (!$evidencia) {
            return $this->failNotFound('Archivo no encontrado o sin privilegios de acceso.');
        }

        $filepath = WRITEPATH . 'uploads/evidencias/' . $evidencia['path_archivo'];
        if (!file_exists($filepath)) {
            return $this->failNotFound('El binario físico no existe en el almacenamiento seguro.');
        }

        // Output sanitizado (forzar descarga binaria en lugar de abrir directo si se desea)
        return $this->response->download($filepath, null)->setFileName($evidencia['nombre_original']);
    }
}
