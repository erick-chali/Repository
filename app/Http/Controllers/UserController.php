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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Collective\Html;
use App\Http\Requests\ResetPasswordRequest;
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
		env('MAIL_HOST','hostdeprueba');
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
		$crea = null;
		$activo = null;
		if ($request->get('create_content') == '1'){
			$crea = 1;
		}else{
			$crea = 0;
		}
		if ($request->get('active') == '1'){
			$activo = 1;
		}else{
			$activo = 0;
		}
		if($request->ajax()){
			$creacion = DB::select('call usuariosInsert(?,?,?,?,?,?,?)',
				array(Input::get('enterprise'),
					Input::get('name'),
					Input::get('email'),
					Input::get('username'),
					Input::get('password'),
					$crea,
					$activo));
			Session::flash('creacion', $creacion);
			return response()->json($creacion);
		}

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

	public function reset($id, ResetPasswordRequest $request){
		$user = DB::table('usuario')->select('e_mail')->where('usuario', '=', $request->get('username'))->get();
		$mail = null;
		foreach ($user as $dato){
			$mail = $dato->e_mail;
		}

//		return 'Mail: '.$mail;
		if($mail==''){
			Session::flash('resetfail', 'No se pudo encontrar usuario: '.$request->get('username'));
			return redirect('usuario');
		}else{
			$newpassword = str_random(8);
			$hashedpassword = Hash::make($newpassword);
			DB::table('usuario')
				->where('codigo_usuario', $id)
				->update(['password' => $hashedpassword]);
//			return $id.' '.$request->get('username');

			$config = array(
				'driver' => 'smtp',
				'host' => 'smtp-mail.outlook.com',
				'port' => 587,
				'from' => array('address' => 'erick.chali93@hotmail.com', 'name' => 'Erick Hotmail'),
				'encryption' => 'tls',
				'username' => 'erick.chali93@hotmail.com',
				'password' => 'Inge__2015',
				'sendmail' => '/usr/sbin/sendmail -bs',
				'pretend' => false
			);
			Config::set('mail',$config);
			if(Mail::send('correo.email',['newpassword'=>$newpassword,'username'=>$request->get('username')] ,function($message) {
				$message->to('erick.chali93@gmail.com', 'Erick')->subject('Joven Joven');
			})){
				Session::flash('resetok', 'La clave del usuario '.$request->get('username').' fue restablecida exitosamente.');
				return redirect('usuario');
			}else{
				Session::flash('resetfail', 'Ocurrio un error al cambiar la clave de usuario: '.$request->get('username'));
				return redirect('usuario');
			}
		}
	}
	public function changepassword($id, Requests\ChangePasswordRequest $request){
		$change = DB::select('call updatePsw(?,?,?)',
			array(
				$id,
				$request->get('password'),
				false));
		Session::flash('resetok', 'Clave cambiada exitosamente.');
		return redirect('usuario');
	}
	public function change($id){
		$user = DB::table('usuario')->select('codigo_usuario', 'usuario')->where('codigo_usuario', '=', $id)->get();
		return view('usuario.changepassword',['user'=>$user]);
	}
	public function restore($id){
		$user = DB::table('usuario')->select('codigo_usuario', 'usuario')->where('codigo_usuario', '=', $id)->get();

		return view('usuario.resetpassword',['user'=>$user]);
//		return view('correo.email');
//		$newpassword = str_random(8);
//		$config = array(
//			'driver' => 'smtp',
//			'host' => 'smtp-mail.outlook.com',
//			'port' => 587,
//			'from' => array('address' => 'erick.chali93@hotmail.com', 'name' => 'Erick Hotmail'),
//			'encryption' => 'tls',
//			'username' => 'erick.chali93@hotmail.com',
//			'password' => 'Inge__2015',
//			'sendmail' => '/usr/sbin/sendmail -bs',
//			'pretend' => false
//		);
//		Config::set('mail',$config);
//		if(Mail::send('correo.email',['newpassword'=>$newpassword] ,function($message) {
//			$message->to('pablo_sao@outlook.com', 'Pablo')->subject('Joven Joven');
//		})){
//			return 'Enviado...';
//		}
//		$encrypt = \Crypt::encrypt('holamundo');
//		$value = $encrypt;
//		$decrypted = \Crypt::decrypt($value);
//		return $encrypt.' Desencriptada: '.$decrypted;
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
