<?php

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () use (&$router) {
    $router->get('/', function () {
      return app('auth')->user();
    });

    $router->delete('oauth/revokeToken', function () {
      app('auth')->user()->token()->revoke();
      return response()->json([
        'message' => 'Successfully logged out'
      ]);
    });

      // agencies
  $router->get('internship_agencies','AgenciesController@getList');
  $router->post('internship_agencies','AgenciesController@store');
  $router->post('internship_agencies/{id}', 'AgenciesController@update');

      // proposal
  $router->get('proposal','ProposalController@getList');


      // User
  $router->get('users/mahasiswa','UsersController@getMhs');
  $router->get('users/lecture','UsersController@getLecture');
  $router->get('users/staff','UsersController@getStaff');
  
  

      // agencies
  $router->get('agencies','AgenciesController@getList');


      // internship
  $router->get('internship','InternshipController@getList');
  
  
});

