<?php

namespace App\Controllers;

use App\Models\RecuperacaoModel;
use App\Models\UsersModel;
use DateTime;

class Auth extends BaseController
{

    public function register()
    {
        $userModel = new UsersModel();


        $nome = filter_var($this->request->getPost('nome'), FILTER_SANITIZE_STRING);
        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $telefone = filter_var($this->request->getPost('telefone'), FILTER_SANITIZE_NUMBER_INT);
        $senha = filter_var($this->request->getPost('senha'), FILTER_SANITIZE_STRING);
        $confirmasenha = filter_var($this->request->getPost('confirmarsenha'), FILTER_SANITIZE_STRING);
        $ip = $this->geraIp();

        $this->session->set([
            "info_cads" => [
                "nome" => $nome,
                "email" => $email,
                "telefone" => $telefone
            ]
        ]);

        if (!$userModel->findByEmail($email)) {
            if ($senha === $confirmasenha) {
                $senhaSegura = $userModel->criptografar($senha);

                $data = [
                    'nome' => $nome,
                    'senha' => $senhaSegura,
                    'email' => $email,
                    'telefone' => $telefone,
                    'ip_login' => $ip
                ];

                $userModel->insert($data);

                $id_usuario = $userModel->findByEmail($email);
                $nome = $userModel->find($id_usuario[0])[0]->nome;

                $data = [
                    "id_usuario" => $id_usuario[0]['id']
                ];

                $this->session->set($data);
                $this->session->setFlashdata("nome_usuario", substr($nome, 0, strpos($nome, " ")));
                return redirect()->to(base_url("/home"));
            } else {
                $this->session->setFlashdata("erro", "Senha diferentes!");
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata("erro", "Email indisponível!");
            return redirect()->back();
        }
    }


    public function login()
    {

        $email = filter_var($this->request->getPost("email"), FILTER_SANITIZE_EMAIL);
        $senha = filter_var($this->request->getPost("senha"), FILTER_SANITIZE_STRING);
        $ip = $this->geraIp();

        $this->session->set([
            "info_login" => ["email" => $email]
        ]);

        $userModel = new UsersModel();
        $verificado = $userModel->verificaLogin($email, $senha, $ip);
        $verificado = array_search("1", $verificado);

        if ($verificado) {
            $id_usuario = $userModel->findByEmail($email);
            $nome = $userModel->find($id_usuario[0])[0]->nome;
            $data = [
                "id_usuario" => $id_usuario[0]
            ];

            $this->session->set($data);
            $this->session->setFlashdata("nome_usuario", substr($nome, 0, strpos($nome, " ")));

            $date = new DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $userModel->update($id_usuario[0], ["ultimo_login" => $date, "ip_login" => $ip]);

            return redirect()->to(base_url("/home"));
        } else {
            $this->session->setFlashdata("erro", "Usuário ou senha incorretos !");
            return redirect()->back();
        }
    }


    public function forget()
    {
        $emailPost = filter_var($this->request->getPost("emailForget"), FILTER_SANITIZE_EMAIL);

        $userModel = new UsersModel();
        $id_usuario = $userModel->findByEmail($emailPost);

        if ($id_usuario) {
            $recModel = new RecuperacaoModel();

            $codigo = strtoupper(bin2hex(random_bytes(3)));

            $existeCod = $recModel->where("codigo", $codigo)->find();
            while ($existeCod) {
                $codigo = strtoupper(bin2hex(random_bytes(3)));
                $existeCod = $recModel->where("codigo", $codigo)->find();
            }

            $data = [
                "codigo" => $codigo,
                "id_usuario" => $id_usuario[0]['id']
            ];

            $recModel->insert($data);
            $this->session->set(["idUser" => $id_usuario[0]['id']]);

            $email = \Config\Services::email();

            $email->setFrom('ifprojeto54@gmail.com', 'Projeto IF');
            $email->setTo($emailPost);


            $email->setSubject('Recuperação de senha');

            $dados = [
                "codigo" => $codigo
            ];
            $htmlView = view("Recuperar", $dados);
            $email->setMessage($htmlView);

            if ($email->send()) {
                $this->session->setFlashdata("sucesso", "Verifique seu endereço de email para continuar !");
                return redirect()->back();
            } else {
                $this->session->setFlashdata("erro", "Erro ao enviar, tente novamente!");
            return redirect()->back();
            }
        } else {
            $this->session->setFlashdata("erro", "Email inválido !");
            return redirect()->back();
        }
    }


    public function redefinir($codigo)
    {
        $recModel = new RecuperacaoModel();

        $hash = filter_var($codigo, FILTER_SANITIZE_STRING);
        $id_usuario = $this->session->get("idUser");

        $existeCod = $recModel->where("id_usuario", $id_usuario)->where("codigo", $hash)->find();


        if ($existeCod) {
            return redirect()->to(base_url("/redefinir-senha"));
        } else {
            $this->session->setFlashdata("erro", "Erro ao redefinir, tente novamente !");
            return redirect()->to(base_url("/esqueci-a-senha"));
        }
    }


    public function resetSenha()
    {
        $senha = $this->request->getPost("novasenha");
        $confSenha = $this->request->getPost("confnovasenha");


        if ($senha === $confSenha) {
            $userModel = new UsersModel();
            $id_usuario = $this->session->get("idUser");

            $data = [
                "senha" => $userModel->criptografar($senha)
            ];

            $userModel->update($id_usuario, $data);

            $this->session->setFlashdata("sucesso", "Senha alterada com sucesso, Faça login !");
            return redirect()->to(base_url());
        } else {
            $this->session->setFlashdata("erro", "Senhas diferentes, tente novamente!");
            return redirect()->back();
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
    

    public function geraIp()
    {
        $ip = "";
        for ($i = 0; $i < 3; $i++) {
            $loop = rand(100, 1000);
            $ip .= $loop . ".";
        }

        return substr($ip, 0, -1);
    }
}
