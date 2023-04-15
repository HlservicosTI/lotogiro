<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    
    <style type="text/css">

        @page  {
            margin: 0cm 0cm;
        }

        .font {
            font-family: 'Exo', serif;
        }

        .text-size-1 {
            font-size: 10px;
        }

        .text-size-2 {
            font-size: 22px;
        }

        .text-size-3 {
            font-size: 30px;
        }

        .text-size-4 {
            padding-top:0%;
            font-size: 45px;
        }

        .text-size-5 {
            padding-top:0%;
            font-size: 40px;
        }

        body {
            margin-top: 1.5cm;
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            margin-bottom: 1.5cm;
        }

        .page-break {
            page-break-after: always;
        }

        .bg-danger {
            background-color: red;
        }

        .bg-success {
            background-color: #28a745;
        }

        .text-danger {
            color: red;
        }

        .text-success {
            color: #28a745;
        }

        .text-white {
            color: white;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .border-bottom-dashed {
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .py-2 {
            padding-top: 1px;
            padding-bottom: 1px;
        }

        .pt-1 {
            padding-top: 1px;
        }


        .px-3 {
            padding-right: 30px;
            padding-left: 30px;
        }

        .m-auto {
            margin: auto;
        }

        .text-bold {
            font-weight: bold;
        }

        .number {
            width: 50px;
            height: 50px;
        }

        .border-radius {
            border-radius: 25px;
        }

        .vertical-middle {
            vertical-align: middle;
        }

        .page-break {
        page-break-after: always;
        }


    </style>
</head>
<body>

    
    <?php $__currentLoopData = $jogosCliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jogos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="">
            <div class="border-bottom-dashed py-2">
                <p class="text-danger text-center font text-size-3 text-bold">

                    APOSTA <?php echo e(env("nome_sistema")); ?> TUDO

                </p>
                <?php if($prize): ?>
                    <p class="text-success text-center font text-size-4 text-bold py-2">
                        BILHETE PREMIADO
                    </p>
                <?php endif; ?>
            </div>
            <div class="border-bottom-dashed px-3">
                <p class="text-right">
                    <span class="font text-bold">ID APOSTA: </span>
                    <span class="font"><?php echo e($jogos['id']); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">EMITIDO EM:</span>
                    <span class="font"><?php echo e(\Carbon\Carbon::parse($jogos['created_at'])->format('d/m/Y h:i:s')); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">PARTICIPANTE:</span>
                    <span class="font"><?php echo e($Nome); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">CONCURSO:</span>
                    <span class="font"><?php echo e($jogos->competition->number); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">DATA SORTEIO:</span>
                    <span class="font"><?php echo e(\Carbon\Carbon::parse($jogos->competition->sort_date)->format('d/m/Y')); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">HORA SORTEIO:</span>
                    <span class="font"><?php echo e(\Carbon\Carbon::parse($jogos->competition->sort_date)->format('H:i:s')); ?></span>
                </p>
                <h2 class="font text-bold text-center"><?php echo e(mb_strtoupper($jogos->typeGame->name, 'UTF-8')); ?></h2>
            </div>

            <?php
                $numbers = array();
                $numbers = explode(',', $jogos['numbers']);
                asort($numbers, SORT_NUMERIC);

                $matriz = [];
                $line = [];
                $index = 0;
                $count = 0;

                foreach ($numbers as $number) {
                    if ($count < 10) {
                        $count++;
                    } else {
                        $index++;
                        $count = 1;
                        $line = [];
                    }
                    array_push($line, $number);

                    $matriz[$index] = $line;
                }

            ?>

            <div class="border-bottom-dashed px-3 text-center">
                <table class="" style="width: 100%">
                    <?php $__currentLoopData = $matriz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cols): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="font text-center">
                                    <div class="number text-white text-bold text-size-5 border-radius m-auto"
                                        style="background-color: <?php echo e($jogos->typeGame->color); ?>">
                                        <?php echo e(strlen($cols) == 1 ? '0'.$cols : $cols); ?>

                                    </div>
                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>      

            <div class="py-2 px-3">
                <p>
                    <?php
                    $contDezenas = array();
                    $contDezenas = explode(',', $jogos['numbers']);
                ?>

                    <span class="font text-bold">QTDE DEZENAS: </span>
                    <span class="font"><?php echo e(count($contDezenas)); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">VALOR APOSTADO: </span>
                    <span class="font">R$<?php echo e(\App\Helper\Money::toReal($jogos['value'])); ?></span>
                </p>
                <p class="">
                    <span class="font text-bold">GANHO MÁXIMO: </span>
                    <span class="font">R$<?php echo e(\App\Helper\Money::toReal($jogos['premio'])); ?></span>
                </p>
            </div>

            
            <div class="page-break"></div>
        
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
</div>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/lotogiro-login/lotogiro/resources/views/admin/layouts/pdf/receiptTudo.blade.php ENDPATH**/ ?>