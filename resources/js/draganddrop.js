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
      x1 = orden = sortable.toArray();
        console.log(x1);
    }
  }
})

Sortable.create(dia2,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150
})
Sortable.create(dia3,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150
})
Sortable.create(dia4,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150
})
Sortable.create(dia5,{
  group:{
    name:'lista',
  },
  filter: '.break',
  dragClass: 'drag',
  animation: 150
})

//Remover items de las listas
$(".removeItemList").on('click',function() {   
  $(this).parent().fadeOut('medium');
  // $(this).parent().remove();
});

}