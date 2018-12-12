<?php

use App\Task;
use App\nguoidung;
use Illuminate\Http\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function() {
    $tasks = Task::orderBy('created_at', 'desc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function(Request $request){
    switch($request->taskbut) {
        case 'signup':
            $validator = Validator::make($request->all(),[
                'username' => 'required|min:6',
                'password' => 'required|min:6',
                'repassword' => 'required|min:6'
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            } elseif ($request->password != $request->repassword) {
                return redirect('/')
                    ->withInput()
                    ->withErrors(array('message' => 'Mat khau nhap lai khong dung'));
            }
            $nguoidungcu = nguoidung::where('ten', '=', $request->username)->first();
            if ($nguoidungcu == null) {
                $nguoidungmoi = new nguoidung;
                $nguoidungmoi->ten = $request->username;
                $nguoidungmoi->matkhau = $request->password;
                $nguoidungmoi->vaitro = 0;
                $nguoidungmoi->save();
            } else {
                return redirect('/')
                    ->withInput()
                    ->withErrors(array('message' => 'Tai khoan da ton tai'));
            }
            return redirect('/');
            break;
        case 'add':
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }

            $task = new Task;
            $task->name = $request->name;
            $task->save();

            return redirect('/');
            break;
        case 'login':
            $validator = Validator::make($request->all(),[
                'loginusername' => 'required|min:6',
                'loginpassword' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }
            $nguoidungcu = nguoidung::where('ten', '=', $request->loginusername)
                ->where('matkhau', '=', $request->loginpassword)
                ->first();
            if ($nguoidungcu != null) {
                session(['user' => $request->loginusername]);
                return redirect('/');
            } else {
                return redirect('/')
                    ->withInput()
                    ->withErrors(array('message' => 'Sai tai khoan hoac mat khau'));
            }
            break;
        case 'logout':
            session(['user' => null]);
            return redirect('/');
            break;
    }

});
//sign up
//Route::post('/task', function(Request $request) {
  //  $validator = Validator::make($request->all(),[
//
 //   ])
//});

Route::delete('/task/{task}', function($id) {
    Task::findOrFail($id)->delete();
    return redirect('/');
});