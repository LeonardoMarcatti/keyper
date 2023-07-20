<main>
  <section>
    <h2>Registro de Chaves</h2>
    <div class="col-4 offset-4">
      <form action="<?= url_to('postRegisterKey')?>" method="post">
      <?php helper('form'); ?>
        <?= session()->getFlashdata('error') ?>
        <?= validation_list_errors() ?>
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="title" class="form-label">Rótulo:</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= set_value('title') ?>">
            <small><?= session()->get('err')['title'] ?? '' ?></small>
        </div>
        <div class="mb-3" id="botton_form">
            <div>
              <button type="submit" class="btn btn-danger">Adicionar</button>
              <button type="reset" class="btn btn-primary">Cancelar</button>
            </div>
          </div>
      </form>
    </div>
  </section>
</main>