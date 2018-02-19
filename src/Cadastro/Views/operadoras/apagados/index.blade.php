@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )
	Listagem dos Operadoras			
@endsection

@section( Config::get('app.templateMasterMenuLateral' , 'menuLateral')  )	
		<li><a href="{{  route('operadoras.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Operadoras Ativas</span></a></li>
@endsection

@section( Config::get('app.templateMasterContent' , 'content')  )

<div class="col-xs-12">
    <div class="box box-success">        
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover" id="datatable">
                <thead>
                    <tr>
						<th>ID</th>
						<th pesquisavel>Nome</th>
						<th>Porc. Credito</th>
						<th>Porc. Credito Parc.</th>
						<th>Porc. Debito</th>
						<th>Máximo de Parcelas</th>									
                        <th class="align-center" style="width:100px">Ações</th>
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
					url:'{{ route('operadoras.getDatatable.apagados') }}'
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
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'tipo de seção'])", "{{ route('operadoras.index') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});
			});
		});
	</script>
@endpush