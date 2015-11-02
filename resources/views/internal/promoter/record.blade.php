@extends('layout.promoter')

@section('style')

@stop

@section('title')
    Historial de eventos
@stop

@section('content')
    <table class="table table-bordered table-striped" id="events">
      <thead>
        <tr>
          <th>Código de Evento</th>
          <th>Nombre de Evento</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Estado</th>
          <th>Entradas Vendidas</th>
          <th>Monto Acumulado</th>
          <th>Ver</th>
          <th>Editar</th>
          <th>Cancelar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($events as $event)
        <tr>
          <td>{{$event->id}}</td>
          <td>{{$event->name}}</td>
          <td>19/09/2015</td>
          <td>25/10/2015</td>
          <td>Vigente</td>
          <td>1500</td>
          <td>17500.00</td>
          <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#info{{$event->id}}" data-whatever="@mdo"><i class="glyphicon glyphicon-plus"></i></button>
      <div class="modal fade" id="info{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Detalle de Evento</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <h4>{{$event->name}}</h4>
                  <p>Codigo: {{$event->id}}</p>
                  <p>Creado Por: {{$event->organization->businessName}}</p>
                  <p>Promotor: {{$event->organization->organizerName}} {{$event->organization->organizerLastName}}</p>
                  <p>Fecha Creación: {{$event->created_at}}</p>
                  <p>Fecha Duración: 19/09/2015 al 25/10/2015</p>
                  <h4>Entradas:</h4>
                  <ul>
                    @foreach($event->zones as $zone)
                    <li>{{$zone->name}} : {{$zone->price}}</li>
                    @endforeach
                  </ul>
                  <br>
                  <h4>Información de Ventas</h4>
                  <p>Status           : Vigente</p>
                  <p>Entradas Vendidas: 1500</p>
                  <p>Total Acumulado  : 17500.00</p>
                  <p>Deposito Creador : 3000.00</p>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
          </td>
          <td><a type="button" class="btn btn-info" href="{{url('promoter/event/'.$event->id.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
          <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#cancel" data-whatever="@mdo"><i class="glyphicon glyphicon-remove"></i></button></td>
        </tr>
        @endforeach
        </tbody>
      </table>


          <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Cancelación de Evento</h4>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <h4>Nubeluz El Encuentro</h4>
                <p>Motivo de cancelación </p>
                <input></input>
                <p>Fecha de reembolso</p>
                <input type="date"></input>

                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Guardar</button>
                </div>
              </div>
            </div>
          </div>
@stop

@section('javascript')

@stop