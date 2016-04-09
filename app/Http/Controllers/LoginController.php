<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Usuario;

class LoginController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LoginRequest $request)
	{
		$response = 0;
		$message = '';
		$id = 0;
		$authorized = DB::select('call login_new(?,?)', [$request['username'],$request['password']]);

		foreach ($authorized as $result){
			$response = $result->result;
			$message = $result->msj;
			$id = $result->usrID;
		}
		if($response == 1){
			$usr = Usuario::find($id);
			Auth::login($usr);
			return Redirect::to('usuario');
		}else{
			Session::flash('loginfail',$message);
			return Redirect::to('login');
		}
//		if(Auth::attempt(['usuario'=>$request['username'], 'password'=>$request['password']])){
//			return Redirect::to('usuario');
//		}
	}
	public function logout(){
		Auth::logout();
		return Redirect::to('login');

	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
