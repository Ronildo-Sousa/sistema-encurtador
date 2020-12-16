<div class="container" style="display: flex; align-items:center; margin-top: 5%; padding: 15px;">
    <div class="container" style="width: 700px;">
        <img src="<?= base_url("assets/images/cadastro.svg") ?>" alt="" style="width:100%;">
    </div>
    <div class="header" style="background-color: #424256; color:white; display:flex; flex-direction:column; align-items:center; padding: 10px; border-radius: 10px;">
        <h3>Cadastro</h3>
        <hr>
        <?php if ($session->getFlashdata("erro")) : ?>
            <div class="alert alert-danger">
                <?php echo $session->getFlashdata("erro"); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo base_url("/register") ?>" method="POST" class="form" style="width:80%">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Insira seu nome" autofocus value="<?php if ($session->get("info_cads")) : echo $session->get("info_cads")['nome']; ?> <?php endif; ?>">
                        <small style="display: none; font-size: 12pt;"></small>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Insira seu email" value="<?php if ($session->get("info_cads")) : echo $session->get("info_cads")['email']; ?> <?php endif; ?>">
                        <small style="display: none; font-size: 12pt;"></small>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Insira seu telefone" value="<?php if ($session->get("info_cads")) : echo $session->get("info_cads")['telefone']; ?> <?php endif; ?>">
                        <small style="display: none; font-size: 12pt;"></small>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Insira sua senha">
                        <small style="display: none; font-size: 12pt;"></small>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="form-group">
                        <label for="senha">Confirmar Senha</label>
                        <input type="password" name="confirmarsenha" id="confirmarsenha" class="form-control" placeholder="Insira sua senha novamente">
                        <small style="display: none; font-size: 12pt;"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4">
                    <button type="submit" class="btn btn-primary">Cadastrar-me</button>
                </div>
            </div>
        </form>
    </div>
</div>