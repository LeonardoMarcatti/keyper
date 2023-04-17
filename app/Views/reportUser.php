<main>
  <section>
    <h2>Relatório de Usuários</h2>
    <div class="col-4 offset-4">
      <form action="<?= url_to('postReportUser') ?>" method="post">
        <?php helper('form'); ?>
        <?= session()->getFlashdata('error') ?>
        <?= validation_list_errors() ?>
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="user" class="form-label">Chave:</label>
          <select name="user" id="user" class="form-select">
            <option value="0" selected disabled>Escolha um usuário</option>
            <?php
              foreach ($users as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?=$value['name']?></option>
              <?php }; ?>
          </select>
          <small><?= session()->get('err')['user'] ?? '' ?></small>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger">Relatório</button>
          <button type="reset" class="btn btn-primary">Cancelar</button>
        </div>
      </form>
    </div>
    <?php
      if (!empty($report)) { ?>
        <div class="col-10 offset-1">
      <table class="table table-dark table-striped table-bordered text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Chave</th>
            <th>User</th>
            <th>Data Empréstimo</th>
            <th>Prevenção - Empréstimo</th>
            <th>Data Devolução</th>
            <th>Prevenção - Devolução</th>
          </tr>
        </thead>
        <tbody>
          <?php
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            foreach ($report as $key => $value) {?>
              <tr>
                <td><?=$value['id']?></td>
                <td><?=$value['label']?></td>
                <td><?=$value['user']?></td>
                <td><?= ucfirst(strftime('%A, %d/%m/%Y - %H:%M', strtotime($value['date_taken'])))?></td>
                <td><?=$value['staff']?></td>
                <td><?= ($value['date_returned']) ? ucfirst(strftime('%A, %d/%m/%Y - %H:%M', strtotime($value['date_returned']))) : 'Não entregue' ?></td>
                <td><?=$value['staff2']?></td>
              </tr>
          <?php }; ?>
        </tbody>
      </table>
    </div>
      <?php };?>
    
  </section>
</main>