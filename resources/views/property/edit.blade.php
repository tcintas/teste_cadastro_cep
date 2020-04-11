@extends('layouts.app')


@section('content')
<div class="container my-3">
    <h1>Formulário de Edição de Ativos</h1>
    @php 
    $property = (isset($property->id)) ? $property : $property[0];
    @endphp
    <script type="text/javascript">
        function validar(){
            var product_name = editproduct.product_name.value; 
            var amount = editproduct.amount.value;
            var ini_year = editproduct.ini_year.value;
            var current_year = new Date().getFullYear();

            if(product_name == "" || isNaN(amount) || ini_year > current_year){
                    $('#feedback').html('<div class="alert alert-danger" role="alert"><p><b>REGRAS PARA PREENCHIMENTO</b></p><p>*O nome do Ativo é obrigatório</p><p>*Preencha o campo quantidade com um número (Decimais serão arredondados)</p><p>*Ano de início de uso deve ser igual ou menor que o atual</p></div>');
                    editproduct.product_name.focus();
                    return false;
                }
        }

        function limpa_formulário_cep() {
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
                document.getElementById('ibge').value=(conteudo.ibge);
            } 
            else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {

            var cep = valor.replace(/\D/g, '');

            if (cep != "") {
                var validacep = /^[0-9]{8}$/;

                if(validacep.test(cep)) {

                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
                    document.getElementById('ibge').value="...";

                    var script = document.createElement('script');

                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    document.body.appendChild(script);

                } 
                else {
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } 
            else {
                limpa_formulário_cep();
            }
        };
    </script>

    <div id='feedback'>        
    </div>
    <form name="editproduct" action="<?= url('/hubchain/update', ['id' => $property->id]);?>" method="post">
        <?= csrf_field(); ?>
        <?= method_field('PUT'); ?>
        <div class="text-left col-sm-6">
            <div class="form-group">
                <h4 class="my-3"><b>Dados do Ativo</b></h4>
                
                <label for="product_name">Nome do Ativo</label>
                <input type="text" name="product_name" id="product_name" value="<?= $property->product_name; ?>" class="form-control">

                <label for="amount">Quantidade</label>
                <input type="integer" name="amount" id="amount" value="<?= $property->amount; ?>" class="form-control">

                <label for="ini_year">Ano de início de Uso</label>
                <input type="integer" name="ini_year" id="ini_year" value="<?= $property->ini_year; ?>" class="form-control">

                <h4 class="my-3"><b>Dados do Fornecedor</b></h4>

                <label for="provider_name">Fornecedor</label>
                <input type="text" name="provider_name" id="provider_name" value="<?= $property->provider_name; ?>" class="form-control">

                <h4 class="my-3"><b>Endereço</b></h4>

                <label for="zipcode">Cep:</label>
                <input type="text" name="zipcode" id="cep" value="<?= $property->zipcode; ?>"  maxlength="9" class="form-control"
                onblur="pesquisacep(this.value);"/>

                <label for="street">Rua:</label>
                <input type="text" name="street" id="rua" value="<?= $property->street; ?>" class="form-control" />

                <label for="district">Bairro:</label>
                <input type="text" name="district" id="bairro" value="<?= $property->district; ?>" class="form-control" />

                <label for="city">Cidade:</label>
                <input type="text" name="city" id="cidade" value="<?= $property->city; ?>" class="form-control" />

                <label for="state">Estado:</label>
                <input type="text" name="state" id="uf" value="<?= $property->state; ?>" class="form-control" />

                <label for="ibge">IBGE:</label>
                <input type="text" name="ibge" id="ibge" value="<?= $property->ibge; ?>" class="form-control" />
                                    
            </div>
            <button type="submit" onclick="return validar()" class="btn btn-primary my-2">Editar Ativo</button>
            <a class="btn btn-secondary" href="<?= url('/hubchain'); ?>" role="button">Voltar</a>
        </div>
    </form>
</div>
@endsection