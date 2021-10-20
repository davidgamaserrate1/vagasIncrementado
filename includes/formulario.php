


<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"> <?=TITLE?> </h2>

    <form method="post">

        <div class="form-group">
            <label>Título</label>
              <input type="text" class="form-control" name="titulo" value="<?=$obVaga->titulo?>">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="1"><?=$obVaga->descricao?></textarea>

        </div>

        
     Empresa :  <br>
       <select name="select_empresa">
            <option >Selecione--</option>
            <?php
            use \App\Entity\Empresa;
            $empresa = Empresa::getEmpresas();        
            for ($i = 0 ; $i <=  count($empresa) -1; $i++) {?>
                <option value="<?= $i?>"> <?= $empresa[$i]->nome ?> </option>
            <?php 
        } 
    ?>         
                <?php var_dump( "adaas " .$select_empresa); ?>
             

             
         
        </select>

        <div class="form-group">
            <label>Status</label>
            
            <div>
                <div class="form-check form-check-inline" >
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline" >
                    <label class="form-control">
                    <input type="radio" name="ativo" value="n" <?=$obVaga->ativo == 'n' ? 'checked' : ''?>> Inativo
                    </label>
                </div>

            </div>
            
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>

</main>