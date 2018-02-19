@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )
	Listagem dos Operadoras			
@endsection

@section( Config::get('app.templateMasterMenuLateral' , 'menuLateral')  )				
	@permissao('operadoras-apagados')
		<li><a href="{{  route('operadoras.apagados')}}"><i class="fa fa-circle-o text-red"></i> <span>Operadoras Apagadas</span></a></li>
	@endpermissao
@endsection


@section( Config::get('app.templateMasterContentTituloSmallRigth' , 'small-content-header-right')  )
	@permissao('operadoras-cadastrar')		
		<a href="{{ route('operadoras.create')}}" class="btn btn-success btn-sm" title="Adicionar uma nova Operadora">
			<i class="fa fa-plus"></i> Cadastrar Operadora
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
						<th style="max-width:20px">ID</th>
						<th pesquisavel>Nome</th>
						<th>Porc. Credito</th>
						<th>Porc. Cred. Parc.</th>
						<th>Porc. Debito</th>
						<th>Máx. de Parcelas</th>							
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
				order: [[ 0, "asc" ]],
				ajax: { 
					url:'{{ route('operadoras.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nome', name: 'nome' },
					{ data: 'porcentagem_credito', name: 'porcentagem_credito' },
					{ data: 'porcentagem_credito_parcelado', name: 'porcentagem_credito_parcelado' },
					{ data: 'porcentagem_debito', name: 'porcentagem_debito' },
					{ data: 'max_parcelas', name: 'max_parcelas' },
					
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});

			dataTable.on('draw', function () {
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'operadora'])", "{{ route('operadoras.apagados') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});
			});
		});
	</script>
@endpush