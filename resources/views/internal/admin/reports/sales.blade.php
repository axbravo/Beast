@extends('layout.admin')

@section('style')

@stop

@section('title')
	Reporte de Ventas
@stop

@section('content')
<div class="row">
    <div class="col-sm-3">
        <label>Seleccione el eventos</label>
        <select class="form-control">
          <option value="volvo">Todos los evento</option>
          <option value="saab">Peppa King</option>
          <option value="opel">Arctic Monkey Concert</option>
          <option value="audi">Fuerza Bruta</option>
           <option value="audi">Peppa y sus amigos</option>
        </select>
    </div>
    <div class="col-sm-2">
        <label>Desde</label>
        <input type="date" class="form-control">
    </div>
    <div class="col-sm-2">
        <label>Hasta</label>
        <input type="date" class="form-control">
    </div>
    <div class="col-sm-2">
        <label>Tipo</label>
        <select class="form-control">
          <option value="opel">Tabla</option>
          <option value="volvo">Excel</option>
          <option value="saab">PDF</option>
        </select>
    </div>
    <div class="col-sm-3">
        <br>
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Mostrar Reporte</button>
    </div>
</div>
<hr>


<div id="demo2" class="collapse">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Nombre del evento</th>
            <th>Número de entradas vendidas online</th>
            <th>Subtotal</th>
            <th>Número de entradas vendidas en módulo</th>
            <th>Subtotal</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Peppa King</td>
            <td>500</td>
            <td>3750.00</td>
            <td>200</td>
            <td>1500</td>
            <td>5200.50</td>
        </tr>
        <tr>
            <td>Arctic Monkeys Concert</td>
            <td>500</td>
            <td>3750.00</td>
            <td>200</td>
            <td>1500</td>
            <td>5200.50</td>
        </tr>
        <tr>
            <td>Fuerza Bruta</td>
            <td>500</td>
            <td>3750.00</td>
            <td>200</td>
            <td>1500</td>
            <td>5200.50</td>
        </tr>
        <tr>
            <td>Peppa y sus amigos</td>
            <td>500</td>
            <td>3750.00</td>
            <td>200</td>
            <td>1500</td>
            <td>5200.50</td>
        </tr>
    </table>
</div>

@stop

@section('javascript')

@stop