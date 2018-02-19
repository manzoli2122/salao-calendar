<div class="box-body">	
     <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome do Serviço"
                    value="{{$model->nome or old('nome')}}" {{ $model->id and false  ? 'readonly' : '' }}>
                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
                <label for="valor">Valor</label>
                <input type="number" step="0.01" class="form-control" name="valor" placeholder="Valor"
                    value="{{$model->valor or old('valor')}}">
                {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
            </div>    
            <div class="form-group {{ $errors->has('porcentagem_funcionario') ? 'has-error' : ''}}">
                <label for="porcentagem_funcionario">Porc. do Funcionário</label>
                <input type="number"  class="form-control" name="porcentagem_funcionario" placeholder="porcentagem funcionario"
                    value="{{$model->porcentagem_funcionario or old('porcentagem_funcionario')}}">
                {!! $errors->first('porcentagem_funcionario', '<p class="help-block">:message</p>') !!}
            </div>    
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
                <label  for="categoria">Categoria</label>
                 <select id="categoria" class="form-control" name="categoria"  required>
                    <option value="">Selecione a Categoria</option>
                    <option value="Cabelo" {{$model->categoria == 'Cabelo' ? 'selected' : ''  }}>  Cabelo  </option>
                    <option value="Depilação" {{$model->categoria == 'Depilação' ? 'selected' : ''  }}>  Depilação  </option>
                    <option value="Estetica Corporal" {{$model->categoria == 'Estetica Corporal' ? 'selected' : ''  }}>  Estetica Corporal  </option>
                    <option value="Estetica Facial" {{$model->categoria == 'Estetica Facial' ? 'selected' : ''  }}>  Estetica Facial  </option>
                    <option value="Manicure e Pedicure" {{$model->categoria == 'Manicure e Pedicure' ? 'selected' : ''  }} >  Manicure e Pedicure  </option>
                    <option value="Maquiagem" {{$model->categoria == 'Maquiagem' ? 'selected' : ''  }}>  Maquiagem  </option>
                    <option value="Massagem" {{$model->categoria == 'Massagem' ? 'selected' : ''  }}>  Massagem  </option>
                    <option value="Podologia" {{$model->categoria == 'Podologia' ? 'selected' : ''  }} >  Podologia  </option>
                    <option value="Outros" {{$model->categoria == 'Outros' ? 'selected' : ''  }}>  Outros  </option>
                </select> 
                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
            </div> 
            <div class="form-group {{ $errors->has('duracao_aproximada') ? 'has-error' : ''}}">
                <label for="duracao_aproximada">Duração aproximada (min)</label>
                <input type="number"  class="form-control" name="duracao_aproximada" placeholder="duração aproximada (min)"
                    value="{{$model->duracao_aproximada or old('duracao_aproximada')}}">
                {!! $errors->first('duracao_aproximada', '<p class="help-block">:message</p>') !!}
            </div> 
            <div class="form-group {{ $errors->has('desconto_maximo') ? 'has-error' : ''}}">
                <label for="desconto_maximo">Desconto máximo(%)</label>
                <input type="number" min="0" max="100" class="form-control" name="desconto_maximo" placeholder="desconto máximo(%)"
                    value="{{$model->desconto_maximo or old('desconto_maximo')}}">
                {!! $errors->first('desconto_maximo', '<p class="help-block">:message</p>') !!}
            </div>              
        </div> 
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('observacoes') ? 'has-error' : ''}}">
                <label for="observacoes">Observações</label>
                <input type="text" class="form-control" name="observacoes" placeholder="observacoes"
                    value="{{$model->observacoes or old('observacoes')}}">
                {!! $errors->first('observacoes', '<p class="help-block">:message</p>') !!}
            </div>
        </div>                     
    </div> 
 </div>      