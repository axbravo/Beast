@extends('layout.promoter')

@section('style')
  <!--{!!Html::style('css/modern-business.css')!!} -->
  <!-- {!!Html::style('css/estilos.css')!!} -->
  {!!Html::style('css/jquery.seat-charts.css')!!}
@stop

@section('title')
    Nuevo Evento
@stop

@section('content')
<script type="text/javascript">

  window.onload = function(){
    var today = new Date();
    var month = today.getMonth() +1;
    var dia = today.getDate();
      var string_dia = ''+ dia;
      if(dia < 10) 
        string_dia = '0' + dia;
    var todayDate = ''+today.getFullYear()+'-'+month+'-'+string_dia;
    document.getElementsByName('selling_date')[0].min = todayDate;
    document.getElementById('input-function-date').min = todayDate;
    var e = document.getElementsByName('local_id')[0];
    var index= e.options[e.selectedIndex].value;
    document.getElementById('capacity-display').value = document.getElementsByName('capacity_'+index)[0].value;
  }

  function changeCapacity(){
    var e = document.getElementsByName('local_id')[0];
    var index= e.options[e.selectedIndex].value;
    document.getElementById('capacity-display').value = document.getElementsByName('capacity_'+index)[0].value;
    document.getElementById("input-capacity").max=document.getElementById("capacity-display").value;
  }

  function incrementSellingDate(){
    var publication_date = document.getElementsByName('publication_date')[0].value;
    document.getElementsByName('publication_date')[0].stepUp();
    var publication_date_1 = document.getElementsByName('publication_date')[0].value;
    document.getElementsByName('publication_date')[0].stepDown();
    var today = new Date();
    var publicDate = new Date(document.getElementsByName('publication_date')[0].value);
    var timeToday = today.getTime();
    var timePublic = publicDate.getTime();
    var month = today.getMonth() +1;
    if(timeToday > timePublic){
      var dia = today.getDate();
      var string_dia = ''+ dia;
      if(dia < 10) 
        string_dia = '0' + dia;
      console.log(string_dia);
      document.getElementsByName('selling_date')[0].min = ''+today.getFullYear()+'-'+month+'-'+string_dia;
    }
    else
      document.getElementsByName('selling_date')[0].min = publication_date_1;
  }

  function incrementPresentationDate(){
    document.getElementById('input-function-date').min = document.getElementsByName('selling_date')[0].value;
  }
</script>

        <!-- Contenido-->
        @foreach ($capacity_list as $capacity)
          {!! Form::hidden ('capacity_'.$capacity->id, $capacity->capacity) !!}
          {!! Form::hidden ('row_'.$capacity->id, $capacity->rows,  array('id' =>'row_'.$capacity->id)) !!}
          {!! Form::hidden ('column_'.$capacity->id, $capacity->columns, array('id' =>'column_'.$capacity->id)) !!}
          {!! Form::hidden('invisible', 'secret', array('id' => 'invisible_id')) !!}
        @endforeach



        <div class="row">
          <div class="col-sm-8">
            {!!Form::open(array('route' => 'events.store','files'=>true,'id'=>'form','class'=>'form-horizontal'))!!}
              <div class="form-group">
                <label  class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  {!! Form::text('name','', array('class' => 'form-control','required','maxlength' => 50)) !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Lugar</label>
                <div class="col-sm-10">
                  {!! Form::select('local_id', $locals_list->toArray(), null, ['class' => 'form-control','required', 'onclick' => 'changeCapacity()','maxlength' => 50]) !!}
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  {!! Form::textarea('description', null, ['class' => 'form-control','style' => 'resize:none','rows' => '3','maxlength' => 100]) !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoría</label>
                <div class="col-sm-10">

                    {!! Form::select('parent_category_id', $categories_list->toArray(),null,['class' => 'form-control','required','id'=>'category_id']) !!}
                </div>

              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sub categoría</label>
                <div class="col-sm-10">
                    {!! Form::select('category_id',$categories_list->toArray(),null,['class' => 'form-control','required','id'=>'subcategory_id','onLoad'=>'getSubs()']) !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Organizador</label>
                <div class="col-sm-10">

                    {!! Form::select('organizer_id', $organizers_list->toArray(),null,['class' => 'form-control','required','maxlength' => 50]) !!}
                </div>
              </div>

              <div class="form-group">
                <label  class="col-sm-2 control-label">Duración Aproximada</label>
                <div class="col-sm-10">
                  {!! Form::number('time_length',1, array('class' => 'form-control','min' => '1','required')) !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha de publicación del evento</label>
                <div class="col-sm-10">
                    {!! Form::date('publication_date',\Carbon\Carbon::now(), array('class' => 'form-control','required', 'oninput' => 'incrementSellingDate()', 'min'=>\Carbon\Carbon::now()->toDateString())) !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha de inicio de ventas</label>
                <div class="col-sm-10">
                    {!! Form::date('selling_date',\Carbon\Carbon::now()->addDay(), array('class' => 'form-control','required', 'oninput' => 'incrementPresentationDate()')) !!}
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-2 control-label">Imagen evento</label>
                <div class="col-sm-10">
                  {!! Form::file('image', array('class' => 'form-control')) !!}
                </div>
              </div>
              <br>

              <!-- ZONA -->
              <legend>Agregar zona:</legend>
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                      {!! Form::text('zoneName','', array('class' => 'form-control','id' => 'input-zone','maxlength' => 50)) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label  class="col-sm-2 control-label" id="label_capacity">Capacidad</label>
                  <div class="col-sm-10">
                      {!! Form::number('zoneCapacity','', array('class' => 'form-control','id' => 'input-capacity','min' => '1')) !!}
                  </div>
              </div>
              <div class="form-group" id="label_col">
                  <label  class="col-sm-2 control-label" >Columnas</label>
                  <div class="col-sm-10">
                      {!! Form::number('zone_columns1','', array('class' => 'form-control','id' => 'input-column','min' => '1')) !!}
                  </div>
              </div>
              <div class="form-group" id="label_fil">
                  <label  class="col-sm-2 control-label" >Filas</label>
                  <div class="col-sm-10">
                      {!! Form::number('zone_rows1','', array('class' => 'form-control','id' => 'input-row','min' => '1')) !!}
                  </div>
              </div>
              <div class="form-group" id="label_fini">
                  <label  class="col-sm-2 control-label" >Columna inicial</label>
                  <div class="col-sm-10">
                      {!! Form::number('start_column1',1, array('class' => 'form-control','id' => 'input-colIni','min' => '1')) !!}
                  </div>
              </div>     
              <div class="form-group" id="label_cini">
                  <label  class="col-sm-2 control-label" >Fila inicial</label>
                  <div class="col-sm-10">
                      {!! Form::number('start_row1',1, array('class' => 'form-control','id' => 'input-rowIni','min' => '1')) !!}
                  </div>
              </div>                                                     
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Precio</label>
                  <div class="col-sm-10">
                      {!! Form::number('zonePrice','', array('class' => 'form-control','id' => 'input-price','maxlength' => 50,'min' => '0')) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Capacidad disponible</label>
                  <div class="col-sm-10">
                      <input type="text" id="capacity-display" class="form-control" disabled>
                  </div>
              </div>
              <div  id="dist">
                <label  class="col-sm-2 control-label" id="labelDist">Distribución evento</label>
                <br><br><br>
              </div>              
              <div class="form-group">
                    <div class="col-sm-offset-10 col-sm-6">
                        <a class="btn btn-info" onclick="addZone()">Agregar</a>
                    </div>
              </div>              
                <script>

                    function addZone(){

                        var zone = document.getElementById('input-zone').value;
                        
                        var price = document.getElementById('input-price').value;

                        var capacity = document.getElementById('input-capacity').value;




                        var tableRef = document.getElementById('table-zone').getElementsByTagName('tbody')[0];

                        // Insert a row in the table at the last row
                        var newRow   = tableRef.insertRow(tableRef.rows.length);

                        // Insert a cell in the row at index 0
                        var newCell  = newRow.insertCell(0);
                        var newCell2 = newRow.insertCell(1);
                        var newCell3 = newRow.insertCell(2);
                        var newCell5 = newRow.insertCell(3);
                        

                        if( document.getElementById('input-capacity').disabled==true){ 
                            var newCell6 = newRow.insertCell(4);
                            var newCell7 = newRow.insertCell(5);
                            var newCell8 = newRow.insertCell(6);
                            var newCell9 = newRow.insertCell(7);
                        }


                        var column= document.getElementById('input-column').value;
                        var row= document.getElementById('input-row').value ;
                        var rowini= document.getElementById('input-rowIni').value;
                        var colini= document.getElementById('input-colIni').value;

                        var y1 = document.createElement("INPUT");
                        y1.setAttribute("type", "hidden");
                        y1.setAttribute("value", column);
                        y1.setAttribute("name", "zone_columns[]");
                        y1.style.border = 'none';
                        y1.style.background = 'transparent';
                        y1.required = false;

                        var y2 = document.createElement("INPUT");
                        y2.setAttribute("type", "hidden");
                        y2.setAttribute("value", row);
                        y2.setAttribute("name", "zone_rows[]");
                        y2.style.border = 'none';
                        y2.style.background = 'transparent';
                        y2.required = false;

                        var y3 = document.createElement("INPUT");
                        y3.setAttribute("type", "hidden");
                        y3.setAttribute("value", colini);
                        y3.setAttribute("name", "start_column[]");
                        y3.style.border = 'none';
                        y3.style.background = 'transparent';
                        y3.required = false;

                        var y4 = document.createElement("INPUT");
                        y4.setAttribute("type", "hidden");
                        y4.setAttribute("value", rowini);
                        y4.setAttribute("name", "start_row[]");
                        y4.style.border = 'none';
                        y4.style.background = 'transparent';
                        y4.required = false;   


                        if( document.getElementById('input-capacity').disabled==true){ 
                        //  Add values when is a numerated local but dont show it
                            y1.required=true;
                            y2.required=true;
                            y3.required=true;
                            y4.required=true;
                            capacity=row*column;               
                        }




                        // Append values to cells
                        var newText  = document.createTextNode(zone);
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "text");
                        x.setAttribute("value", zone);
                        x.setAttribute("name", "zone_names[]");
                        x.style.border = 'none';
                        x.style.background = 'transparent';
                        x.required = true;
                        var newText2 = document.createElement("INPUT");
                        newText2.setAttribute("type", "text");
                        newText2.setAttribute("value", capacity);
                        newText2.setAttribute("name", "zone_capacity[]");
                        newText2.style.border = 'none';
                        newText2.style.background = 'transparent';
                        newText2.required = true;
                        var textPrice = document.createElement("INPUT");
                        textPrice.setAttribute("type", "text");
                        textPrice.setAttribute("value", price);
                        textPrice.setAttribute("name", "price[]");
                        textPrice.style.border = 'none';
                        textPrice.style.background = 'transparent';
                        textPrice.required = true;
                        // buttons

                        var newDelete = document.createElement('button');
                        newDelete.className = "btn";
                        newDelete.className += " btn-info glyphicon glyphicon-remove";
                        if (newDelete.addEventListener) {  // all browsers except IE before version 9
                          newDelete.addEventListener("click", function(){deleteZone(newDelete);}, false);
                        } else {
                          if (newDelete.attachEvent) {   // IE before version 9
                            newDelete.attachEvent("click", function(){deleteZone(newDelete);});
                          }
                        }

                        newCell.appendChild(x);
                        newCell2.appendChild(newText2);
                        newCell3.appendChild(textPrice);
                        newCell5.appendChild(newDelete);
                        

                        if( document.getElementById('input-capacity').disabled==true){ 
                            newCell6.appendChild(y1);
                            newCell7.appendChild(y2);
                            newCell8.appendChild(y3);
                            newCell9.appendChild(y4);
                        }

                        document.getElementById('input-zone').value = '';
                        document.getElementById('input-capacity').value = '';
                        document.getElementById('input-price').value = '';
                        // document.getElementById('input-column').value = '';
                        // document.getElementById('input-row').value = '';
                        // document.getElementById('input-colIni').value = '';
                        // document.getElementById('input-rowIni').value = '';

                        var new_capacity = document.getElementById('capacity-display').value;
                        new_capacity = new_capacity - capacity;
                        document.getElementById('capacity-display').value = new_capacity;
                        document.getElementById("input-capacity").max=new_capacity;
                    }

                    function deleteZone(btn){
                        var row=btn.parentNode.parentNode.rowIndex;
                        var row2 = row-1;
                        var act_val = parseInt(document.getElementById('capacity-display').value);
                        act_val += parseInt(document.getElementsByName('zone_capacity[]')[row2].value);
                        document.getElementById('capacity-display').value = act_val;
                        document.getElementById('table-zone') .deleteRow(row);
                
                    }    
                </script>

                <table id="table-zone" class="table table-bordered table-striped ">
                    <tr>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Precio</th>
                        <th>Eliminar</th>
                    </tr>
                </table>
                <br>

                              <!-- agregar funciones -->
              <legend>Agregar función:</legend>
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Fecha</label>
                  <div class="col-sm-10">
                      {!! Form::date('input_start_date',\Carbon\Carbon::now()->addDay(2), array('class' => 'form-control', 'id' =>'input-function-date')) !!}
                  </div>
              </div>
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Hora de inicio</label>
                  <div class="col-sm-10">
                      {!! Form::time('input_start_time',null, array('class' => 'form-control', 'id' => 'input-function-time')) !!}
                  </div>
              </div>

              <div class="form-group">
                    <div class="col-sm-offset-10 col-sm-10">
                        <a class="btn btn-info" onclick="addFunction()">Agregar</a>
                        <!--
                        <button  type="reset" class="btn btn-info">Cancelar</button>
                        -->
                    </div>
              </div>

                <script>



                    function addFunction(){

                        var start_date = document.getElementById('input-function-date').value;
                        var start_time = document.getElementById('input-function-time').value;

                        var tableRef = document.getElementById('functions-table').getElementsByTagName('tbody')[0];

                        // Insert a row in the table at the last row
                        var newRow   = tableRef.insertRow(tableRef.rows.length);

                        // Insert a cell in the row at index 0
                        var newCell  = newRow.insertCell(0);
                        var newCell2 = newRow.insertCell(1);
                        var newCell4 = newRow.insertCell(2);

                        // Append values to cells
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "date");
                        x.setAttribute("value", start_date);
                        x.setAttribute("name", "start_date[]");
                        x.style.border = 'none';
                        x.style.background = 'transparent';
                        x.required = true;
                        var newText2 = document.createElement("INPUT");
                        newText2.setAttribute("type", "time");
                        newText2.setAttribute("value", start_time);
                        newText2.setAttribute("name", "start_time[]");
                        newText2.style.border = 'none';
                        newText2.style.background = 'transparent';
                        newText2.required = true;
                        // buttons
                        var newDelete = document.createElement('button');
                        newDelete.className = "btn";
                        newDelete.className += " btn-info glyphicon glyphicon-remove";
                        if (newDelete.addEventListener) {  // all browsers except IE before version 9
                          newDelete.addEventListener("click", function(){deleteFunction(newDelete);}, false);
                        } else {
                          if (newDelete.attachEvent) {   // IE before version 9
                            newDelete.attachEvent("click", function(){deleteFunction(newDelete);});
                          }
                        }
                        newCell.appendChild(x);
                        newCell2.appendChild(newText2);
                        newCell4.appendChild(newDelete);


                        //document.getElementById('input-function-date')[0].value = '';

                    }
                    function deleteFunction(btn){
                        var row=btn.parentNode.parentNode.rowIndex;
                        document.getElementById('functions-table') .deleteRow(row);
                
                    }  
                </script>

                <table id="functions-table" class="table table-bordered table-striped " disabled>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Eliminar</th>
                    </tr>
                </table>
                <br>
                {!! Form::hidden ('yesterday', ''.\Carbon\Carbon::now()->subDay()) !!}
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <a class="btn btn-info" href="" title="submit" data-toggle="modal" data-target="#submitModal" >Guardar Evento</a>
                  <a href="{{action('EventController@create')}}"><button type="button" class="btn btn-info">Cancelar</button></a>
                </div>
              </div>

              <!-- MODAL -->
              <div class="modal fade"  id="submitModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">¿Estas seguro que desea crear el evento?</h4>
                    </div>
                    <div class="modal-footer">
                        <button id="yes" type="submit" class="btn btn-info">Si</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </form>
          </div>

        </div>



@stop

@section('javascript')
  {!!Html::script('js/jquery.seat-charts.js')!!}
  <script>
    $(document).ready(function() {

       holi();

       function holi(){
                var e = $('[name=local_id]')[0];

        var index= e.options[e.selectedIndex].value;
        console.log(index);
        var algo = $('#row_' + index).val();
        //console.log("algo "+algo);
        var table = document.getElementById("table-zone");

        for(var i = table.rows.length - 1; i > 0; i--)
        {
            table.deleteRow(i);
        }

        if(algo !== undefined && algo >=1){
          //si el local tiene asientos y filas numeradas Do this 
          //console.log("index "+index);
          var rows = $('#row_'+index).val();
          var columns = $('#column_'+index).val();

          // setear maximo filas maxima col
          document.getElementById("input-column").max=columns;
          document.getElementById("input-row").max=rows;
          document.getElementById("input-colIni").max=columns;
          document.getElementById("input-rowIni").max=rows;

          console.log("columnas "+columns);

          console.log("filas "+rows);

          var arreglo = new Array();

          for(i=0; i<rows;i++){
            var texto = 'a';
            for(j=1; j<columns; j++){
              texto += 'a';
            }
            //console.log(texto);
            arreglo.push(texto);
          }
          console.log(arreglo);
          //console.log(arreglo);
          var seatid="seat-map-"+index;
          console.log(seatid);

          var tam= $('[id=invisible_id]').size();
          for(i=1;i<=tam;i++){
            $('#seat-map-'+i).hide();
          }          
          
          var sc = $('#seat-map-'+index).seatCharts({
            map: arreglo,
          naming : {
            top : false,
            getLabel : function (character, row, column) {
              return column;
            }
          },
          legend : { //Definition legend
            node : $('#legend'),
            items : [
              [ 'a', 'available',   'Libre' ],
              [ 'a', 'unavailable', 'Ocupado'],
              [ 'a', 'reserved', 'Reservado']
            ]
          } });
          $('#seat-map-'+index).show();

          
          $('#input-column').show();
          $('#input-row').show();
          $('#input-colIni').show();
          $('#input-rowIni').show();
          $('#label_col').show();
          $('#label_fil').show();
          $('#label_fini').show();
          $('#label_cini').show();
          $('#dist').show();
          $('#label_capacity').hide();
          $('#input-capacity').hide();

          document.getElementById('input-capacity').disabled=true;
        }else{
          //si el local no tiene asientos numerados Do this 
          //$('#seat-map').empty();

          document.getElementById('input-capacity').disabled=false;
          var tam= $('[id=invisible_id]').size();
          for(i=1;i<=tam;i++){
            $('#seat-map-'+i).hide();
          }
          //$('#seat-map').hide();
          
          $('#input-column').hide();
          $('#input-row').hide();
          $('#input-colIni').hide();
          $('#input-rowIni').hide();
          $('#label_col').hide();
          $('#label_fil').hide();
          $('#label_fini').hide();
          $('#label_cini').hide();
          $('#dist').hide();
          $('#label_capacity').show();
          $('#input-capacity').show();
        }
       }

      $('[name=local_id]').click(function(){
        var e = $('[name=local_id]')[0];

        var index= e.options[e.selectedIndex].value;
        console.log(index);
        var algo = $('#row_' + index).val();
        //console.log("algo "+algo);
        var table = document.getElementById("table-zone");

        for(var i = table.rows.length - 1; i > 0; i--)
        {
            table.deleteRow(i);
        }

        if(algo !== undefined && algo >=1){
          //si el local tiene asientos y filas numeradas Do this 
          //console.log("index "+index);
          var rows = $('#row_'+index).val();
          var columns = $('#column_'+index).val();

          // setear maximo filas maxima col
          document.getElementById("input-column").max=columns;
          document.getElementById("input-row").max=rows;
          document.getElementById("input-colIni").max=columns;
          document.getElementById("input-rowIni").max=rows;

          console.log("columnas "+columns);

          console.log("filas "+rows);

          var arreglo = new Array();

          for(i=0; i<rows;i++){
            var texto = 'a';
            for(j=1; j<columns; j++){
              texto += 'a';
            }
            //console.log(texto);
            arreglo.push(texto);
          }
          console.log(arreglo);
          //console.log(arreglo);
          var seatid="seat-map-"+index;
          console.log(seatid);

          var tam= $('[id=invisible_id]').size();
          for(i=1;i<=tam;i++){
            $('#seat-map-'+i).hide();
          }          
          
          var sc = $('#seat-map-'+index).seatCharts({
            map: arreglo,
          naming : {
            top : false,
            getLabel : function (character, row, column) {
              return column;
            }
          },
          legend : { //Definition legend
            node : $('#legend'),
            items : [
              [ 'a', 'available',   'Libre' ],
              [ 'a', 'unavailable', 'Ocupado'],
              [ 'a', 'reserved', 'Reservado']
            ]
          } });
          $('#seat-map-'+index).show();

          
          $('#input-column').show();
          $('#input-row').show();
          $('#input-colIni').show();
          $('#input-rowIni').show();
          $('#label_col').show();
          $('#label_fil').show();
          $('#label_fini').show();
          $('#label_cini').show();
          $('#dist').show();
          $('#label_capacity').hide();
          $('#input-capacity').hide();

          document.getElementById('input-capacity').disabled=true;
        }else{
          //si el local no tiene asientos numerados Do this 
          //$('#seat-map').empty();

          document.getElementById('input-capacity').disabled=false;
          var tam= $('[id=invisible_id]').size();
          for(i=1;i<=tam;i++){
            $('#seat-map-'+i).hide();
          }
          //$('#seat-map').hide();
          
          $('#input-column').hide();
          $('#input-row').hide();
          $('#input-colIni').hide();
          $('#input-rowIni').hide();
          $('#label_col').hide();
          $('#label_fil').hide();
          $('#label_fini').hide();
          $('#label_cini').hide();
          $('#dist').hide();
          $('#label_capacity').show();
          $('#input-capacity').show();
        }
      });
    });
  </script>
  <script>


$('document').ready(function () {
  getSubs();
})

  function getSubs(){
      category_id = $("#category_id").val();
      url_base = "{{ url('/') }}";
      // Peticion ajax
      $.getJSON(url_base+"/promoter/"+category_id+"/subcategories", function(data)
      {
        $("#subcategory_id").empty();
        $.each( data, function( id, name ) {
            $('#subcategory_id').append("<option value=\""+id+"\">"+name+"</option>");
      });

    });
  }

  $(document).ready(function(){
    // Poblar sub category
    $("#category_id").change(function(){

      category_id = $("#category_id").val();
      url_base = "{{ url('/') }}";
      // Peticion ajax
      $.getJSON(url_base+"/promoter/"+category_id+"/subcategories", function(data)
      {
        $("#subcategory_id").empty();
        $.each( data, function( id, name ) {
            $('#subcategory_id').append("<option value=\""+id+"\">"+name+"</option>");
      });

      })
    });
  });
  </script>


  <script>
  $(document).ready(function(){
    //var locals=$locals_list.size();
    var tam= $('[id=invisible_id]').size();
    console.log("tamano "+tam);
    for(var i=1;i<=tam;i++)
      $('#dist').append("<div id=seat-map-"+i+" class=seatCharts-container  tabindex =0> </div>")
  });
  </script>  
  {!!Html::script('js/moment.js')!!}
  {!!Html::script('js/rangepicker.js')!!}



  <script type="text/javascript">
    $('#yes').click(function(){
      $('#submitModal').modal('hide');  
    });
    
  </script>

@stop