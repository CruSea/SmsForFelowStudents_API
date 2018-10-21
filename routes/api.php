<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('members','MembersController');
Route::resource('fellowShips','FellowshipController');
Route::resource('departments','DepartmentsController');
Route::resource('departmentmembers','MemberDepartmentController');

//message routes
//Route::group(['middleware' => 'auth.jwt'], function () {
    Route:: get('/departments',[ 'uses'=>'MessageController@getDepartment' ]);
    
    Route:: get('/department-messages',[ 'uses'=>'MessageController@get_department_message' ]);
    Route:: post('/department-message',[ 'uses'=>'MessageController@send_department_message' ]);
    Route:: delete('/department-message/{id}',[ 'uses'=>'MessageController@DeleteDepartmentMessage' ]);

    Route:: post('/member-message',[ 'uses'=>'MessageController@send_member_message' ]);
    Route:: get('/member-messages',[ 'uses'=>'MessageController@get_member_message' ]);
    Route:: delete('/member-message/{id}',[ 'uses'=>'MessageController@DeleteMemberMessage' ]);
    
   
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
