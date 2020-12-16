<div class="container" style="display: flex; align-items:center; margin-top: 13%">
    <div class="container" style="width: 350px;">
        <img src="<?= base_url("assets/images/forgot.svg") ?>" alt="" style="width:100%;">
    </div>
    <div style="background: #424256; color:white; width:80%; padding:25px; border-radius: 10px;">
        <h3>Recuperção de senha</h3>
        <?php if ($session->getFlashdata("erro")) : ?>
            <p class="alert alert-danger alert-sm" role="alert"><?php echo $session->getFlashdata("erro"); ?></p>
        <?php endif; ?>
        <?php if ($session->getFlashdata("sucesso")) : ?>
            <p class="alert alert-success alert-sm" role="alert"><?php echo $session->getFlashdata("sucesso"); ?></p>
        <?php endif; ?>
        <form action="<?php echo base_url("/forget") ?>" method="POST" id="form-recuperar">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="emailForget" id="emailForget" class="form-control" autofocus placeholder="Insira seu email">
                <small style="display: none; font-size: 12pt;"></small>
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-primary " value="Recuperar">
            </div>
        </form>
    </div>
</div>