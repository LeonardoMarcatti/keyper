<main>
  <section>
    <h2>Successo!</h2>
    <h3>Deseja fazer outro registro?</h3>
    <a href="<?= url_to(session()->get('origin')) ?>"><button type="button" class="btn btn-danger">Sim</button></a>
    <a href="<?=url_to('mainPage')?>"></a> <button type="button" class="btn btn-primary">Não</button>
  </section>
</main>