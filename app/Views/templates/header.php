<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css">

</head>

<body style="background-color: #d7dbd8;">

    <nav class="navbar navbar-expand" style="background:  linear-gradient(to right top, #610766, #69086c, #710a71, #7a0c77, #820d7c, #890e82, #910e87, #980f8d, #9f0f95, #a70e9d, #ae0da6, #b50dae);">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url("/home") ?>" style="color: white;">Encurtador</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if (!$session->get("id_usuario")) : ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" style="margin-left: 80%;">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url("/login") ?>" style="color: white;">Login <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url("/cadastro") ?>" style="color: white;">Cadastrar</a>
                        </li>
                    </ul>
                <?php endif; ?>
                <?php if ($session->get("id_usuario")) : ?>

                    <div class="dropdown show">
                        <ul class="navbar-nav" style="margin-left: 80px;">
                            <li>
                                <a class="nav-link active " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <i class="fas fa-user-circle " style="font-size:28px; color:white;"></i>
                                    <?php if ($session->getFlashdata("nome_usuario")) : ?>
                                        <span style="color: white; font-size:9pt;"> <?php echo "Bem-vindo(a), " . $session->getFlashdata("nome_usuario"); ?></span>
                                    <?php endif; ?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url("/minha-conta") ?>">Minha Conta</a>
                                    <a class="dropdown-item" href="<?php echo base_url("/minhas-urls") ?>">Minhas url's</a>
                                    <a class="dropdown-item" href="<?php echo base_url("/sair") ?>">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                <?php endif; ?>
                </div>
        </div>
    </nav>