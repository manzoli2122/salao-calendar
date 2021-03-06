@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )			
	Editar Operadora
@endsection

@section( Config::get('app.templateMasterContent' , 'content')  )

<div class="col-md-12">
    <div class="box box-success">
        <form method="post" action="{{route('operadoras.update', $model->id)}}">            
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            @include('cadastro::operadoras._form', ['model' => $model])
            <div class="box-footer align-right">
                <a class="btn btn-default" href="{{ route('operadoras.index') }}"><i class="fa fa-reply"></i> Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection