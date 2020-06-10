require( 'datatables.net' );
require( 'datatables.net-buttons-se' );
require( 'datatables.net-buttons' );
require( 'pdfmake' );
require( 'datatables.net-buttons/js/buttons.html5.js' )();
require( 'datatables.net-buttons/js/buttons.colVis.js' )();
require( 'datatables.net-buttons/js/buttons.flash.js' )();
require( 'datatables.net-buttons/js/buttons.print.js' )();


// TRAYENDO LOS PERMISOS DEL ROL SELCCIONADO EN LA VISTA TABLEPERMISSIONS
$.ajaxSetup({headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
//variables universales
var configLanguageDatatable = {
  "info":"_TOTAL_ Registros",
  "search": "Buscar",
  "paginate":{
    "next": "Siguiente",
    "previous": "Anterior",
  },
  "lengthMenu": 'Mostrar <select class="ui compact selection dropdown">'+
                '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="-1">Todos</option>'+
                '</select> registros',
  "emptyTable": "No se encontraron datos",
  "zeroRecords": "No hay coincidencias",
  "infoEmpty": "",
  "infoFiltered": "",
};
// TABLA USUARIOS
var tableUsers = $('#tableUsers').DataTable({
  "deferRender":    true,
  "serverSide": false,
  "scroller": false,
  "scrollX": false,
  "ajax": {
    "type": "GET",
    "url": "admin/getUsers",
    "complete":function () {
      //IMPRIMIENDO BOTONES
      $('.dataTables_filter').append("<div class='ui form'><div class='two fields'><div class='field'><div class='ui calendar' id='rangestart'><div class='ui input left icon'><i class='calendar icon'></i><input id='min' name='min' type='text' placeholder='Desde'> </div></div></div><div class='field'><div class='ui calendar' id='rangeend'><div class='ui input left icon'><i class='calendar icon'></i><input id='max' name='max' type='text' placeholder='Hasta'></div></div></div></div></div>");
        //   //datapicker RANGOS DE FECHAS DATATABLE
        $('#rangeend').calendar({
          type: 'date',
          startCalendar: $('#rangestart'),
          formatter: {
            date: function (date, settings) {
              if (!date) return '';
              var day = date.getDate();
              var month = date.getMonth() + 1;
              var year = date.getFullYear();
              return year + '-' + month + '-' + day;
            }
          }
        });
        $('#rangestart').calendar({
          type: 'date',
          endCalendar: $('#rangeend'),
          formatter: {
            date: function (date, settings) {
              if (!date) return '';
              var day = date.getDate();
              var month = date.getMonth() + 1;
              var year = date.getFullYear();
              return year + '-' + month + '-' + day;
            }
          }
        });

        // filtrado entre fechas
        $.fn.dataTable.ext.search.push(
          function( settings, data, dataIndex ) {
            var min = new Date($('#min').val()); // funcionan en google
            var max = new Date($('#max').val()); // funcionan en google
            // var min = new Date($('input[name="min"]').val()); 
            // var max = new Date($('input[name="max').val()); 
            var dataFilter = new Date(data[10]) || 0; // use data for the dataFilter column
            // console.log(min);
            
              if ( ( isNaN( min ) && isNaN( max ) ) ||
                   ( isNaN( min ) && dataFilter <= max ) ||
                   ( min <= dataFilter   && isNaN( max ) ) ||
                   ( max <= dataFilter   && isNaN( min ) ) ||
                   ( min <= dataFilter   && dataFilter <= max ) )
                  //  ( min <= dataFilter   && dataFilter >= max) )
              {
                  return true;
              }
              return false;
          }
        );
        
        // Event listener to the two range filtering inputs to redraw on input
        $('#min').focusout( function() {tableUsers.draw();});
        $('#max').focusout( function() {tableUsers.draw();});
        //SCRIPT PARA EL FORMULARIO DE DELETE FINDING
      var btnsDeleteFinding = document.querySelectorAll('#btnDeleteUser')
      $(btnsDeleteFinding).click(function () {
        valor = $(this).attr('ident');
        name = $(this).attr('nam');
        $.confirm({
          //aqui va el alerta personalizado
          animation: 'scale',
          closeAnimation: 'scale',
          theme: 'modern',
          icon: 'lh exclamation triangle icon',
          backgroundDismissAnimation: 'glow',
          title: 'Espera ahí!',
          content: 'Esta seguro que desea <strong>ELIMINAR</strong> ? <strong>'+name+'</strong> Una vez eliminado no podras buscarlo por este medio',
          type: 'orange',
          buttons: {
            aceptar: function aceptar() {
              $.ajax({
                type: "delete",
                url: "/admin/"+valor+"/delete",
                success: function (response) {
                  console.log(response);
                  $('#tableUsers').DataTable().ajax.reload();
                },
                complete: function () { 
                  swal({ 
                    title:"Usuario eliminado", 
                    text: "No veraz más este Usuario en la lista", 
                    type: "success", 
                    buttonsStyling: true, 
                    confirmButtonClass: "btn btn-success"})

                },
                error: function error() {
                }
              });            
            },
            cancel: function cancel() {}
          }
        });
        });
    },
    beforeSend: function () {
      $('#rangestart').remove();
      $('#rangeend').remove();
    }
  }, //traigo los usuarios para mirar sus permisos
  "columns": [
      {data: 'name'},
      {data: 'email'},
      {data: 'rol'},
      {data: 'created_at'},
      {data: 'actions', className:"td-actions text-center"},
  ],
  "language": configLanguageDatatable,
});
$('#tableUsers tfoot th').each( function () { //BUSCADOR POR CAMPOS
  $('.ttt th').html('<div class="ui input"><input type="text" placeholder="Buscar por..."></div>');
});
// Apply the search
tableUsers.columns().every( function () {
  var that = this;
  $( 'input', this.footer() ).on( 'keyup change clear', function () {
      if ( that.search() !== this.value ) {
          that
              .search( this.value )
              .draw();
      }
  } );
});
// Display the buttons tabla filtrado general
if (window.location.pathname == '/user') {
  new $.fn.dataTable.Buttons( tableUsers, [
  { extend: 'excelHtml5',className: 'btn btn-info', exportOptions: {columns: ':visible'}},
  // { extend: 'pdfHtml5',exportOptions: {columns:  ':visible'},orientation: 'landscape', pageSize: 'LEGAL'},
  { extend: 'print',text: 'Imprimir', className: 'btn btn-info' ,messageBottom: null,exportOptions: {columns:  ':visible'}},
  // { extend: "colvis",text: 'Mostrar columnas'}
  ]);
  tableUsers.buttons().container().appendTo( $('.col-sm-12.col-md-6:eq(0)', tableUsers.table().container()) );
}
//  FIN TABLA USUARIOS

// <!-- """"""""""""""""""""""""""""""""""""""""""""" TABLAS DE MATERIAS """""""""""""""""""""""""""""""""""""""""""""""""" -->
var tableMateria = $('#tableMaterias').DataTable({
  "deferRender":    true,
  "serverSide": false,
  "scroller": false,
  "scrollX": false,
  "ajax": {
    "type": "GET",
    "url": "/schedule/getMateria",
    "complete":function () {
      //IMPRIMIENDO BOTONES

        // Event listener to the two range filtering inputs to redraw on input
        $('#min').focusout( function() {tableMateria.draw();});
        $('#max').focusout( function() {tableMateria.draw();});
        //SCRIPT PARA EL FORMULARIO DE DELETE FINDING
      var btnsDeleteMateria = document.querySelectorAll('#btnDeleteMateria')
      $(btnsDeleteMateria).click(function () {
        valor = $(this).attr('ident');
        name = $(this).attr('nam');
        $.confirm({
          //aqui va el alerta personalizado
          animation: 'scale',
          closeAnimation: 'scale',
          theme: 'modern',
          icon: 'lh exclamation triangle icon',
          backgroundDismissAnimation: 'glow',
          title: 'Espera ahí!',
          content: 'Esta seguro que desea <strong>ELIMINAR</strong> ? <strong>'+name+'</strong> Una vez eliminado no podras buscarlo por este medio',
          type: 'orange',
          buttons: {
            aceptar: function aceptar() {
              $.ajax({
                type: "delete",
                url: "/schedule/materia/"+valor+"/delete",
                success: function (response) {
                  $('#tableMaterias').DataTable().ajax.reload();
                },
                complete: function () { 
                  swal({ 
                    title:"Materia eliminada", 
                    text: "No veraz más esta materia en la lista", 
                    type: "success", 
                    buttonsStyling: true, 
                    confirmButtonClass: "btn btn-success"})

                },
                error: function error() {
                }
              });            
            },
            cancel: function cancel() {}
          }
        });
        });
    },
    beforeSend: function () {
      $('#rangestart').remove();
      $('#rangeend').remove();
    }
  }, //traigo los usuarios para mirar sus permisos
  "columns": [
      {data: 'name', className:"text-capitalize h4"},
      {data: 'color'},
      {data: 'actions', className:"td-actions text-center"},
  ],
  "language": configLanguageDatatable,
});


// <!-- """"""""""""""""""""""""""""""""""""""""""""" TABLAS DE HORARIOS """""""""""""""""""""""""""""""""""""""""""""""""" -->
var tableSchedule = $('#tableSchedule').DataTable({
  "deferRender":    true,
  "serverSide": false,
  "scroller": false,
  "scrollX": false,
  "ajax": {
    "type": "GET",
    "url": "/schedule/getSchedule",
    "complete":function () {
      //IMPRIMIENDO BOTONES
        // Event listener to the two range filtering inputs to redraw on input
        $('#min').focusout( function() {tableSchedule.draw();});
        $('#max').focusout( function() {tableSchedule.draw();});
        //SCRIPT PARA EL FORMULARIO DE DELETE FINDING
      var btnsDeleteMateria = document.querySelectorAll('#btnDeleteMateria')
      $(btnsDeleteMateria).click(function () {
        valor = $(this).attr('ident');
        name = $(this).attr('nam');
        $.confirm({
          //aqui va el alerta personalizado
          animation: 'scale',
          closeAnimation: 'scale',
          theme: 'modern',
          icon: 'lh exclamation triangle icon',
          backgroundDismissAnimation: 'glow',
          title: 'Espera ahí!',
          content: 'Esta seguro que desea <strong>ELIMINAR</strong> ? <strong>'+name+'</strong> Una vez eliminado no podras buscarlo por este medio',
          type: 'orange',
          buttons: {
            aceptar: function aceptar() {
              $.ajax({
                type: "delete",
                url: "/schedule/materia/"+valor+"/delete",
                success: function (response) {
                  $('#tableMaterias').DataTable().ajax.reload();
                },
                complete: function () { 
                  swal({ 
                    title:"Materia eliminada", 
                    text: "No veraz más esta materia en la lista", 
                    type: "success", 
                    buttonsStyling: true, 
                    confirmButtonClass: "btn btn-success"})

                },
                error: function error() {
                }
              });            
            },
            cancel: function cancel() {}
          }
        });
        });
    },
    beforeSend: function () {
      $('#rangestart').remove();
      $('#rangeend').remove();
    }
  }, //traigo los usuarios para mirar sus permisos
  "columns": [
      {data: 'name', className:"text-capitalize h4"},
      {data: 'nameSchedule', className:"text-capitalize h4"},
      {data: 'actions', className:"td-actions text-center"},
  ],
  "language": configLanguageDatatable,
});