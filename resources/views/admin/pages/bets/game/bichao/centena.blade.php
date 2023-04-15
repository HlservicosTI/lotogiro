@extends('admin.layouts.master')

@section('title', trans('admin.games.listing-page-title'))

@section('content')
    <div class="col bg-white p-3">
        <div class="row">
            <div class="col-8 d-flex justify-content-end">
                <a href="{{ route('admin.bets.bichao.index')}}">
                    <button class="btn btn-info my-2 ml-1">Apostar</button>
                </a>
                <a href="{{ route('admin.bets.bichao.resultados') }}">
                    <button class="btn btn-info my-2 ml-1">Resultados</button>
                </a>
                <a href="{{ route('admin.bets.bichao.minhas.apostas') }}">
                    <button class="btn btn-info my-2 ml-1">Minhas apostas</button>
                </a>
                <a href="{{ route('admin.bets.bichao.cotacao')}}">
                    <button class="btn btn-info my-2 ml-1">Cotação</button>
                </a>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-8 justify-content-center">
                <div class="row">
                    <div class="col">
                        <h1>Bichão da Sorte</h1>
                        <p>Aposte agora mesmo no Bichão da Sorte!</p>
                        <hr/>
                        <p><u>Entenda como funciona a premiação:</u></p>
                        <p>
                            1° prêmio equivale ao valor cheio,
                            ou seja - se o fator multiplicador
                            de sua aposta for 5000x e valor de
                            sua aposta for de R$ 1,00 logo seu
                            prêmio será de R$ 5.000,00.
                        </p>
                        <p>
                            Do 2° prêmio em diante o valor é
                            dividido proporcionalmente.
                        </p>
                        <p>
                            1° e 2° prêmio: fator multiplicador/2
                        </p>
                        <p>
                            1°,2° e 3° prêmio: fator multiplicador/3
                        </p>
                            1°,2°,3° e 4° prêmio: fator multiplicador/4
                        </p>
                            1° ao 5° prêmio: fator multiplicador/5
                        </p>
                        <p>Veja mais detalhes na aba <b>"cotação."</b></p>
                    </div>
                </div>
            </div>
            <div style="background-color:#E9ECEF;" class="col-4 h-auto">
                <div class="row align-items-center mt-4">
                    <div class="col">
                        <h4 class="text-center">Carregar Jogo</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <p class="text-center">Seu carrinho está vazio, faça um jogo para realizar uma aposta.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="exampleFormControlSelect1">Selecione um estado</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Selecione um estado</option>
                                <option>Rio de Janeiro</option>
                                <option>São Paulo</option>
                                <option>Goiás</option>
                                <option>Minas Gerais</option>
                                <option>Bahia</option>
                                <option>Paraíba</option>
                                <option>Brasília</option>
                                <option>Ceará</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center mt-4 p-4">
                        <h5><b>Total: R$0,00</b></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center align-items-end mb-4">
                        <button class="btn btn-success" type="submit">Apostar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <script language=javascript type="text/javascript">
                            now = new Date
                            document.write(now.toLocaleString())
                            document.write("- Horário de Brasília.")
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col">
                <p>Escolha a modalidade:</p>
            </div>
        </div>
        <div class="row">
            <div class="col button-group overflow-auto">
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.index') }}"><b>Milhar</b></a>
                <a id="btn-group btn-centena" class="btn btn-primary" href="#"><b>Centena</b></a>
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.dezena') }}"><b>Dezena</b></a>
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.group') }}"> <b>Grupo</b></a>
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.milhar.centena')}}"> <b>Milhar/Centena</b></a>
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.terno.dezena')}}"><b>Termo de Dezena</b></a>
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.terno.grupo')}}"><b>Termo de Grupo</b></a>
                <a id="btn-group" class="btn btn-outline-primary" href="{{ route('admin.bets.bichao.duque.dezena')}}"><b>Duque de Dezena</b></a>
                <a id="btn-group" class="btn btn-outline-primary mt-1" href="{{ route('admin.bets.bichao.duque.grupo')}}"><b>Duque de Grupo</b></a>
            </div>
        </div>
        <hr/>
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

            {{-- PARTE DE PESQUISA DE CLIENTE SE NÃO TIVER AUTENTICAÇÃO --}}

            <input type="hidden" name="client" value="">
                <div class="row mb-3" id="list_group" style="max-height: 100px; overflow-y: auto">
                    <div class="col-md-12">
                    </div>
                </div>

                </div>
            <input type="hidden" class="form-control" id="type_game" name="type_game" value="" readonly>
        </div>
        <div class="container" id="centena-group">
            <hr />
            <div class="row align-items-center">
                <div class="col-1">
                    <p>Insira seu jogo:</p>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="input-centena"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-5">
                    <button id="btn-gerar-centena" onclick="insere_valor()" type="button" class="btn btn-secondary">Gerar Centena</button>
                </div>
            </div>
            <hr />
        </div>
        <div class="row">
            <div class="col">
                <p>Selecione os prêmios</p>
            </div>
        </div>
        <div class="row">
            <div class="col button-group">
                <a><button id="btn-award-first" onclick="button_first_award()" class="btn btn-outline-primary btn-award"><b>1º</b></button></a>
                <a><button id="btn-award-second" onclick="button_second_award()" class="btn btn-outline-primary btn-award"><b>2º</b></button></a>
                <a><button id="btn-award-third" onclick="button_third_award()" class="btn btn-outline-primary btn-award"><b>3º</b></button></a>
                <a><button id="btn-award-fourth" onclick="button_fourth_award()" class="btn btn-outline-primary btn-award"><b>4º</b></button></a>
                <a><button id="btn-award-fifth" onclick="button_fifth_award()" class="btn btn-outline-primary btn-award"><b>5º</b></button></a>
                <a><button id="btn-award-first-to-fifth" onclick="button_first_to_fifth_award()" class="btn btn-outline-primary btn-award"><b>1º ao 5º</b></button></a>
                <a><button id="btn-validate" onclick="check_award()" class="btn btn-success"><b>Validar Seleção</b></button></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <span id="message-award-value" class="text-danger d-none"><b>Favor selecionar ao menos um prêmio</b></span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p>Insira o valor da aposta:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">R$</span>
                    </div>
                    <input id="input_value_bet" type="text" class="form-control" placeholder="0,00" aria-label="valor"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Premiação
                    <span id="price_award" class="text-success">R$0,00</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="0.9em" height="0.9em" fill="currentColor"
                        class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                    </svg>
                </p>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col mb-2">
                <a><button id="btn-add-to-chart" class="btn btn-success disabled"><b>Adicionar ao Carrinho</b></button></a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css"
        integrity="sha512-bkB9w//jjNUnYbUpATZQCJu2khobZXvLP5GZ8jhltg7P/dghIrTaSJ7B/zdlBUT0W/LXGZ7FfCIqNvXjWKqCYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #filterForm {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        #filterForm .form-row {
            justify-content: flex-end;
            align-items: flex-end;
            margin: 0;
        }

        @media(max-width: 467px) {
            #filterForm .form-row {
                flex-direction: column;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"
        integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        const award = 600;
        const initial_value = 0;
        const input_value = $('#input_value');
        const button_first = $('#btn-award-first');
        const button_second = $('#btn-award-second');
        const label_award = $('#price_award');
        const input_value_bet = $('#input_value_bet');
        const message_minimum = $('#message-minimum-value');
        const message_maximum = $('#message-maximum-value');
        let value;

        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }

        input_value_bet.keyup(function (){
            const input_value_bet = $('#input_value_bet');
            const label_award = $('#price_award');
            const limit_maximum_bet = parseFloat('4.00'.replace(',', '.'));
            const limit_minimum_bet = parseFloat('0.49'.replace(',', '.'));
            const message = $('#message-minimum-value');
            const award_total=600;
            let value;


            if(input_value_bet.val() == ''){
                message.addClass('d-block');
                message.removeClass('d-none');
                label_award.text('R$0,00');
            }else{
                const value_input_bet = parseFloat(input_value_bet.val().replace(',', '.'));

                if(value_input_bet <= limit_minimum_bet){
                    message_minimum.removeClass('d-none');
                    message_minimum.addClass('d-block');
                }else if(value_input_bet > limit_maximum_bet){
                    message_maximum.addClass('d-block');
                    message_maximum.removeClass('d-none');
                    message_minimum.removeClass('d-block');
                    message_minimum.addClass('d-none');
                }else{
                    message_minimum.addClass('d-none');
                    message_minimum.removeClass('d-block');
                    message_maximum.addClass('d-none');
                    message_maximum.removeClass('d-block');

                    const option_award = validate_award();

                    if(option_award == 1){
                        value = award_total;
                    }else if(option_award == 2){
                        value = (award_total/2);
                    }else if(option_award == 3){
                        value = (award_total/3);
                    }else if(option_award == 4){
                        value = (award_total/4);
                    }else if(option_award == 5){
                        value = (award_total/5);
                    }else if(option_award == 6){
                        value = (award_total/5);
                    }

                    label_award.text('R$'+(value*value_input_bet).toFixed(2));
                }
            }
        });

        function insere_valor(){
            const btn_gerar_milhar = $('#btn-gerar-centena');
            const input_milhar = $('#input-centena');

            input_milhar.val((randomNumber(0, 9)+''+randomNumber(0, 9)+''+randomNumber(0, 9)));
        }

        function button_first_award(){
            const button_first = $('#btn-award-first');

            if(!button_first.hasClass('active')){
                button_first.addClass('active');
            }else{
                button_first.removeClass('active');
            }
        }

        function button_second_award(){
            const button_second = $('#btn-award-second');

            if(!button_second.hasClass('active')){
                button_second.addClass('active');
            }else{
                button_second.removeClass('active');
            }
        }

        function button_third_award(){
            const button_third = $('#btn-award-third');

            if(!button_third.hasClass('active')){
                button_third.addClass('active');
            }else{
                button_third.removeClass('active');
            }
        }

        function button_fourth_award(){
            const button_fourth = $('#btn-award-fourth');

            if(!button_fourth.hasClass('active')){
                button_fourth.addClass('active');
            }else{
                button_fourth.removeClass('active');
            }
        }

        function button_fifth_award(){
            const button_fifth = $('#btn-award-fifth');

            if(!button_fifth.hasClass('active')){
                button_fifth.addClass('active');
            }else{
                button_fifth.removeClass('active');
            }
        }

        function button_first_to_fifth_award(){

            const button_first = $('#btn-award-first');
            const button_second = $('#btn-award-second');
            const button_fifth = $('#btn-award-fifth');
            const button_third = $('#btn-award-third');
            const button_fourth = $('#btn-award-fourth');
            const button_first_to_fifth = $('#btn-award-first-to-fifth');

            if(!button_first_to_fifth.hasClass('active')){
                button_first.addClass('active');
                button_second.addClass('active');
                button_third.addClass('active');
                button_fourth.addClass('active');
                button_fifth.addClass('active');
                button_first_to_fifth.addClass('active');
            }else{
                button_first.removeClass('active');
                button_second.removeClass('active');
                button_third.removeClass('active');
                button_fourth.removeClass('active');
                button_fifth.removeClass('active');
                button_first_to_fifth.removeClass('active');
            }
        }

        function validate_award(){
            const array_buttons = $('.btn-award');
            const label_award = $('#price_award');

            const message = $('#message-award-value');
            let contador = 0;

            for(i=0;i<array_buttons.length;i++){
                const btn_id = $(`#${array_buttons[i]['id']}`);
                if(btn_id.hasClass('active')){
                    contador += 1;
                }
            }
            return contador;
        }

        function check_award(){
            const message = $('#message-award-value');
            const label_award = $('#price_award');
            const btn_add_to_cart = $('#btn-add-to-chart');

            if(validate_award() == 0){
                message.removeClass('d-none');
                message.addClass('d-block');
                const initial_value = 0;

                label_award.text(('R$'+initial_value+',00').toLocaleString('pt-BR',{
                    minimumFractionDigits: 2
                }));
            }else if(validate_award() == 1){
                message.removeClass('d-block');
                message.addClass('d-none');

                label_award.text('R$'+award.toLocaleString('pt-BR',{
                    minimumFractionDigits: 2,
                }));
                btn_add_to_cart.removeClass('disabled');
            }else if(validate_award() == 2){
                message.removeClass('d-block');
                message.addClass('d-none');

                label_award.text('R$'+(award/2).toLocaleString('pt-BR',{
                    minimumFractionDigits: 2,
                }));
                btn_add_to_cart.removeClass('disabled');
            }else if(validate_award() == 3){
                message.removeClass('d-block');
                message.addClass('d-none');

                label_award.text('R$'+(award/3).toLocaleString('pt-BR',{
                    minimumFractionDigits: 2,
                }));
                btn_add_to_cart.removeClass('disabled');
            }else if(validate_award() == 4){
                message.removeClass('d-block');
                message.addClass('d-none');

                label_award.text('R$'+(award/4).toLocaleString('pt-BR',{
                    minimumFractionDigits: 2,
                }));
                btn_add_to_cart.removeClass('disabled');
            }else if(validate_award() == 5){
                message.removeClass('d-block');
                message.addClass('d-none');

                label_award.text('R$'+(award/5).toLocaleString('pt-BR',{
                    minimumFractionDigits: 2,
                }));
                btn_add_to_cart.removeClass('disabled');
            }else if(validate_award() == 6){
                message.removeClass('d-block');
                message.addClass('d-none');

                label_award.text('R$'+(award/5).toLocaleString('pt-BR',{
                    minimumFractionDigits: 2,
                }));
                btn_add_to_cart.removeClass('disabled');
            }
        }
    </script>
@endpush