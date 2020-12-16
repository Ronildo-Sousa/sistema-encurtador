<?php namespace App\Controllers;

use App\Models\UrlModel;
use App\Models\UsersModel;

class User extends BaseController
{
	

	public function editCont()
    {
        $nome = filter_var($this->request->getPost("nome"), FILTER_SANITIZE_STRING);
        $email = filter_var($this->request->getPost("email"), FILTER_SANITIZE_EMAIL);
        $telefone = filter_var($this->request->getPost("telefone"), FILTER_SANITIZE_NUMBER_INT);
        $senha = filter_var($this->request->getPost("senha"), FILTER_SANITIZE_STRING);


        $id_usuario = $this->session->get("id_usuario");
        $userModel = new UsersModel();

        $senhaSegura =  $userModel->criptografar($senha);


        if ($userModel->findByEmail($email)[0] == $id_usuario) {

            $data = [
                "nome" => $nome,
                "email" => $email,
                "telefone" => $telefone,
                "senha" => array_shift($senhaSegura)
            ];

            $userModel->update($id_usuario, $data);

            $this->session->setFlashdata("sucesso", "Dados atualizados com sucesso!");
            return redirect()->to(base_url("/minha-conta"));
        } else {
            $this->session->setFlashdata("erro", "Email Indisponível!");
            return redirect()->to(base_url("/minha-conta"));
        }

    }

    public function deleteUrl()
    {
        $urlModel = new UrlModel();

        $idUrl = $this->request->getPost("idUrl");    
      
        $urlModel->delete($idUrl);
     

        $this->session->setFlashdata("sucesso", "Url excluída com sucesso !");
        return redirect()->to(base_url("/minhas-urls"));
    }

}
