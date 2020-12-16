<?php

namespace App\Models;

use CodeIgniter\Model;

class RecuperacaoModel extends Model
{
    protected $table      = 'codigos_recuperacao';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['data', 'codigo', 'id_usuario'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    
}