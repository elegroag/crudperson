
var module_app = angular.module('app_crud', ['ui.router']);
var _app = {};
_app.personas = _personas;
_app.emails = _emails;

	module_app.config(function($stateProvider, $urlRouterProvider){	
  	$stateProvider
    .state({
    	name: 'index',
    	url: '/index',
    	templateUrl: "/app/views/tmp_tabla_personas.html",
      controller: 'ListarPersonas'
  	})
    .state({
      name: 'agregar',
      url: '/agregar',
      templateUrl: "/app/views/tmp_form_persona.html",
      controller: 'AgregarPersonas'
    })
    .state({
      name: 'editar',
      url: '/editar/:id',
      templateUrl: "/app/views/tmp_editar_persona.html",
      controller: 'EditarPersonas'
    })
    .state({
      name: 'mostrar',
      url: '/mostrar/:id',
      templateUrl: "/app/views/tmp_mostrar_persona.html",
      controller: 'MostrarPersona'
    })
    .state({
      name: 'emails',
      url: '/emails',
      templateUrl: "/app/views/tmp_form_email.html",
      controller: 'CrearEmail'
    });

  	$urlRouterProvider.otherwise('index');
	}).
  factory('_app', function($http){
    _app.municipios = _municipios;
    _app.persona = {};
    _app.municipio = {};
    _app.email = {};
    
    _app.remove_email = function(email){
      $http({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'delete',
        url: '/rest_emails/' + email.id
      }).then(function successCallback(response)
      {
        var indice = _app.emails.indexOf(email);
        _app.emails.splice(indice, 1);
        
      }, function errorCallback(response){
        console.log(data.responseText);
      });
    };

    _app.add_persona = function(persona){
      $http({
        url: '/rest_personas',
        method: 'POST',
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: persona,
      }).then(function successCallback(response)
      {
        _app.persona = response.data.model;
        _app.municipio = _.findWhere(_app.municipios, {id: parseInt(persona.municipios_id)});
        _app.persona.muni_nombre = _app.municipio.muni_nombre;
        _app.personas.push(_app.persona);
        $("#show_result").removeClass('hidden');
        $("#show_msj").html("El registro se completo con éxito. OK");

      }, function errorCallback(response){
        console.log(data.responseText);
      });
    };

    _app.up_persona = function(persona){
      $http({
        method: 'PUT',
        url: '/rest_personas/' + persona.id,
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: persona,
      }).then(function successCallback(response)
      {
          var indice = _app.personas.indexOf(_app.personas);
          _app.municipio = _.findWhere(_app.municipios, {id: parseInt(persona.municipios_id)});
          
          _app.persona.muni_nombre = _app.municipio.muni_nombre;
          _app.personas[indice] = _app.persona;
      }, function errorCallback(response){
        console.log(data.responseText);
      });
    };
    
    _app.remove_personas = function(persona){
      $http({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'delete',
        url: '/rest_personas/' + persona.id
      }).then(function successCallback(response){
        var indice = _app.personas.indexOf(persona);
        _app.personas.splice(indice, 1);      
      }, function errorCallback(response){
        console.log(data.responseText);
      });
    };

    return _app;
  })
  .controller('ListarPersonas', function($scope, $state, _app){
    $scope.personas = _app.personas;
    $scope.municipios = _app.municipios;
    
    $scope.emails = function(){
       $state.go('emails');
    };

    $scope.agregar = function(){
       $state.go('agregar');
    };
    
    $scope.editar = function(persona){
      _app.persona = persona;
      $state.go('editar', {id: persona.id});
    };
    
    $scope.borrar = function(persona){
      _app.persona = persona;
      _app.remove_personas(persona);
    };

    $scope.mostrar = function(persona){
      _app.persona = persona;
      $state.go('mostrar',{id: persona.id});
    };
  })
  .controller('EditarPersonas', function($stateParams, $scope, $state, _app){
    if(_.size(_app.persona) == 0){
      _app.persona = _.findWhere(_app.personas, {id: parseInt($stateParams.id)});  
      $scope.persona = _app.persona;
    }else{
      $scope.persona = _app.persona;
    }
    
    $scope.municipios = _app.municipios;

    $scope.lista = function(){
       $state.go('index');
    };

    $scope.actualizar = function()
    {
      _app.persona = $scope.persona;
      _app.up_persona(_app.persona);
      $state.go('index');
    }
  })
  .controller('AgregarPersonas', function($scope, $state, _app){
    $scope.persona = {};
    $scope.municipios = _app.municipios;
    
    $scope.lista = function(){
       $state.go('index');
    };

    $scope.registrar = function(){
      _app.add_persona($scope.persona);      
    };
  })
  .controller('MostrarPersona', function($stateParams, $scope, $state, _app){
    if(_.size(_app.persona) == 0){
      _app.persona = _.findWhere(_app.personas, {id: parseInt($stateParams.id)});  
      $scope.persona = _app.persona;
    }else{
      $scope.persona = _app.persona;
    }
    
    $scope.lista = function(){
       $state.go('index');
    };
  })
  .controller('CrearEmail', function($scope, $state, _app, $http){
    $scope.email = {};
    $scope.emails = _app.emails;     
    $scope.personas = _app.personas;
    
    $scope.borrar = function(email){
      _app.email = email;
      _app.remove_email(email);
    }
    
    $scope.registrar = function(){
      var datos = $scope.email;
      datos.users_id = parseInt(_users_id);

      _.each(datos.personas, function(value, personas_id){     
        var email = datos;
        delete email.personas;
        email.personas_id = parseInt(personas_id);

        if(value == true){
          $http({
            url: '/rest_emails',
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
              data: JSON.stringify(email),
            }).then(function successCallback(response)
            {
              _app.email = response.data.model;
              _app.emails.push(_app.email);            
            }, function errorCallback(response){
              console.log(data.responseText);
            });
        }
      });
    };

    $scope.lista = function(){
       $state.go('index');
    };
  });
 