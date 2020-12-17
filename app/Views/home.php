<div style="margin-top: 5%;background:gray; padding:45px; border-radius:8px;width:95%;margin-left:2.5%;">
    <?php if ($session->getFlashdata("erro")) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $session->getFlashdata("erro"); ?>
        </div>
    <?php endif; ?>
    <div>
        <div style="display: flex; align-items: center; padding: 15px;">
            <div class="container" style="width: 340px;">
                <img src="<?= base_url("assets/images/home.svg") ?>" alt="" style="width:100%;">
            </div>
            <div style="display:flex; flex-direction:column; justify-content:center; background-color: #424256; color:white;padding: 25px;border-radius:10px;width: 80%;">
                <div style="margin-bottom: 20px;">
                    <h3 style="text-align:center;">Encurtador de Url's</h3>
                </div>
                <form action="<?php echo base_url("/encurtar") ?>" method="POST" id="formUrl" style="display: flex; justify-content:space-between;  max-width: 800px;">
                    <div class="form-group" style="width: 88%;">
                        <input type="url" name="url" id="url" class="form-control" placeholder="insira sua url" autofocus value="<?php if ($session->get("url")) : echo  $session->get("url"); ?> <?php endif; ?>">
                        <small style="display: none;"></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Encurtar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if ($session->get("urlCurta")) : ?>
        <hr>
        <div style="background: #424256; border-radius:10px;">
            <div class="container" style="display: flex; justify-content: center; align-items: center; padding:15px; border-radius: 5px; width:70%; left:50%;">
                <div class="alert alert-success" role="alert" id="resultado" style="margin-top: 3.5%;">
                    <?php echo $session->get("urlCurta"); ?>
                </div>
                <div><button class="btn btn-primary mt-2" style="margin-left:30%;" id="btn-result">Copiar Url</button></div>
            </div>
        </div>
    <?php endif; ?>
</div>