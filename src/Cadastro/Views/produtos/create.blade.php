@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )			
	Adicionar Produto
@endsection
    
@section( Config::get('app.templateMasterContent' , 'content')  )

<div class="col-md-12">
    <div class="box box-success">
        <form method="post" action="{{route('produtos.store')}}">            
            {{csrf_field()}}
            @include('cadastro::produtos._form', ['model' => new Manzoli2122\Salao\Cadastro\Models\Produto()])
            <div class="box-footer align-right">
                <a class="btn btn-default" href="{{ URL::previous() }}"><i class="fa fa-reply"></i> Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection