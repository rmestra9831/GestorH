  // <!-- dropdown-->
  $('.ui.dropdown').dropdown();
  // <!-- MODALS-->
  $('.test.modal').modal({inverted: true}).modal('attach events', '.test.button', 'show');
//  <!-- REGISTRO DE USUARIOS  -->
if (window.location.pathname == '/register') {

  $.ajax({
    type: "GET",
    url: "admin/getRole",
    success: function success(response) {
      console.log(response);
      var rol_select = '<div class="item" data-value="0">Seleccionar</div>';
      $.each(response, function (r) {
        rol_select = '<div class="item" data-value="'+response[r].id+'">'+response[r].name+'</div>';
        // console.log
        $('#selectRole').append(rol_select);
      });
    }
  });
}

$(document).ready(function () {
  $.ajaxSetup({headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
// <!-- CALENDARIOS  -->
$('.ui.calendar').calendar({
  monthFirst: false,
  type: 'date',
  dateHandling: 'formatter',  
  formatter: {
    date: function (date, settings) {
      if (!date) return '';
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      return day + '/' + month + '/' + year;
    }
  },
  text: {
    days: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'Mayo', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec'],
    today: 'Aujourd\'hui',
    now: 'Hoy',
    am: 'AM',
    pm: 'PM'
  },
});
// <!-- CAMBIAR ROLES  -->
// Guardado de la materia
// obteniendo color
var btnsColor = $('.selectColor button');
$(btnsColor).click(function(e){
  var c = $(this).attr('color');
  $(btnsColor).removeClass('active');
  $(this).addClass('active');
});
//  <!-- GUARDANDO DATOS DE LA MATERIA  -->
$('.saveMateria').click(function (e) {
  e.preventDefault();
  var btn = $('.selectColor button[class~="active"]').attr('color');
  var name = $('input[name="nameMateria"]').val();
  if (name == "" || btn == "") {
    $.alert({
      theme: 'Modern',
      icon: 'lh exclamation triangle icon',
      title: 'Cuidado, No estan completos los datos',
      type: 'orange',
      content: 'Revisa los datos antes de continuar',
      typeAnimated: true
    });
  }else{
    var array = [name,btn];
    $.ajax({
      type: "POST",
      url: "/schedule/MateriaStore",
      data: {'array': JSON.stringify(array)},
      success: function (response) {
        if (response == 'error') {
          $.alert({
            theme: 'Modern',
            icon: 'lh exclamation triangle icon',
            title: 'Ups',
            type: 'red',
            content: 'Actualmente hay un mismo registro con el nombre <strong>" '+name+' "</strong>',
            typeAnimated: true
          });
        }else{
          swal({ 
            title:"Materia Creada", 
            text: "Se ha creado de manera existosa", 
            type: "success", 
            buttonsStyling: true, 
            confirmButtonClass: "btn btn-success"})
          $('#tableMaterias').DataTable().ajax.reload();
          $(btnsColor).removeClass('active');
          $('input[name="nameMateria"]').val('');
        };
      }
    });
  }
});


});