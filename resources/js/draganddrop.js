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
      orden = sortable.toArray();
        // array.push[orden];
        console.log(orden);
    }
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
  $(this).parent().fadeOut('medium');
  // $(this).parent().remove();
});

// <!-- BOTON GUARDAR HORARIO -->
$('#saveSchedule').click(function (e) { 
  Sortable.create(dia1,{
    store:{
      set: function(sortable){
        
        x1 = orden = sortable.toArray();
          console.log(x1);
      }
    }
  })
});

}//aqui termina 