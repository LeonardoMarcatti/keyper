<main>
  <section id="section_login">
    <div class="col-6" id="form-container">
    <h4>Login Administrador</h4>
    <?php helper('form'); ?>
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>
      <form action="login" method="post">
         <?= csrf_field() ?>
        <div class="mb-3">
            <label for="staff" class="form-label">Usuário:</label>
            <input type="text" name="staff" id="staff" class="form-control" value="<?= set_value('title') ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= set_value('title') ?>" >
        </div>
        <div class="mb-3" id="botton_form">
          <div>
            <button type="submit" class="btn btn-danger">Entrar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
          </div>
            <a href=<?= url_to('home') ?>>Voltar</a>
        </div>
      </form>
    </div>
  </section>
</main>