@extends('layout.admin')

@section('style')
    {!!Html::style('css/images.css')!!}
@stop

@section('title')
    Regalos
@stop

@section('content')
<table class="table table-bordered table-striped">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Stock</th>
        <th>Puntos</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <tr>
        <td>Sable laser</td>
        <td>Un hombre va al médico. Le cuenta que está deprimido. Le dice que la vida le parece dura y cruel. Dice que se siente muy solo en este mundo lleno de amenazas donde lo que nos espera es vago e incierto. El doctor le responde; “El tratamiento es sencillo, el gran payaso Pagliacci se encuentra esta noche en la ciudad, vaya a verlo, eso lo animará”. El hombre se echa a llorar y dice “Pero, doctor… yo soy Pagliacci”.</td>
        <td>{!! Html::image('images/gift1.png', null, array('class'=>'gift_img')) !!}</td>
        <td>10</td>
        <td>200</td>
        <td><a class="btn btn-info" href="{{url('admin/category/1/edit')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
                </td> 
        <td><a class="btn btn-info" href="#"  title="Eliminar" ><i class="glyphicon glyphicon-remove"></i></a> </td>
    </tr>
</table>
<nav>
    <ul class="pagination">
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
@stop

@section('javascript')

@stop