<div class="container" style="display: flex; align-items:center; margin-top: 8%;">
    <div class="container" style="width: 350px;">
        <img src="<?= base_url("assets/images/novasenha.svg") ?>" alt="" style="width:100%;">
    </div>
    <div style="width: 80%; background: #424256; padding: 25px; border-radius: 10px; color: white;">
        <form action="<?= base_url("/resetSenha"); ?>" method="POST" id=formSenha>
            <h3>Redefinindo senha</h3>
            <hr>
            <?php if ($session->getFlashdata("erro")) : ?>
                <p class="alert alert-danger alert-sm" role="alert"><?php echo $session->getFlashdata("erro"); ?></p>
            <?php endif; ?>

            <div class="form-group">
                <label for="novasenha">Nova senha</label>
                <input type="password" class="form-control" name="novasenha" id="novasenha">
                <small  style="display: none; font-size: 12pt;"></small>
            </div>
            <div class="form-group">
                <label for="novasenha">Confirmar senha</label>
                <input type="password" class="form-control" name="confnovasenha" id="confnovasenha">
                <small style="display: none; font-size: 12pt;"></small>
            </div>
            <div><input type="submit" class="btn btn-primary mt-2" value="Redefinir"></div>
        </form>
    </div>
</div>