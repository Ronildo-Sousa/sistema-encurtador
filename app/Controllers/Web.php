<?php

namespace App\Controllers;

use App\Models\UrlModel;
use App\Models\UsersModel;


class Web extends BaseController
{
	public function home()
	{
		if ($this->session->get("id_usuario")) {
			$data = [
				"session" => $this->session
			];

			echo view("templates/header", $data);
			echo view("home");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Faça login!");
			return redirect()->to(base_url());
		}
	}

	public function login()
	{
		if (!$this->session->get("id_usuario")) {
			$data = [
				"session" => $this->session
			];


			echo view("templates/header", $data);
			echo view("login");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Faça logout!");
			return redirect()->to(base_url());
		}
	}

	public function register()
	{
		if (!$this->session->get("id_usuario")) {
			$data = [
				"session" => $this->session
			];

			echo view("templates/header", $data);
			echo view("register");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Faça logout!");
			return redirect()->to(base_url());
		}
	}

	public function minhaConta()
	{
		if ($this->session->get("id_usuario")) {
			$id = $this->session->get("id_usuario");

			$userModel = new UsersModel();
			$dados = $userModel->getDadosUsuario($id);

			$data = [
				"session" => $this->session,
				"dados" => $dados
			];

			echo view("templates/header", $data);
			echo view("minhaConta");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Faça login!");
			return redirect()->to(base_url("/login"));
		}
	}

	public function editarConta()
	{
		if ($this->session->get("id_usuario")) {

			$nome = $this->request->getPost("nome");
			$email = $this->request->getPost("email");
			$telefone = $this->request->getPost("telefone");
			$senha = $this->request->getPost("senha");

			$this->session->set([
				"info_conta" => [
					"nome" => $nome,
					"email" => $email,
					"telefone" => $telefone,
					"senha" => $senha
				]
			]);

			$data = [
				"session" => $this->session
			];


			echo view("templates/header", $data);
			echo view("editConta");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Faça login!");
			return redirect()->to(base_url("/login"));
		}
	}

	public function minhaUrl()
	{
		if ($this->session->get("id_usuario")) {
			$id_usuario = $this->session->get("id_usuario");

			$urlModel = new UrlModel();

			$urls = $urlModel->where("id_usuario", $id_usuario)->find();

			$data = [
				"session" => $this->session,
				"urls" => $urls
			];


			echo view("templates/header", $data);
			echo view("minhaUrl");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Faça login!");
			return redirect()->to(base_url("/login"));
		}
	}

	public function forget()
	{
		$data = [
			"session" => $this->session
		];

		echo view("templates/header", $data);
		echo view("forget");
		echo view("templates/footer");
	}

	public function redefinir()
	{
		if ($this->session->get("idUser")) {
			$data = [
				"session" => $this->session
			];

			echo view("templates/header", $data);
			echo view("redefinir");
			echo view("templates/footer");
		} else {
			$this->session->setFlashdata("erro", "Erro ao redefinir!");
			return redirect()->to(base_url());
		}
	}

	public function erro404()
	{
		$data = [
			"session" => $this->session
		];


		echo view("templates/header", $data);
		echo view("erros/pagina404");
		echo view("templates/footer");
	}
}
