<main>
  <section>
    <div id="success_error">
      <h2>Atenção!</h2>
      <h3>Já existe uma chave com esse nome. Deseja tentar novamente?</h3>
      <div>
        <a href="<?= url_to(session()->get('origin')) ?>"><button type="button" class="btn btn-danger">Sim</button></a>
        <a href="<?=url_to('mainPage')?>"><button type="button" class="btn btn-primary">Não</button></a>
      </div>
    </div>    
  </section>
</main>