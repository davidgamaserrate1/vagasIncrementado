<?php

    require __DIR__. '/vendor/autoload.php';

    use \App\Entity\Vaga;
    use \App\Entity\Empresa;

    $vagas = Vaga::getVagas();
    $empresa = Empresa::getEmpresas()    ;
    
    include __DIR__.'/includes/header.php';    
    include __DIR__.'/includes/listagem.php';
    
    
    
    
    include __DIR__.'/includes/footer.php';