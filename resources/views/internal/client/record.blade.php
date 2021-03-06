@extends('layout.client')

@section('style')
@stop

@section('title')
	Historial de eventos
@stop

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Código ticket</th>
            <th>Fecha de presentación</th>
            <th>Cancelado?</th>
            <th>Nombre del Evento</th>
            <th>Número de entradas</th>
            <th>Costo Total</th>
            <th>Código de reserva</th>
            <th>Fecha de pago</th>
        </tr>
        @foreach($tickets as $ticket)
        <tr>
           <td>{{$ticket->id}}</td>
           <td>{{date("d/m/Y", $ticket->presentation["starts_at"])}} </td>
           <td>@if ($ticket->presentation["cancelled"]) Si @else No @endif</td>
           @if($ticket->event["cancelled"])
           <td>{{$ticket->event["name"]}}</td>
           @else
           <td><a href="{{ url ('event/'.$ticket->event_id) }}">{{$ticket->event["name"]}}</a></td>
           @endif
           <td>{{$ticket->quantity}}</td>
           <td>s/. {{$ticket->total_price}}</td>
           <td>{{$ticket->reserve}}</td>
           <td>{{$ticket->payment_date}}</td>
        </tr>
        @endforeach
    </table>
    {!!$tickets->render()!!}
@stop

@section('javascript')
@stop