@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )
	Listagem dos Serviços			
@endsection


@section( Config::get('app.templateMasterMenuLateral' , 'menuLateral')  )				
	@permissao('servicos-apagados')
		<li><a href="{{  route('servicos.apagados')}}"><i class="fa fa-circle-o text-red"></i> <span>Serviços Apagados</span></a></li>
	@endpermissao
@endsection


@section( Config::get('app.templateMasterContentTituloSmallRigth' , 'small-content-header-right')  )
	@permissao('servicos-cadastrar')			
		<a href="{{ route('servicos.create')}}" class="btn btn-success btn-sm" title="Adicionar um novo Serviço">
			<i class="fa fa-plus"></i> Cadastrar Serviço
		</a> 
	@endpermissao			
@endsection

@push( Config::get('app.templateMasterCss' , 'css')  )			
	<style type="text/css">
		.btn-group-sm>.btn, .btn-sm {
			padding: 1px 10px;
			font-size: 15px;		
		} 
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding: 5.5px;
		}
	</style>
@endpush


@section( Config::get('app.templateMasterContent' , 'content')  )

<div class="col-xs-12">
    <div class="box box-success">	 
        <div class="box-body" style="padding-top: 5px; padding-bottom: 3px;">
            <table class="table table-bordered table-striped table-hover" id="datatable">
                <thead>
                    <tr>
						<th  style="max-width:20px">ID</th>
						<th pesquisavel>Nome</th>
						<th>Valor</th>						
						<th>Duração</th>										
						<th>Porc. Func.</th>
						<th>Categoria</th>
						<th style="max-width:70px">Desconto Máx.</th>												
                        <th class="align-center" style="width:120px">Ações</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection


@push(Config::get('app.templateMasterScript' , 'script') )
	<script src="{{ mix('js/datatables-padrao.js') }}" type="text/javascript"></script>

	<script>
		$(document).ready(function() {
			var dataTable = datatablePadrao('#datatable', {
				order: [[ 1, "asc" ]],
				ajax: { 
					url:'{{ route('servicos.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nome', name: 'nome' },
					{ data: 'valor', name: 'valor' },
					{ data: 'duracao_aproximada', name: 'duracao_aproximada' },					
					{ data: 'porcentagem_funcionario', name: 'porcentagem_funcionario' },
					{ data: 'categoria', name: 'categoria' },
					{ data: 'desconto_maximo', name: 'desconto_maximo' ,  visible: false },
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});

			dataTable.on('draw', function () {
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'servicos' ])", "{{ route('servicos.apagados') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});
			});
		});
	</script>
@endpush

