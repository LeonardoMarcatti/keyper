<main>
  <section>
    <h2>Devolução de chaves</h2>
    <div class="col-4 offset-4">
      <form action="<?= url_to('returnKey') ?>" method="post">
        <?php helper('form'); ?>
        <?= session()->getFlashdata('error') ?>
        <?= validation_list_errors() ?>
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="key" class="form-label">Chave:</label>
          <select name="key" id="key" class="form-select">
            <option value="0" disabled selected>Selecione uma chave</option>
            <?php
              foreach ($log as $key => $value) {?>
              <option value="<?=$value['id_key']?>"><?=$value['key']?></option>
            <?php };
            ?>
          </select>
          <small><?= session()->get('err')['key'] ?? '' ?></small>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger">Devolver</button>
          <button type="reset" class="btn btn-primary">Cancelar</button>
        </div>
      </form>
    </div>
    <pre>
      
    </pre>
  </section>
</main>