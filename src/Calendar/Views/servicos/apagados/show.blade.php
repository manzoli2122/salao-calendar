@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )		
		{{$model->nome}}
@endsection


@section( Config::get('app.templateMasterContent' , 'content')  )
        
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



        <div class="box-footer align-right">
            <a class="btn btn-default" href="{{ URL::previous() }}">
                <i class="fa fa-reply"></i> Voltar
            </a>
        </div>

    @endsection