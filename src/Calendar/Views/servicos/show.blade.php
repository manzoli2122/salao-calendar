@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )		
		{{$model->nome}}
@endsection


@section( Config::get('app.templateMasterContent' , 'content')  )



<div class="col-md-12">
    <div class="box box-success">
        <div class="box-body">
            
            <div class="alert alert-default alert-dismissible align-center invisivel" id="divAlerta">
                <label>Excluído</label>
            </div>

			
			<section class="row text-center dados">

                <div class="col-12 col-sm-4 dado">
                    <h4 style="text-align:left;">Valor: R$ {{ number_format($model->valor , 2 ,',', '') }}</h4>
                </div> 

                <div class="col-12 col-sm-4 dado">
                    <h4 style="text-align:left;"> {{$model->porcentagem_funcionario}}% para o Funcionário </h4>
                </div> 
                
                <div class="col-12 col-sm-4 dado">
                    <h4 style="text-align:left;"> Desconto Máximo: {{$model->desconto_maximo}}% </h4>
                </div> 	

                <div class="col-12 col-sm-4 dado">
                    <h4 style="text-align:left;"> Categoria: {{$model->categoria}}</h4>
                </div> 

                <div class="col-12 col-sm-4 dado">
                    <h4 style="text-align:left;"> Duração aprox.: {{$model->duracao_aproximada}} min </h4>
                </div> 

                <div class="col-12 col-sm-12 dado">
                    <h4 style="text-align:left;"> Observações: {{$model->observacoes}} </h4>
                </div>			
			</section>


        </div>


        <div class="box-footer align-right">
            @permissao('servicos-soft-delete')
                <button type="button" class="btn btn-danger" id='btnExcluir' remover-apos-excluir>
                    <i class="fa fa-times"></i> Excluir
                </button>
             @endpermissao
            @permissao('servicos-editar')
                <a href="{{route('servicos.edit', $model->id)}}" class="btn btn-success" title="Editar" remover-apos-excluir> 
                    <i class="fa fa-pencil"></i> Editar
                </a>
            @endpermissao
            <a class="btn btn-default" href="{{ URL::previous() }}">
                <i class="fa fa-reply"></i> Voltar
            </a>
        </div>
    </div>
</div>

@endsection



@push(Config::get('app.templateMasterScript' , 'script') )
<script>
    $(document).ready(function() {
        $('#btnExcluir').click(function (){
            excluirRecursoPeloId({{$model->id}}, "@lang('msg.conf_excluir_o', ['1' => 'serviços'])", "{{ route('servicos.apagados') }}", 
                function(){
                    $('[remover-apos-excluir]').remove();
                    $('#divAlerta').slideDown();
                }
            );
        });
    });
</script>
@endpush





