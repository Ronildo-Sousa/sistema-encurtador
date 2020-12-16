<?php

namespace App\Controllers;

use App\Models\UrlModel;

class Encurtador extends BaseController
{
    public function encurtar()
    {
        $url = filter_var($this->request->getPost("url"), FILTER_SANITIZE_URL);
        $urlCurta = strtoupper(bin2hex(random_bytes(3)));

        $id_usuario = $this->session->get("id_usuario");
        $urlModel = new UrlModel();

        $existeUrl = $urlModel->where("url_curta", $urlCurta)->find();
        while ($existeUrl) {
            $urlCurta = strtoupper(bin2hex(random_bytes(3)));
            $existeUrl = $urlModel->where("url_curta", $urlCurta)->find();
        }

        $data = [
            'url' => $url,
            'url_curta' => $urlCurta,
            'id_usuario' => $id_usuario['id']
        ];

        $urlModel->insert($data);

        $dados = [
            "url" => $url,
            "urlCurta" => base_url() . "/" . $urlCurta
        ];

        $this->session->set($dados);
        return redirect()->to(base_url("/home"));
    }

    public function desencurtar($hashUri)
    {
        $urlModel = new UrlModel();
        $urlCurta = filter_var($hashUri, FILTER_SANITIZE_URL);

        $urlLonga = $urlModel->where("url_curta", $urlCurta)->find();
        if ($urlLonga) {
            $idUrl = $urlLonga[0]->id;
            $numAcessos = $urlLonga[0]->num_acessos + 1;

            $data = [
                "num_acessos" => $numAcessos
            ];

            $urlModel->update($idUrl, $data);

            return redirect()->to($urlLonga[0]->url);
        } else {
            return redirect()->to(base_url("/pagina-nao-encontrada"));
        }
    }
}
