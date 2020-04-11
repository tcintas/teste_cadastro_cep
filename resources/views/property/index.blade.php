@extends('layouts.app')


@section('content')

<div class="container my-3">
    <h1>Listagem de Ativos</h1>

    @if (!empty($properties)) 
        
        <table class= 'table table-striped table-hover table-sm table-responsive-md'>

            <thead class = 'bg-primary text-white font-weight-bold'> 
                        <td>Nome</td>
                        <td>Quantidade</td>
                        <td>Ano de Início de Uso</td>
                        <td>Disponível para Venda?</td>
                        <td>Ações</td>    
            </thead>
                
            @foreach ($properties as $property)
                @php
                    $linkReadMore = url('/hubchain/' . $property->item);
                    $linkEditItem = url('/hubchain/editar/' . $property->item);
                    $linkRemoveItem = url('/hubchain/remover/' . $property->item);                
                
                    $current_year = date('Y');
                    $alert_year = $current_year - $property->ini_year;
                @endphp

                <tr> 
                    <td>{{$property->product_name}}</td>
                    <td>{{$property->amount}}</td>
                    <td>{{$property->ini_year}}</td>

                    @if($alert_year > 3)
                    <td class="text-success"><b>Sim</b></td>
                    @else
                    <td class="text-danger"><b>Não</b></td>
                    @endif
                    
                    @php   
                    echo "<td><a href= '$linkReadMore'>Ver Mais</a> | <a href= '$linkEditItem'>Editar</a> | <a href= '$linkRemoveItem'>Remover</a></td>";
                    @endphp
                </tr>
                
                @if ($property->amount <5)
                    <div class="alert alert-danger">
                        O Ativo <b>{{$property->product_name . ' , '}}</b>esta com estoque abaixo de 5 unidades, é necessária reposição.
                    </div>
                @endif
            @endforeach  
        </table>  
    @endif
</div>
@endsection