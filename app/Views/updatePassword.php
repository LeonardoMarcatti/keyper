<main>
    <section id="section_login">
        <div class="col-6" id="form-container">
            <h4>Atualize sua Senha</h4>
            <?php helper('form'); ?>
            <?= session()->getFlashdata('error') ?>
            <?= validation_list_errors() ?>
            <form action="<?= url_to('postUpdatePassword')?>" method="post" id="updatePassword">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="pass1" class="form-label">Senha:</label>
                    <input type="password" name="pass1" id="pass1" class="form-control" value="<?= set_value('title') ?>"required>
                    <small>Mínimo de 3 caracteres</small>
                    <br>
                    <small><?= session()->getFlashdata('errors')['pass1'] ?? '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="pass2" class="form-label">Senha::</label>
                    <input type="password" name="pass2" id="pass2" class="form-control" value="<?= set_value('title') ?>"required>
                    <small>Mínimo de 3 caracteres</small><br>
                    <small><?= session()->getFlashdata('errors')['pass2'] ?? '' ?></small>
                </div>
                <div class="mb-3" id="botton_form">
                    <div>
                        <button type="submit" class="btn btn-secondary" disabled id="btn_submit">Atualizar</button>
                        <button type="reset" class="btn btn-primary" id="btn_reset">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>