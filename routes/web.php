<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function () {
    // Clear all caches
    Artisan::call('optimize:clear');
    
    // Optionally, return a response
    return 'Cache cleared successfully!';
});
Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::get('/check_middle', [App\Http\Controllers\CheckMiddleController::class, 'check_middle'])->name('check_middle');

Route::post('/login_post', [App\Http\Controllers\Auth\LoginController::class, 'login_post'])->name('login_post');

Route::post('/save_device_token', [App\Http\Controllers\HomeController::class, 'save_device_token'])->name('save_device_token');
Route::get('/sendNotification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('sendNotification');
Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('user.update_profile');

Route::get('/get_users_list/{name}', [App\Http\Controllers\HomeController::class, 'get_users_list'])->name('get_users_list');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/web_details/{app_key}', [App\Http\Controllers\HomeController::class, 'web_details'])->name('web_details');

Route::get('/Conversation/{id}/{name}', [App\Http\Controllers\HomeController::class, 'conversation'])->name('Conversation');
Route::post('/send_message/{id}', [App\Http\Controllers\HomeController::class, 'send_message'])->name('send_message/{id}');
Route::get('/block/{id}', [App\Http\Controllers\HomeController::class, 'block'])->name('block/{id}');
Route::get('/unblock/{id}', [App\Http\Controllers\HomeController::class, 'unblock'])->name('unblock/{id}');
Route::post('/create_group', [App\Http\Controllers\HomeController::class, 'create_group'])->name('create_group');
Route::post('/add_member/{id}', [App\Http\Controllers\HomeController::class, 'add_member'])->name('add_member/{id}');
Route::get('/Group/{id}/{name}', [App\Http\Controllers\HomeController::class, 'group'])->name('Group/{id}/{name}');
Route::get('/leave_group/{id}', [App\Http\Controllers\HomeController::class, 'leave_group'])->name('leave_group/{id}');
Route::get('/make_host/{group_id}/{member_id}', [App\Http\Controllers\HomeController::class, 'make_host'])->name('make_host/{group_id}/{member_id}');
Route::get('/kick_out/{group_id}/{member_id}', [App\Http\Controllers\HomeController::class, 'kick_out'])->name('kick_out/{group_id}/{member_id}');
Route::post('/send_message_to_group/{id}', [App\Http\Controllers\HomeController::class, 'send_message_to_group'])->name('send_message_to_group/{id}');
Route::get('/pricing', [App\Http\Controllers\Auth\LoginController::class, 'pricing'])->name('front.pricing');
Route::get('/payforsubscribe/{id}', [App\Http\Controllers\HomeController::class, 'payforsubscribe'])->name('front.payforsubscribe');
Route::get('package_expiration', [App\Http\Controllers\HomeController::class, 'package_expiration'])->name('front.package_expiration');
Route::get('success-transaction/{id}', [App\Http\Controllers\HomeController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [App\Http\Controllers\HomeController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::post('/change_profile_pic', [App\Http\Controllers\HomeController::class, 'change_profile_pic'])->name('change_profile_pic');
Route::post('/update_profile_info', [App\Http\Controllers\HomeController::class, 'update_profile_info'])->name('update_profile_info');

// ADMIN ROUTES
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/all-users', [App\Http\Controllers\AdminController::class, 'all_users'])->name('admin.allusers');
Route::post('/admin/create_user', [App\Http\Controllers\AdminController::class, 'create_user'])->name('admin.create_user');

Route::get('/admin/deactive_user/{id}', [App\Http\Controllers\AdminController::class, 'deactive_user'])->name('admin.deactive_user');
Route::get('/admin/active_user/{id}', [App\Http\Controllers\AdminController::class, 'active_user'])->name('admin.active_user');
Route::get('/admin/deactive-users', [App\Http\Controllers\AdminController::class, 'all_deactive_users'])->name('admin.deactive_users');
Route::get('/admin/active-users', [App\Http\Controllers\AdminController::class, 'all_active_users'])->name('admin.all_active_users');
Route::get('/admin/all-packages', [App\Http\Controllers\AdminController::class, 'all_packages'])->name('admin.all_packages');
Route::get('/admin/create-packages', [App\Http\Controllers\AdminController::class, 'create_package'])->name('admin.create_package');
Route::post('/admin/create-packages', [App\Http\Controllers\AdminController::class, 'add_package'])->name('admin.add_package');
Route::get('/admin/active-package/{id}', [App\Http\Controllers\AdminController::class, 'activate_package'])->name('admin.activate_package');
Route::get('/admin/deactive-package/{id}', [App\Http\Controllers\AdminController::class, 'deactivate_package'])->name('admin.deactivate_package');
Route::get('/admin/edit-packages/{id}', [App\Http\Controllers\AdminController::class, 'edit_package'])->name('admin.edit_package');
Route::post('/admin/update_packages/{id}', [App\Http\Controllers\AdminController::class, 'update_packages'])->name('admin.update_packages');

Route::Get('/admin/UserChat', [App\Http\Controllers\AdminController::class, 'UserChat'])->name('admin.UserChat');

Route::get('/admin/UserConv/{id}', [App\Http\Controllers\AdminController::class, 'Chat_conv'])->name('admin.chat_conv');

Route::get('/admin/chats/{id}', [App\Http\Controllers\AdminController::class, 'chats'])->name('admin.chats');

Route::Get('/admin/Allusergroup', [App\Http\Controllers\AdminController::class, 'Allusergroup'])->name('admin.Allusergroup');

Route::get('/admin/usergroup/{id}', [App\Http\Controllers\AdminController::class, 'usergroup'])->name('admin.usergroup');

Route::get('/admin/groupchat/{id}', [App\Http\Controllers\AdminController::class, 'groupchat'])->name('admin.groupchat');

// Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'dashuser'])->name('admin.home');
Route::get('/client/apps', [App\Http\Controllers\ClientController::class, 'apps'])->name('client.apps');
Route::get('/client/create-app', [App\Http\Controllers\ClientController::class, 'create_app'])->name('client.create_app');
Route::post('/client/store_app', [App\Http\Controllers\ClientController::class, 'store_app'])->name('client.store_app');

Route::get('/client/home', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('/client/integration', [App\Http\Controllers\ClientController::class, 'integration'])->name('client.code');


Route::get('/append_chat/{id}', [App\Http\Controllers\ChatApiController::class, 'append_chat'])->name('append_chat');
Route::post('/message_send_from_visitor', [App\Http\Controllers\ChatApiController::class, 'message_send_from_visitor'])->name('message_send_from_visitor');
Route::post('/create_leads', [App\Http\Controllers\ChatApiController::class, 'create_leads'])->name('create_leads');


Route::get('/widget_test', [App\Http\Controllers\ChatApiController::class, 'widget_test'])->name('widget_test');
