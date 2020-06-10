/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// <!-- dropdown-->
$('.ui.dropdown').dropdown(); // <!-- MODALS-->

$('.test.modal').modal({
  inverted: true
}).modal('attach events', '.test.button', 'show'); //  <!-- REGISTRO DE USUARIOS  -->

if (window.location.pathname == '/register') {
  $.ajax({
    type: "GET",
    url: "admin/getRole",
    success: function success(response) {
      console.log(response);
      var rol_select = '<div class="item" data-value="0">Seleccionar</div>';
      $.each(response, function (r) {
        rol_select = '<div class="item" data-value="' + response[r].id + '">' + response[r].name + '</div>'; // console.log

        $('#selectRole').append(rol_select);
      });
    }
  });
}

$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); // <!-- CALENDARIOS  -->

  $('.ui.calendar').calendar({
    monthFirst: false,
    type: 'date',
    dateHandling: 'formatter',
    formatter: {
      date: function date(_date, settings) {
        if (!_date) return '';

        var day = _date.getDate();

        var month = _date.getMonth() + 1;

        var year = _date.getFullYear();

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
    }
  }); // <!-- CAMBIAR ROLES  -->
  // Guardado de la materia
  // obteniendo color

  var btnsColor = $('.selectColor button');
  $(btnsColor).click(function (e) {
    var c = $(this).attr('color');
    $(btnsColor).removeClass('active');
    $(this).addClass('active');
  }); //  <!-- GUARDANDO DATOS DE LA MATERIA  -->

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
    } else {
      var array = [name, btn];
      $.ajax({
        type: "POST",
        url: "/schedule/MateriaStore",
        data: {
          'array': JSON.stringify(array)
        },
        success: function success(response) {
          if (response == 'error') {
            $.alert({
              theme: 'Modern',
              icon: 'lh exclamation triangle icon',
              title: 'Ups',
              type: 'red',
              content: 'Actualmente hay un mismo registro con el nombre <strong>" ' + name + ' "</strong>',
              typeAnimated: true
            });
          } else {
            swal({
              title: "Materia Creada",
              text: "Se ha creado de manera existosa",
              type: "success",
              buttonsStyling: true,
              confirmButtonClass: "btn btn-success"
            });
            $('#tableMaterias').DataTable().ajax.reload();
            $(btnsColor).removeClass('active');
            $('input[name="nameMateria"]').val('');
          }

          ;
        }
      });
    }
  });
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/scripts.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Apps\laragon\www\GestorH\resources\js\scripts.js */"./resources/js/scripts.js");


/***/ })

/******/ });