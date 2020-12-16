<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nome', 'email', 'telefone', 'senha', 'ultimo_login', 'ip_login'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function findByEmail(string $email)
    {
        $sql = "SELECT id FROM usuarios WHERE email = :email:";
        $resultado = $this->db->query($sql, ["email" => $email]);

        return $resultado->getResultArray();
    }

    public function verificaLogin($email, $senha, $ip)
    {
        $sql = "CALL procedimento_login(:email:, :senha:, :ip:)";
        $data = [
            "email" => $email,
            "senha" => $senha,
            "ip" => $ip
        ];
        $resultado = $this->db->query($sql, $data);


        $resultado = $resultado->getResultArray();
        return $resultado[0];
    }

    public function getDadosUsuario($id)
    {
        $sql = "SELECT nome,email,telefone, AES_DECRYPT(senha,'chave') AS senha FROM usuarios WHERE id = :id:";
        $resultado = $this->db->query($sql, ["id" => $id]);

        return $resultado->getResultArray()[0];
    }

    public function criptografar($senha)
    {

        $sql = "SELECT AES_ENCRYPT('$senha', 'chave')";
        $resultado = $this->db->query($sql);

        return $resultado->getResultArray()[0];
    }
    public function descriptografar($senha)
    {

        $sql = "SELECT AES_DECRYPT('$senha', 'chave') AS senha";
        $resultado = $this->db->query($sql);

        return $resultado->getResultArray()[0]['senha'];
    }
}
