<?php

Auth::routes();


//all user routes
Route::get('/',['uses'=>'HomeController@index','role'=>array('manager','coordinator','Superadmin','student'),'as'=>'home']);
Route::post('/save-idea',['uses'=>'IdeasController@newIdea','role'=>array('student','manager','coordinator','Superadmin'),'as'=>'']);
Route::get('/idea-details',['uses'=> 'IdeasController@viewIdea','role'=>array('student','manager','coordinator','Superadmin')]);
Route::get('/idea-for-comment/{id}',['uses'=> 'IdeasController@ideaForComment','role'=>array('student','manager','coordinator','Superadmin')]);
Route::get('/idea-comment',['uses'=>  'IdeasController@detailsIdea','role'=>array('student','manager','coordinator','Superadmin')]);
Route::post('/new-answer', ['uses'=> 'IdeasController@saveAnswer','role'=>array('student','manager','coordinator','Superadmin')]);
Route::post('/like-dislike', ['uses'=> 'IdeasController@saveLikeDislike','role'=>array('student','manager','coordinator','Superadmin')]);
Route::post('/dislike-to-like',['uses'=>  'IdeasController@updateLikeDislike','role'=>array('student','manager','coordinator','Superadmin')]);
Route::get('/like-count', ['uses'=> 'IdeasController@viewLike','role'=>array('student','manager','coordinator','Superadmin')]);
Route::get('/check-like',['uses'=>  'IdeasController@checkLike','role'=>array('student','manager','coordinator','Superadmin')]);
Route::get('/dislike-count',['uses'=>  'IdeasController@viewDislike','role'=>array('student','manager','coordinator','Superadmin')]);
Route::post('/update-view',['uses'=>  'IdeasController@updateView','role'=>array('student','manager','coordinator','Superadmin')]);
Route::get('/Profile-view', ['uses'=> 'ProfileController@viewProfile','role'=>array('student','manager','coordinator','Superadmin')]);
Route::post('/update-profile',['uses'=> 'ProfileController@UpdateProfile','role'=>array('student','manager','coordinator','Superadmin')]);

//only admin routes
Route::get('/super-admin', ['uses'=>'AdminController@view','role'=>array('manager','Superadmin'),'as'=>'Superadminpanel']);
Route::get('/allocate-coordinator', ['uses'=>'DepartmentController@addcoordinatorInDepartment','role'=>array('Superadmin')]);
Route::get('/add-department', ['uses'=>'DepartmentController@addDepartment','role'=>array('Superadmin')]);
Route::post('/new-department', ['uses'=>'DepartmentController@saveDepartment','role'=>array('Superadmin')]);
Route::post('/save-coordinator', ['uses'=>'DepartmentController@saveDepartmentInfo','role'=>'Superadmin','as'=>'']);
Route::get('/manage-department', ['uses'=>'DepartmentController@manageDepartmentInfo','role'=>'Superadmin','as'=>'']);
Route::get('/edit-department/{id}', ['uses'=>'DepartmentController@editDepartmentInfo','role'=>'Superadmin','as'=>'']);
Route::post('/update-department', ['uses'=>'DepartmentController@updateDepartmentInfo','role'=>'Superadmin','as'=>'']);
Route::get('/add-member', ['uses'=>'MemberController@addMember','role'=>'Superadmin','as'=>'']);
Route::post('/new-member', ['uses'=>'MemberController@newRole','role'=>'Superadmin','as'=>'newMember']);
Route::post('/update-idea', ['uses'=>'ReviewIdeaController@updateIdea','role'=>'manager','as'=>'']);
Route::get('/manage-member', ['uses'=>'MemberController@viewMember','role'=>array('Superadmin'),'as'=>'newMember']);
Route::get('/edit-member/{id}', ['uses'=>'MemberController@editRole','role'=>array('Superadmin'),'as'=>'editMember']);
Route::post('/update-member', ['uses'=>'MemberController@updateRoleInfo','role'=>array('Superadmin'),'as'=>'editMember']);

//only manager routes
Route::get('/add-category', ['uses'=>'AdminController@coOrdinatorView','role'=>array('manager')]);
Route::get('/view-download', ['uses'=>'AdminController@viewDownload','role'=>array('manager')]);
Route::post('/download', ['uses'=>'AdminController@download','role'=>array('manager')]);
Route::post('/new-category', ['uses'=>'CategoryController@saveCategoryInfo','role'=>array('manager',)]);
Route::get('/manage-category', ['uses'=>'CategoryController@manageCategoryInfo','role'=>array('manager')]);
Route::get('/unpublished-category/{id}',  ['uses'=>'CategoryController@unpublishedCategoryInfo','role'=>array('manager')]);
Route::get('/published-category/{id}',['uses'=>'CategoryController@publishedCategoryInfo','role'=>array('manager'),'as'=>'']);
Route::get('/edit-category/{id}', ['uses'=>'CategoryController@editCategoryInfo','role'=>array('manager'),'as'=>'']);
Route::post('/update-category', ['uses'=>'CategoryController@updateCategoryInfo','role'=>array('manager'),'as'=>'']);
Route::get('/delete-category/{id}', ['uses'=>'CategoryController@deleteCategoryInfo','role'=>array('manager'),'as'=>'']);
Route::get('/review-idea',['uses'=>'ReviewIdeaController@viewIdeas','role'=>array('manager'),'as'=>'managerpanel']);
Route::get('/edit-idea/{id}',['uses'=>'ReviewIdeaController@editIdea','role'=>array('manager')]);
Route::get('/unpublished-idea/{id}', ['uses'=>'ReviewIdeaController@unpublishedIdeaInfo','role'=>array('manager'),'as'=>'']);
Route::get('/published-idea/{id}', ['uses'=>'ReviewIdeaController@publishedIdeaInfo','role'=>array('manager'),'as'=>'']);
Route::get('/delete-idea/{id}', ['uses'=>'ReviewIdeaController@deleteIdeaInfo','role'=>array('manager'),'as'=>'']);
Route::get('/report', ['uses'=>'DepartmentController@CoordinatorInDepartment','role'=>array('manager','coordinator','Superadmin')]);
Route::get('/report-of-coordinator', ['uses'=>'CoordinatorController@ViewCoordinator','role'=>array('coordinator'),'as'=>'report']);

