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
  $router->delete('internship_agencies/{id}', 'AgenciesController@delete');


      // proposal
  $router->get('proposals','ProposalsController@getList');
  $router->post('proposals','ProposalsController@store');
  $router->post('proposals/{id}','ProposalsController@update');
  $router->get('proposals/{id}','ProposalsController@detail');
  $router->post('proposals/{id}/note','ProposalsController@addNote');
  $router->post('proposals/{id}/addfriend','ProposalsController@addTeam');
  $router->post('proposals/{id}/accept','ProposalsController@accept');
  $router->post('proposals/{id}/decline','ProposalsController@decline');
  $router->delete('proposals/{id}', 'ProposalsController@delete');

  

    
  // internship
  $router->get('internship','InternshipController@getList');
  $router->post('internship/{id}/addNilai','InternshipController@addGrade'); //tambah nilai
  $router->get('internship/{id}/addNilai','InternshipController@grade');
  $router->post('internship/{id}/advisors','InternshipController@advisors'); //tambah pembimbing

  //logbooks
  $router->group(['prefix' => 'internship/{internship_id}'], function () use (&$router) {
    $router->get('logbooks','InternshipController@logbookList');
    $router->post('logbooks','InternshipController@logbookStore');
    $router->post('logbooks/{id}/updates','InternshipController@logbookUpdate');
    $router->delete('logbooks/{id}','InternshipController@logbookDelete');

      $router->group(['prefix' => 'logbooks/{logbook_id}'], function () use (&$router) {
        $router->post('note','InternshipController@logbookNote');
      });

  });
  

  // User
  $router->get('users/mahasiswa','UsersController@getMhs');
  $router->get('users/lecture','UsersController@getLecture');
  $router->get('users/staff','UsersController@getStaff');
  
 
  // agencies
  $router->get('agencies','AgenciesController@getList');


});

