// <!-- dropdown-->
$('.ui.dropdown').dropdown();
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
  var btn = $('.selectColor button[class~="active"]');
  var name = $('input[name="nameMateria"]').val();
  var array = [btn,name];
  $.ajax({
    type: "post",
    url: "/schedule/MateriaStore",
    data: {"array": JSON.stringify(array)},
    success: function (response) {
      console.log(response)
    }
  });
  console.log(name);
});

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
        $('#selectRole').append(rol_select);
      });
    }
  });
}