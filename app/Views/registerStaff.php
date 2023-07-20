<main>
  <section>
    <h2>Cadastrar Administrador</h2>
      <div class="col-6 offset-4">
        <form action="<?= url_to('postRegisterStaff') ?>" method="post">
          <?php helper('form'); ?>
          <?= session()->getFlashdata('error') ?>
          <?= validation_list_errors() ?>
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>">
            <small class="form-text"><?= session()->get('err')['name'] ?? '' ?></small>
          </div>
          <div class=" mb-3 form-check">
            <input class="form-check-input" name="boss" type="checkbox" value="1" id="boss">
            <label class="form-check-label" for="boss">
              Administrador
            </label>
          </div>
          <div class="mb-3 col-6">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= set_value('password') ?>">
            <small class="form-text"><?= session()->get('err')['password'] ?? '' ?></small>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-danger">Adicionar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
          </div>
        </form>
      </div>
  </section>
</main>