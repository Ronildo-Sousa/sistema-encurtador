<div class="container mt-5">
    <h3>Editando dados</h3>
    <hr>
    
    <form action="<?php echo base_url("/editCont"); ?>" method="POST" id="formEdit">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="nome" name="nome" id="nome" value="<?php if($session->get("info_conta")): echo $session->get("info_conta")['nome']; ?> <?php endif; ?>" class="form-control">
            <small style="display: none;"></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php if($session->get("info_conta")): echo $session->get("info_conta")['email']; ?> <?php endif; ?>" class="form-control">
            <small style="display: none;"></small>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?php if($session->get("info_conta")): echo $session->get("info_conta")['telefone']; ?> <?php endif; ?>" class="form-control">
            <small style="display: none;"></small>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="senha" name="senha" id="senha" value="<?php if($session->get("info_conta")): echo $session->get("info_conta")['senha']; ?> <?php endif; ?>" class="form-control">
            <small style="display: none;"></small>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Concluir">
        </div>
    </form>
</div>