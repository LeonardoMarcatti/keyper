<main>
  <section id="sec_setup">
    <h2>Configurações de Conta</h2>
    <?php helper('form'); ?>
    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>
    <div id="sec_container">
      <div>
        <h3>Alteração de Login</h3>
        <form action="<?= url_to('postUpdateLogin') ?>" method="post" id="updateLogin">
          <?= csrf_field() ?>
          <div class="mb-3">
              <label for="name" class="form-label">Novo Login:</label>
              <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>" required>
              <small class="form-text"><?= session()->get('errors')['name'] ?? '' ?></small>
          </div>
          <div class="mb-3">
              <label for="name2" class="form-label">Repita Novo Login:</label>
              <input type="text" name="name2" id="name2" class="form-control" value="<?= set_value('name2') ?>" required>
              <small class="form-text"><?= session()->get('errors')['name2'] ?? '' ?></small>
          </div>
          <div class="mb-3" id="botton_form">
            <div>
              <button type="submit" class="btn btn-secondary" id="btn_submit" disabled>Atualizar</button>
              <button type="reset" class="btn btn-primary" id="btn_reset">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
      <div>
        <h3>Alteração de Senha</h3>
        <form action="<?= url_to('postUpdatePassword') ?>" method="post" id="updatePassword">
          <?= csrf_field() ?>
          <div class="mb-3">
              <label for="pass1" class="form-label">Nova Senha:</label>
              <input type="password" name="pass1" id="pass1" class="form-control" value="<?= set_value('pass1') ?>" required>
              <small class="form-text"><?= session()->get('errors')['pass1'] ?? '' ?></small>
          </div>
          <div class="mb-3">
              <label for="pass2" class="form-label">Repita Nova Senha:</label>
              <input type="password" name="pass2" id="pass2" class="form-control" value="<?= set_value('pass2') ?>" required>
              <small class="form-text"><?= session()->get('errors')['pass2'] ?? '' ?></small>
          </div>
          <div class="mb-3" id="botton_form">
            <div>
              <button type="submit" class="btn btn-secondary" id="btn_submitPass" disabled>Atualizar</button>
              <button type="reset" class="btn btn-primary" id="btn_resetPass">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </div>    
  </section>
</main>