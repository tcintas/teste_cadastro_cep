@extends('layouts.app')


@section('content')
<div class="container my-3">
    <div class="card text-white bg-dark mb-3 card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header text-center"><h1>Visualizar</h1>
        </div>
        <div class="card-body text-center">
            @if(!empty($property))
                @foreach($property as $prop)    
                <h4 class="my-3"><b>Dados do Ativo</b></h4>
                <p><b>Nome do Ativo:</b> <?= $prop->product_name;?></p>
                <p><b>Quantidade:</b> <?= $prop->amount;?></p>
                <p><b>Ano de Início de Uso	:</b> <?= $prop->ini_year;?></p>
                <br><h4 class="my-3"><b>Dados do Fornecedor</b></h4>
                <p><b>Nome do Fornecedor:</b> <?= $prop->provider_name;?></p>
                <br><h4 class="my-3"><b>Endereço</b></h4>
                <p><b>Cep:</b> <?= $prop->zipcode;?></p>
                <p><b>Rua:</b> <?= $prop->street;?></p>
                <p><b>Bairro:</b> <?= $prop->district;?></p>
                <p><b>Cidade:</b> <?= $prop->city;?></p>
                <p><b>Estado:</b> <?= $prop->state;?></p>
                <p><b>IBGE:</b> <?= $prop->ibge;?></p>
                @endforeach
            @endif
        </div>    
    </div>
    <a class="btn btn-secondary my-2" href="<?= url('/hubchain'); ?>" role="button">Voltar</a>
</div>
@endsection