if (window.location.pathname == '/schedule/new') {
const lista = document.getElementById('lista');
const dia1 = document.getElementById('day1');
const dia2 = document.getElementById('day2');
const dia3 = document.getElementById('day3');
const dia4 = document.getElementById('day4');
const dia5 = document.getElementById('day5');
// console.log(lista);
var x1;
Sortable.create(lista, {
  group:{
    name:'lista',
    pull:'clone',
    put: false,
  },
  dragClass: 'drag',
  animation: 150
});

Sortable.create(dia1,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150,
  store:{
    set: function(sortable){
      const lu = sortable.toArray();
      localStorage.setItem('lu',lu.join(','));
    },
  },
  onAdd: function (evt) {
    var day1 = document.querySelectorAll('#day1 .list-item');
    if (day1.length > 6) {
      var $item = $(evt.item);
      $.alert({
        theme: 'Modern',
        icon: 'lh exclamation triangle icon',
        title: 'Lo sentimos',
        type: 'orange',
        content: 'No puedes agregar mas materias, elimina para poder colocarla',
        typeAnimated: true
      });
      $item.remove();
    }
	},
})

Sortable.create(dia2,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150,
  store:{
    set: function(sortable){
      const ma = sortable.toArray();
      localStorage.setItem('ma',ma.join(','));
    },
  },
  onAdd: function (evt) {
    var day2 = document.querySelectorAll('#day2 .list-item');
    if (day2.length > 6) {
      var $item = $(evt.item);
      $.alert({
        theme: 'Modern',
        icon: 'lh exclamation triangle icon',
        title: 'Lo sentimos',
        type: 'orange',
        content: 'No puedes agregar mas materias, elimina para poder colocarla',
        typeAnimated: true
      });
      $item.remove();
    }
	},
})
Sortable.create(dia3,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150,
  store:{
    set: function(sortable){
      const mi = sortable.toArray();
      localStorage.setItem('mi',mi.join(','));
    },
  },
  onAdd: function (evt) {
    var day3 = document.querySelectorAll('#day3 .list-item');
    if (day3.length > 6) {
      var $item = $(evt.item);
      $.alert({
        theme: 'Modern',
        icon: 'lh exclamation triangle icon',
        title: 'Lo sentimos',
        type: 'orange',
        content: 'No puedes agregar mas materias, elimina para poder colocarla',
        typeAnimated: true
      });
      $item.remove();
    }
	},
})
Sortable.create(dia4,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150,
  store:{
    set: function(sortable){
      const ju = sortable.toArray();
      localStorage.setItem('ju',ju.join(','));
    },
  },
  onAdd: function (evt) {
    var day4 = document.querySelectorAll('#day4 .list-item');
    if (day4.length > 6) {
      var $item = $(evt.item);
      $.alert({
        theme: 'Modern',
        icon: 'lh exclamation triangle icon',
        title: 'Lo sentimos',
        type: 'orange',
        content: 'No puedes agregar mas materias, elimina para poder colocarla',
        typeAnimated: true
      });
      $item.remove();
    }
	},
})
Sortable.create(dia5,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150,
  store:{
    set: function(sortable){
      const vi = sortable.toArray();
      localStorage.setItem('vi',vi.join(','));
    },
  },
  onAdd: function (evt) {
    var day5 = document.querySelectorAll('#day5 .list-item');
    if (day5.length > 6) {
      var $item = $(evt.item);
      $.alert({
        theme: 'Modern',
        icon: 'lh exclamation triangle icon',
        title: 'Lo sentimos',
        type: 'orange',
        content: 'No puedes agregar mas materias, elimina para poder colocarla',
        typeAnimated: true
      });
      $item.remove();
    }
	},
})

//Remover items de las listas
$(".removeItemList").on('click',function() {   
  $(this).parent().fadeOut('medium').remove();
  // $(this).parent().remove();
});

// <!-- BOTON GUARDAR HORARIO -->
$('#saveSchedule').click(function (e) { 
    const lu = localStorage.getItem('lu') ? localStorage.getItem('lu').split(",") : [] ;
    const ma = localStorage.getItem('ma') ? localStorage.getItem('ma').split(",") : [] ;
    const mi = localStorage.getItem('mi') ? localStorage.getItem('mi').split(",") : [] ;
    const ju = localStorage.getItem('ju') ? localStorage.getItem('ju').split(",") : [] ;
    const vi = localStorage.getItem('vi') ? localStorage.getItem('vi').split(",") : [] ;
    var createBy = $('input[name="createBy"]').attr('slug');
    var nameSchedule = $('input[name="nameSchedule"]').val();
    // && (lu.length != 6 || ma.length != 6 || mi.length != 6 || ju.length != 6 || vi.length != 6)
    if (lu.length == 0 || ma.length == 0 || mi.length == 0 || ju.length == 0 || vi.length == 0 && lu.length != 6 || ma.length != 6 || mi.length != 6 || ju.length != 6 || vi.length != 6) {
      $.alert({
        theme: 'Modern',
        icon: 'lh exclamation triangle icon',
        title: 'Aguantate',
        type: 'red',
        content: 'Falta completar los horarios',
        typeAnimated: true
      });
    } else {
      if (!createBy || !nameSchedule) {
        $.alert({
          theme: 'Modern',
          icon: 'lh exclamation triangle icon',
          title: 'Falta Aglo',
          type: 'red',
          content: 'Revisa los datos del horario',
          typeAnimated: true
        });
      }else{
        $.post("/schedule/ScheduleStore", {"data":{"creador":createBy,"nombreHorario":nameSchedule,"lunes":lu,"martes":ma,"miercoles":mi,"jueves":ju,"viernes":vi},"success":true,"error":true},
          function (data, textStatus, jqXHR) {
            $('input[name="nameSchedule"]').val('');
            $('.card-day button').remove();
            swal({ 
              title:"Horario Creado", 
              text: "Horario registrado correctamente", 
              type: "success", 
              buttonsStyling: true, 
              confirmButtonClass: "btn btn-success"})
            console.log(data);
            localStorage.clear();
        });
      }
    }
});

}//aqui termina 