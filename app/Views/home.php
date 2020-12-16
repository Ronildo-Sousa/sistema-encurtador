<div class="container">
    <?php if ($session->getFlashdata("erro")) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $session->getFlashdata("erro"); ?>
        </div>
    <?php endif; ?>
    <h3 style="margin-top: 30px; text-align:center;">Encurtador de Url's</h3>
    <form action="<?php echo base_url("/encurtar") ?>" class="mt-5" method="POST" id="formUrl">
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" style="width: 85%; position:relative;" class="form-control" placeholder="insira sua url" autofocus value="<?php if ($session->get("url")) : echo  $session->get("url"); ?> <?php endif; ?>">
            <small style="display: none;"></small>
        </div>
        <div class="col-12 col-sm-4" style="position:absolute; top:204px; left:79%;">
            <button type="submit" class="btn btn-primary">Encurtar</button>
        </div>
    </form>
    <br>
    <?php if ($session->get("urlCurta")) : ?>
        <hr>
        <div class="container" style="border: 2px solid green; display: flex; justify-content: center; align-items: center; padding:15px; border-radius: 5px; width:70%; left:50%;">
            <div class="alert alert-success" role="alert" id="resultado" style="margin-top: 3.5%;">
               <?php echo $session->get("urlCurta"); ?>
            </div>
            <div><button class="btn btn-primary mt-2" style="margin-left:30%;" id="btn-result" >Copiar Url</button></div>
        </div>
    <?php endif; ?>
</div>