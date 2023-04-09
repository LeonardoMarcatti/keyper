<main>
  <section>
    <h2>Cadastrar Usuário</h2>
      <div class="col-6 offset-4">
        <form action="<?= url_to('postRegisterUser') ?>" method="post">
          <?php helper('form'); ?>
          <?= session()->getFlashdata('error') ?>
          <?= validation_list_errors() ?>
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>" required>
            <small class="form-text"><?= session()->get('err')['name'] ?? '' ?></small>
          </div>
          <div class="mb-3 col-6">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="number" name="cpf" id="cpf" class="form-control" value="<?= set_value('cpf') ?>" required>
            <small class="form-text"><?= session()->get('err')['cpf'] ?? '' ?></small>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-danger">Adicionar</button>
            <button type="reset" class="btn btn-primary">Cancelar</button>
          </div>
        </form>
      </div>
  </section>
</main>