<div class="container" style="display: flex; align-items:center; margin-top: 10%;">
  <div class="container" style="width: 500px;">
    <img src="<?= base_url("assets/images/minhaconta.svg") ?>" alt="" style="width:100%;">
  </div>
  <div style="background-color: #424256; color:#ededeb; width:80%; padding: 25px; border-radius: 10px;">
    <h3>Meus dados</h3>
    <?php if ($session->getFlashdata("erro")) : ?>
      <p class="alert alert-danger" role="alert">
        <?php echo  $session->getFlashdata("erro") ?>
      </p>
    <?php endif; ?>
    <?php if ($session->getFlashdata("sucesso")) : ?>
      <p class="alert alert-success" role="alert">
        <?php echo  $session->getFlashdata("sucesso") ?>
      </p>
    <?php endif; ?>
    <br>
    <table class="table table-borderless">
      <tbody>
        <tr>
          <th scope="row">Nome</th>
          <td><?php echo $dados["nome"]; ?></td>
        </tr>
        <tr>
          <th scope="row">Email</th>
          <td><?php echo $dados["email"]; ?></td>
        </tr>
        <tr>
          <th scope="row">Telefone</th>
          <td><?php echo $dados["telefone"]; ?></td>
        </tr>
        <tr>
          <th scope="row">Senha</th>
          <td><?php echo  "***********"; ?></td>
        </tr>
      </tbody>
    </table>

    <form action="<?php echo base_url("/editar-conta"); ?>" method="POST">
      <input type="hidden" name="nome" value="<?php echo $dados["nome"]; ?>">
      <input type="hidden" name="email" value="<?php echo $dados["email"]; ?>">
      <input type="hidden" name="telefone" value="<?php echo $dados["telefone"]; ?>">
      <input type="hidden" name="senha" value="<?php echo $dados["senha"]; ?>">
      <input type="submit" class="btn btn-primary" value="Editar meus dados">
    </form>
  </div>

</div>