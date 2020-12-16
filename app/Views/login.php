<div class="container">
    <?php if (!$session->get("id_usuario")) : ?>
        <div class="row">
            <div style="display: flex; align-items: center; margin-top: 9%;  padding: 15px;">
                <div class="container" style="width: 800px;">
                    <img src="<?= base_url("assets/images/login.svg") ?>" alt="" style="width:100%;">
                </div>
                <div class="container"  style="display: flex; flex-direction:column; justify-content: center; background: #424256; padding:30px; border-radius:10px; color:white; ">
                    <h3>Login</h3>
                    <hr>
                    <?php if ($session->getFlashdata("erro")) : ?>
                        <p class="alert alert-danger alert-sm" role="alert"><?php echo $session->getFlashdata("erro"); ?></p>
                    <?php endif; ?>
                    <?php if ($session->getFlashdata("sucesso")) : ?>
                        <p class="alert alert-success alert-sm" role="alert"><?php echo $session->getFlashdata("sucesso"); ?></p>
                    <?php endif; ?>
                    <form action="<?php echo base_url("/login") ?>" method="POST" id="form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" autofocus class="form-control" value="<?php if ($session->get("info_login")) : echo $session->get("info_login")['email']; ?> <?php endif; ?>">
                            <small style="display: none; font-size: 12pt; text-shadow: black;"></small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control">
                            <small style="display: none; font-size: 12pt;"></small>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-primary">Logar</button>
                            </div>
                            <div class="col-12 col-sm-8 text-right">
                                <a href="<?php echo base_url("/esqueci-a-senha") ?>" style="color: white;">Esqueci minha senha</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php else : ?>
        <p class="alert alert-danger alert-sm" role="alert">voce ja está logado !</p>

    <?php endif; ?>
</div>