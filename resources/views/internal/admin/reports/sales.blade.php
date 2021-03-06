@extends('layout.admin')

@section('style')

@stop

@section('title')
	Reporte de Ventas
@stop

@section('content')
{!!Form::open(array('url' => 'admin/report/sales', 'id'=>'form','class'=>'form-horizontal'))!!}
<div class="col-sm-3">
    <label>Ingrese nombre del evento</label>
    {!!Form::text('name', null ,['class'=>'form-control', 'id'=>'search','placeholder' => 'Nombre del evento'])!!}
</div>
<div class="col-sm-9">
    <div class="col-sm-4">
        <label>Desde</label>
        {!!Form::input('date','firstDate', null ,['class'=>'form-control','id'=>'fecha-ini', 'required'])!!}
                  <div class="col-sm-6" id="firefox" style="visibility: hidden">
                      Formato fecha: aaaaa-mm-dd
                  </div>           
    </div>
    <div class="col-sm-4">
        <label>Hasta</label>
        {!!Form::input('date','lastDate', null ,['class'=>'form-control','id'=>'fecha-fin','required'])!!}
                  <div class="col-sm-6" id="firefox2" style="visibility: hidden">
                      Formato fecha: aaaaa-mm-dd
                  </div>           
    </div>
    <div class="col-sm-4"><br><button class="btn btn-info" type="button" id = 'botoncito' >Buscar</button></div>
</div>
<div class="col-sm-12">
    <div class="col-sm-12">
        <div id="error-msg1" style="visibility: hidden"> <p class="alert alert-danger" >Rango de fechas incorrecto</p></div>
        <hr>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre del evento</th>
            <th>Fecha</th>
            <th>Número de entradas vendidas online</th>
            <th>Subtotal</th>
            <th>Número de entradas vendidas en módulo</th>
            <th>Subtotal</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody id="fbody">
        @foreach($eventInformation as $event)
        <tr>
            <td>{{$event[0]}}</td>
            <td>{{$event[2]}}</td>
            <td>{{$event[3]}}</td>
            <td>{{$event[4]}}</td>
            <td>{{$event[5]}}</td>
            <td>{{$event[6]}}</td>
            <td>{{$event[7]}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>

    <br>

    <h5>Seleccione el tipo de formato de su reporte</h5>  
    <div class="col-sm-2">
            {!!Form::select('type', [
               '1' => 'Excel',
               '2' => 'PDF'],
               null,
               ['class' => 'form-control']
            )!!}
    </div>

    <div class="col-sm-2">
        <button type="submit" class="btn btn-info">Descargar Archivo</button>
    </div>
</div>
{!!Form::close()!!}

@stop

@section('javascript')

<script>

$("#botoncito").click(function () {

    var rows = $("#fbody").find("tr").hide();
    var name = document.getElementById("search");
    var data = name.value;
    var search = data.toString().toLowerCase();
    var date1 = document.getElementById("fecha-ini");
    var date2 = document.getElementById("fecha-fin");

    var dateS1 = date1.value.toString();
    var dateS2 = date2.value.toString();
    var d1 = new Date(dateS1);
    var d2 = new Date(dateS2);

    if(search==null || search == ''){
        //alert('23/11/1993'.split("/").reverse().join("-"));
        if(dateS1=='' && dateS2==''){
            rows.show();
            document.getElementById("error-msg1").style.visibility= "hidden";
            //alert('vacio D:');
        }
        if(dateS1!='' && dateS2==''){
            $rows = rows;
            $rows.each(function(){
                var $this = $(this);
                var dateST= $this.find(':nth-child(2)').text();
                var dtabl = new Date(dateST.split("/").reverse().join("-"));
                if(dtabl>=d1){
                    $this.show();
                }
            });
            document.getElementById("error-msg1").style.visibility= "hidden";
        }
        if(dateS1=='' && dateS2!=''){
            $rows = rows;
            $rows.each(function(){
                var $this = $(this);
                var dateST= $this.find(':nth-child(2)').text();
                var dtabl = new Date(dateST.split("/").reverse().join("-"));
                if(dtabl<=d2){
                    $this.show();
                }
            });
           document.getElementById("error-msg1").style.visibility= "hidden";
        }

        if(dateS1!='' && dateS2!=''){
            if(dateS2>=dateS1){
               //rows.show();
                $rows = rows;
                $rows.each(function(){
                    var $this = $(this);
                    var dateST= $this.find(':nth-child(2)').text();
                    var dtabl = new Date(dateST.split("/").reverse().join("-"));
                    if(dtabl>=d1 && dtabl<=d2){
                        $this.show();
                    }
                });
                document.getElementById("error-msg1").style.visibility= "hidden";
            }
            else document.getElementById("error-msg1").style.visibility= "visible";
        }
    }
    else{

        if(dateS1=='' && dateS2==''){
            $rows = rows;
            $rows.each(function(){
                var $this = $(this);
                $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            });
            document.getElementById("error-msg1").style.visibility= "hidden";
        }
        if(dateS1!='' && dateS2==''){
            $rows = rows;
            $rows.each(function(){
                var $this = $(this);
                var dateST= $this.find(':nth-child(2)').text();
                var dtabl = new Date(dateST.split("/").reverse().join("-"));
                if(dtabl>=d1){
                    $this.show();
                }
            });
            document.getElementById("error-msg1").style.visibility= "hidden";
        }

        if(dateS1=='' && dateS2!=''){
            $rows = rows;
            $rows.each(function(){
                var $this = $(this);
                var dateST= $this.find(':nth-child(2)').text();
                var dtabl = new Date(dateST.split("/").reverse().join("-"));
                if(dtabl<=d2){
                    $this.show();
                }
            });
            document.getElementById("error-msg1").style.visibility= "hidden";
        }
        if(dateS1!='' && dateS2!=''){
            if(dateS2>=dateS1){
                //rows.show();
                $rows = rows;
                $rows.each(function(){
                    var $this = $(this);
                    var dateST= $this.find(':nth-child(2)').text();
                    var dtabl = new Date(dateST.split("/").reverse().join("-"));
                    if(dtabl>=d1 && dtabl<=d2){
                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                    }
                });
                document.getElementById("error-msg1").style.visibility= "hidden";
            }
            else document.getElementById("error-msg1").style.visibility= "visible";
        }
    }
});
</script>

<script>
$('document').ready(function () {

  if(navigator.userAgent.indexOf("Firefox")>-1 ) {
    console.log("its firefox");
    document.getElementById('firefox').style.visibility='visible';
    document.getElementById('firefox2').style.visibility='visible';
  }
})
</script>  

@stop