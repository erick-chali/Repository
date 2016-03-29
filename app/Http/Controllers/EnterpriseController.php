<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\EnterpriseRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Log;

class EnterpriseController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function combo(){
		$comboEnterprise = DB::select('call empresasSelectAll()');
		return response()->json(
			$comboEnterprise
		);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resultado = DB::select('call empresasSelectAll()');
		return view('empresa.homeempresa', ['resultado' => $resultado]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('empresa.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EnterpriseRequest $request)
	{
		$creacion = DB::select('call empresaInsert(?,?,?)',
			array(Input::get('name'),
				Input::get('country'),
				Input::get('active')));
		Session::flash('creacion', $creacion);
		return redirect('empresa');
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
		$datos = DB::select('call empresasSelect(?)', array($id));
		return view('empresa.profile', ['datos'=>$datos]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EnterpriseRequest $request)
	{
		$actualizacion = DB::select('call empresaUpdate(?,?,?,?)',
			array(
				$id,
				$request->get('name'),
				$request->get('country'),
				$request->get('active')));
		Session::flash('actualizacion', $actualizacion);
		return redirect('empresa');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$eliminacion = DB::select('call empresaDelete(?)',
			array($id));
		Session::flash('eliminacion', $eliminacion);
		return redirect('empresa');
	}

}
