<div class="box-body">	
     <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome da Operadora de cartão"
                    value="{{$model->nome or old('nome')}}">
                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('porcentagem_credito') ? 'has-error' : ''}}">
                <label for="porcentagem_credito">Taxa credito</label>
                <input type="number" step="0.01" class="form-control" name="porcentagem_credito" placeholder="Taxa credito"
                    value="{{$model->porcentagem_credito or old('porcentagem_credito')}}">
                {!! $errors->first('porcentagem_credito', '<p class="help-block">:message</p>') !!}
            </div>   
            <div class="form-group {{ $errors->has('max_parcelas') ? 'has-error' : ''}}">
                <label for="max_parcelas">Nº max. de parcelas</label>
                <input type="number" min="1" max="12" class="form-control" name="max_parcelas" placeholder="Nº max. de parcelas"
                    value="{{$model->max_parcelas or old('porcentagem_credito')}}">
                {!! $errors->first('max_parcelas', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('porcentagem_credito_parcelado') ? 'has-error' : ''}}">
                <label for="porcentagem_credito_parcelado">Taxa credito parcelado</label>
                <input type="number" step="0.01" class="form-control" name="porcentagem_credito_parcelado" placeholder="Taxa credito parcelado"
                    value="{{$model->porcentagem_credito_parcelado or old('porcentagem_credito_parcelado')}}">
                {!! $errors->first('porcentagem_credito_parcelado', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('porcentagem_debito') ? 'has-error' : ''}}">
                <label for="porcentagem_debito">Taxa debito</label>
                <input type="number" step="0.01" class="form-control" name="porcentagem_debito" placeholder="Taxa debito"
                    value="{{$model->porcentagem_debito or old('porcentagem_debito')}}">
                {!! $errors->first('porcentagem_debito', '<p class="help-block">:message</p>') !!}
            </div>     
            <div class="form-group {{ $errors->has('repasse_debito_dias') ? 'has-error' : ''}}">
                <label for="repasse_debito_dias">Repasse debito</label>
                <input type="number" min="0" max="31" class="form-control" name="repasse_debito_dias" placeholder="Quantidade de dias para o repasse"
                    value="{{$model->repasse_debito_dias or old('repasse_debito_dias')}}">
                {!! $errors->first('repasse_debito_dias', '<p class="help-block">:message</p>') !!}
            </div>
        </div> 
    </div> 
 </div>      