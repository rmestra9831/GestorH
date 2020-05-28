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