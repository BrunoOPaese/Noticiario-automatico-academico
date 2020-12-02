<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller{
    public function index(){
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    public function create(){
        $User = new User();
        return view('User', [
            'user' => $User
        ]);
    }
    
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ];

        $messages = [
            'name.requred' => 'O campo Nome deve estar preenchido',
            'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo Nome deve te no máximo 255 caracteres',
            'email.requred' => 'O campo email deve estar preenchido',
            'email.email' => 'O campo email deve ser válido',
            'email.unique' => 'O campo este email já está cadstrado',
            'password.requred' => 'O campo senha deve estar preenchido',
            'password.confirmed' => 'As senhas não conferem',
        ];

        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $User = new User();
        $User->name = $request->input('name');
        $User->password = bcrypt($request->input('password'));
        $User->email = $request->input('email');
        $User->save();

        return redirect()->route('users.index');
    }

    public function update(Request $request, $id){
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed'
        ];

        $messages = [
            'name.requred' => 'O campo Nome deve estar preenchido',
            'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo Nome deve te no máximo 255 caracteres',
            'email.requred' => 'O campo email deve estar preenchido',
            'email.email' => 'O campo email deve ser válido',
            'email.unique' => 'O campo este email já está cadstrado',
            'password.confirmed' => 'As senhas não conferem',
        ];

        $validator  = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $User = User::find($id);
        $User->name = $request->input('name');
        if($request->input('password')) {
            $User->password = bcrypt($request->input('password'));
        }
        $User->email = $request->input('email');
        $User->save();

        return redirect()->route('users.index');
    }

    public function edit($id){
        $User = User::find($id);

        return view('User', [
            'user' => $User
        ]);
    }

    public function destroy($id){
        $User = User::find($id);
        $User->delete();

        return redirect()->route('users.index');
    }
}