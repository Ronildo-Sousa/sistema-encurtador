<div class="container" style="display:flex; align-items:center; margin-top: 8%">
    <div class="container" style="width: 350px;">
        <img src="<?= base_url("assets/images/gestaourl.svg") ?>" alt="" style="width:100%;">
    </div>
    <div style="background: #424256; color: white; width: 80%; padding: 25px; border-radius: 10px;">
        <h3>Minhas Url's</h3>
        <?php if ($session->getFlashdata("sucesso")) : ?>
            <div class="alert alert-success">
                <?php echo $session->getFlashdata("sucesso"); ?>
            </div>
        <?php endif; ?>
        <?php if ($urls) : ?>
            <table class="table">
                <th>Url</th>
                <th>N° de acessos</th>
                <?php foreach ($urls as $url) : ?>
                    <tbody>

                        <tr>
                            <td><?php echo base_url() . "/" . $url->url_curta; ?></td>
                            <td><?php echo $url->num_acessos; ?></td>
                            <td>
                                <form action="<?php echo base_url("/delete"); ?>" method="POST" class="deleteUrl">
                                    <input type="hidden" name="idUrl" value="<?php echo $url->id; ?>">
                                    <input type="submit" value="Excluir" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>

                    </tbody>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <div class="alert alert-warning">
                Voçê não possui Urls salvas!
            </div>
        <?php endif; ?>
    </div>
</div>