<main>
  <section>
    <h2>Empréstimo</h2>
    <div class="col-4 offset-4">
      <form action="<?= url_to('postTaken') ?>" method="post">
        <?php helper('form'); ?>
        <?= session()->getFlashdata('error') ?>
        <?= validation_list_errors() ?>
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="keySelect" class="form-label">Selecione a chave:</label>
          <select class="form-select" aria-label="Default select example" id="keySelect" name="id_key">
            <option selected disabled>Selecione uma chave</option>
            <?php
                foreach ($keys as $key => $value) { 
                  if (!in_array($value['id'], $taken)) { ?>
                    <option value="<?=$value['id']?>"><?=$value['label']?></option>   
                <?php };
                };
            ?>
          </select>
          <small class="form-text"><?= session()->get('err')['id_key'] ?? '' ?></small>
        </div>
        <div class="mb-3">
        <label for="userSelect" class="form-label">Selecione o usuário:</label>
          <select class="form-select" aria-label="Default select example" id="userSelect" name="id_user">
            <option selected disabled>Selecione um usuário</option>
            <?php
                foreach ($users as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['name']?></option>
              <?php  };
            ?>
          </select>
          <small class="form-text"><?= session()->get('err')['id_user'] ?? '' ?></small>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger">Emprestar</button>
          <button type="reset" class="btn btn-primary">Cancelar</button>
        </div>
      </form>
    </div>
  </section>
</main>