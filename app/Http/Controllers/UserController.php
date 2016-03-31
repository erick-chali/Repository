<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$password = bcrypt('hola123456');
//		DB::statement('call usuariosInsert(1,"Usuario 4", "prueba4@gmail.com", "user4", '.$password.', false, true)');
//		$datos = DB::select('call usuariosInsert(?,?,?,?,?,?,?)', array(1,"Usuario 4", "prueba4@gmail.com", "user4", '.$password.', false, true));

//		return view('usuario.create', ['datos'=>$datos]);

//		return $datos;
		$resultado = DB::select('call usuariosSelectAll()');
		return view('usuario.homeuser', ['resultado' => $resultado]);
//		return $datos;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuario.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsuarioRequest $request)
	{
		$clave = Hash::make($request['password']);
		$creacion = DB::select('call usuariosInsert(?,?,?,?,?,?,?)',
			array(Input::get('enterprise'),
				Input::get('name'),
				Input::get('email'),
				Input::get('username'),
				$clave,
				Input::get('create_content'),
				Input::get('active')));
		Session::flash('creacion', $creacion);
		return redirect('usuario');
	}

	public function editarusuario(){
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{



	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$datos = DB::select('call usuariosSelect(?)', array($id));
		return view('usuario.profile', ['datos'=>$datos]);
	}
	public function restore($id){
		return $id;
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UsuarioUpdateRequest $request)
	{
		$actualizacion = DB::select('call usuariosUpdate(?,?,?,?,?,?,?,?)',
			array(
				$id,
				$request->get('enterprise'),
				$request->get('name'),
				$request->get('email'),
				$request->get('username'),
				$request->get('password'),
				$request->get('create_content'),
				$request->get('active')));
		Session::flash('actualizacion', $actualizacion);
		return redirect('usuario');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$eliminacion = DB::select('call usuarioDelete(?)',
			array($id));
		Session::flash('eliminacion', $eliminacion);
		return redirect('usuario');
	}

}
