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
					<h4 style="text-align:left;"> {{ number_format($model->porcentagem_credito, 2)}}% para Credito </h4>                
				</div> 
				<div class="col-12 col-sm-4 dado">
					<h4 style="text-align:left;"> {{ number_format($model->porcentagem_credito_parcelado, 2)}}% para Credito Parcelado</h4>
				</div>
				<div class="col-12 col-sm-4 dado">
					<h4 style="text-align:left;">  {{ number_format($model->porcentagem_debito, 2) }}% para Debito</h4>
				</div>
				<div class="col-12 col-sm-4 dado">
				<h4 style="text-align:left;"> Repasse debito: {{$model->repasse_debito_dias}} dias </h4>
				</div>
				<div class="col-12 col-sm-4 dado">
				<h4 style="text-align:left;"> Máximo de parcelas: {{$model->max_parcelas}}</h4>
				</div>
			</section>
        </div>
        <div class="box-footer align-right">
            @permissao('operadoras-soft-delete')
                <button type="button" class="btn btn-danger" id='btnExcluir' remover-apos-excluir>
                    <i class="fa fa-times"></i> Excluir
                </button>
             @endpermissao
            @permissao('operadoras-editar')
                <a href="{{route('operadoras.edit', $model->id)}}" class="btn btn-success" title="Editar" remover-apos-excluir> 
                    <i class="fa fa-pencil"></i> Editar
                </a>
            @endpermissao
            <a class="btn btn-default" href="{{ URL::previous() }}"><i class="fa fa-reply"></i> Voltar</a>
        </div>
    </div>
</div>

@endsection

@push(Config::get('app.templateMasterScript' , 'script') )
<script>
    $(document).ready(function() {
        $('#btnExcluir').click(function (){
            excluirRecursoPeloId({{$model->id}}, "@lang('msg.conf_excluir_o', ['1' => 'operadora'])", "{{ route('operadoras.apagados') }}", 
                function(){
                    $('[remover-apos-excluir]').remove();
                    $('#divAlerta').slideDown();
                }
            );
        });
    });
</script>
@endpush