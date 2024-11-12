<div class="card">
  <img src="assets/imagens/Nomes-para-cachorro_capa.png" />
  <div>
    <h1><?=$evento->getNome()?></h1>
    <h2><?=$evento->getData()?> - <?=$evento->getLocal()?>, <?=$evento->getRua()?>, <?=$evento->getBairro()?></h2>
    <a href="/?id=<?=$evento->getIdEvento()?>">Saiba mais</a>
  </div>
</div>