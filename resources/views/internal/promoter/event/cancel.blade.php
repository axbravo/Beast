@extends('layout.promoter')

@section('style')

@stop

@section('title') Cancelar Evento
@stop

@section('content')
<div class="row">
    <div class="col-sm-6">
        <p><b>Nombre: </b> {{$event->name}}</p>
        <p><b>Organizador: </b> {{$event->organization["organizerName"]}}</p>
        <p><b>Funciones</b>:</p>
        <ul>
            @foreach($event->presentations as $presentation)
            <li>{{ date("d-M-Y",$presentation->starts_at)}}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-sm-6">
        <form class="form-horizontal" method="post">
        {!!Form::open(array('id'=>'form','class'=>'form-horizontal'))!!}
            <input name="event_id" value="{{$event->id}}" type="hidden">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Devolución:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date_refund" required>
                  <div class="col-sm-6" id="firefox" style="visibility: hidden">
                      Formato fecha: aaaaa-mm-dd
                  </div>                    
                    <span class="help">Fecha de devolución</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Duración</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="numeric" class="form-control" name="duration" required>
                        <span class="input-group-addon">Días</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Razón</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="reason" required>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Autorizado?</label>
                <div class="col-sm-10">
                    <select name="authorized" class="form-control">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                    <span class="help-block small">Autorizado para devolver entradas?</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-info" data-toggle="modal" data-target="#submitModal">Guardar</a>
                </div>
            </div>

              <div class="modal fade"  id="submitModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">¿Estas seguro que desea cancelar la presentaciòn?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                        <button id="yes" type="submit" class="btn btn-info">Si</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
        </form>
    </div>
</div>
@stop

@section('javascript')

<script>
$('document').ready(function () {

  if(navigator.userAgent.indexOf("Firefox")>-1 ) {
    console.log("its firefox");
    document.getElementById('firefox').style.visibility='visible';
  }
})
</script>   

@stop