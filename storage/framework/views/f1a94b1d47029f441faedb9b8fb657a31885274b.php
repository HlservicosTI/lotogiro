<div>
    <table class="table px-sorteio">
        <thead>
        <tr>
            <th class="col1" scope="col">Tipo</th>
            <th scope="col">Concurso</th>
            <th scope="col">Data do Sorteio</th>
            <th scope="col">Importar Jogo</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($typeGame->name); ?></td>
            <?php if(empty($typeGame->competitions->last())): ?>
                <td colspan="2" class="text-danger">NÃO EXISTE CONCURSO CADASTRADO, NÃO É POSSIVEL CRIAR O JOGO</td>
            <?php else: ?>
                <td><?php echo e($typeGame->competitions->last()->number); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($typeGame->competitions->last()->sort_date)->format('d/m/Y H:i:s')); ?></td>
                <td> <a href="<?php echo e(route('admin.bets.games.carregarjogo', ['type_game' => $typeGame->id])); ?>"><button  class="btn btn-info" type="button">Carregar </button></a></td>
            <?php endif; ?>
        </tr>
        </tbody>
    </table>

    <?php if($User['type_client'] == 1): ?>

    <input type="text" value="<?php echo e($FiltroUser['name']); ?>" disabled class="form-control">
    <input type="hidden" name="client" value="<?php echo e($FiltroUser['id']); ?>" readonly>

    <?php endif; ?>


    <?php if($User['type_client'] == 1): ?>
        <input type="hidden" name="numbers" id="numbers" value="<?php $__currentLoopData = $selectedNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedNumbers1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($selectedNumbers1); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" readonly>
        <input type="hidden" class="form-control" id="type_game" name="type_game" value="<?php echo e($typeGame->id); ?>" readonly>
    <?php endif; ?>

<?php if($User['type_client'] == null): ?>

    

    <div class="form-row">
        <div class="form-group col-md-12">
            <div wire:ignore>
                <div class="card-header ganhos-card">
                    <h4>Cliente</h4>
                </div>
            </div>        
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <input wire:model="search" type="text" id="author" class="form-control" placeholder="Pesquisar Cliente" autocomplete="off">
                        <div class="input-group-append">
                            <span wire:click="clearUser" class="input-group-text" title="Limpar"><i class="fas fa-user-times"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        
        

        <input type="hidden" name="client" value="<?php echo e($clientId); ?>">
            <div class="row mb-3" id="list_group" style="max-height: 100px; overflow-y: auto">
                <div class="col-md-12">
                    <?php if($showList): ?>
                        <ul class="list-group">
                            <?php if(isset($clients) && $clients->count() > 0): ?>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li wire:click="setId(<?php echo e($client); ?>)"
                                            class="list-group-item" style="cursor:pointer;"><?php echo e($client->name . ' - ' . $client->email . ' - '. \App\Helper\Mask::addMaksPhone($client->ddd.$client->phone)); ?> </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <input type="hidden" name="numbers" id="numbers" value="<?php $__currentLoopData = $selectedNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedNumbers1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($selectedNumbers1); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" readonly>
            </div>
        <input type="hidden" class="form-control" id="type_game" name="type_game" value="<?php echo e($typeGame->id); ?>" readonly>
    </div>

    <?php endif; ?>

        

    <div class="row mb-2">
        <div class="col-md-12">
                <?php if(isset($values) && $values->count() > 0): ?>
                    <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="text" id="multiplicador" value="<?php echo e($value->multiplicador); ?>" name="multiplicador" hidden>
                        <input type="text" id="maxreais" value="<?php echo e($value->maxreais); ?>" name="maxreais" hidden>
                        <input type="text" id="valueId" value="<?php echo e($value->id); ?>" name="valueId" hidden>
                        Digite o Valor da Aposta
                        <input type="text" id="value" onchange="altera()" value="" name="value" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                        Valor do Prêmio R$
                        <input type="text" id="premio" value="" name="premio" readonly>
                        <button  class="btn btn-info" type="button" onclick="altera();">Calcular</button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                
                <?php endif; ?>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($matriz)): ?>
                <h4>Quantidade selecionada:(<?php echo e(count($selectedNumbers)); ?>/<?php echo e($numbers); ?>)</h4>
                    <?php if($typeGame->name == "SLG - 15 Lotofácil" || $typeGame->name == "SLG - 20 LotoMania" || $typeGame->name == "Lotogiro - 1000X Lotofácil" || $typeGame->name == "ACUMULADO 15 lotofacil"): ?>
                      <button wire:click="selecionaTudo()" class="<?php echo e(env('AllColor')); ?>" type="button" onclick="limpacampos();">Seleciona todos os Números</button>
                    <?php endif; ?>

                    <br>
                    
                    <div class="col-md-12 automatic-bet">
                        <p style="font-size: 10px;margin-bottom: auto;">
                            Selecione a quantidade de números para gerar um jogo automático:
                        </p>
                        
                        <?php $__currentLoopData = $busca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buscas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <button style="margin-top: 1%" wire:click="randomNumbers(<?php echo e($buscas['numbers']); ?>)" class="<?php echo e(env('randomNumbersColor')); ?>" type="button" onclick="limpacampos();"><?php echo e($buscas['numbers']); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </div>



                <div class="table-responsive responsive-bet">
                    <table class="table text-center">
                        <tbody>
                        <?php $__currentLoopData = $matriz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cols): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <button wire:click="selectNumber(<?php echo e($cols); ?>)" id="number_<?php echo e($cols); ?>" type="button"
                                                class="btn <?php echo e(in_array($cols, $selectedNumbers) ? env('OneNumber2') : 'btn-warning'); ?> btn-beat-number"><?php echo e($cols); ?></button>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('admin/layouts/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('admin/layouts/plugins/select2-bootstrap4-theme/select2-bootstrap4.css')); ?>" rel="stylesheet"/>

    <style>
        .btn-beat-number {
            width: 100%;
        }

        .table th, .table td {
          border-top: none;
          padding: 5px 5px 5px 5px;
        }

        .ganhos-card h4 {
            font-size: 20px !important;
        }

        @media (max-width: 700px) {
            h4 {
                font-size: 15px;
                margin-left: 7px;
            }
        }
    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('admin/layouts/plugins/select2/js/select2.min.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    
    <script>
        //Função para realizar o calculo do multiplicador
         function altera(){
            var multiplicador = document.getElementById("multiplicador").value;
            var valor = document.getElementById("value").value;
            var Campovalor = document.getElementById("value");
            var campoDoCalculo = document.getElementById("premio");
            var maxreais = document.getElementById("maxreais").value;
            var resultado;
            var numberValor = parseInt(valor);
            var numberReais = parseInt(maxreais);

            //evento dispara quando retira o foco do campo texto
                if( numberReais >= numberValor ){
                 resultado = valor * multiplicador;
                campoDoCalculo.value = resultado;
                }else{
                resultado = maxreais * multiplicador;
                campoDoCalculo.value = resultado;
                Campovalor.value = maxreais;
                }
         }



         function mudarListaNumeros(){
            var input = document.querySelector("#numbers");
            var NovoTexto = input.value;
            console.log(NovoTexto);
            var NovoTexto = NovoTexto.trim();
            var NovoTexto = NovoTexto.split("  ");
            var NovoTexto = NovoTexto.toString();
            console.log(NovoTexto);
            document.getElementById('numbers').value = NovoTexto;

         }

         function mudarListaNumerosGeral(){
             altera();
             mudarListaNumeros();

         }

         function limpacampos(){
            var valor = document.getElementById("value").value;
            var Campovalor = document.getElementById("value");
            var campoDoCalculo = document.getElementById("premio");
            campoDoCalculo.value = "";
            Campovalor.value = "";
         }

    </script>

<?php $__env->stopPush(); ?>

<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/livewire/pages/bets/game/form.blade.php ENDPATH**/ ?>