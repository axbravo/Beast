@extends('layout.admin')

@section('style')

@stop

@section('title')
Detalle de asistencia de Pedro alva
@stop

@section('content')
    <div class="row">
          <div class="col-sm-8">
             <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Hora Ingreso</th>
                  <th>Hora Salida</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>10:00 am</th>
                  <th>20:00 pm</th>
                  <th><a class="btn btn-info" href="" title="Editar" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-pencil"></i></a></th>
                </tr>
              </tbody>
             </table>


               <!-- MODAL -->
              <div class="modal fade"  id="editModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Modificar hora</h4>
                    </div>
                    <div class="modal-body">
                      <h5>Hora Inicio</h5>
                      {!!Form::input('date','horaIni', '',['class'=>'form-control','required'])!!}
                      <h5>Hora Fin</h5>
                      {!!Form::input('date','horaFin', '',['class'=>'form-control','required'])!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>                        
                        <button type="submit" class="btn btn-info" data-dismiss="modal">Guardar</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

          </div>
    </div>


@stop

@section('javascript')

@stop
