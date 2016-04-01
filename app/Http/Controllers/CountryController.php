<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Input;
use Session;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller {


	public function combo(){
		$comboCountry = DB::select('call paisesSelectAll()');
		return response()->json(
			$comboCountry
		);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resultado = DB::select('call paisesSelectAll()');
		return view('pais.homepais', ['resultado' => $resultado]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pais.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CountryRequest $request)
	{
		$creacion = DB::select('call paisesInsert(?,?)',
			array(
				Input::get('country'),
				Input::get('active')));
		Session::flash('creacion', $creacion);
		return redirect('pais');
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
		$datos = DB::select('call paisesSelect(?)', array($id));
		return view('pais.profile', ['datos'=>$datos]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CountryRequest $request)
	{
		$actualizacion = DB::select('call paisUpdate(?,?,?)',
			array(
				$id,
				$request->get('country'),
				$request->get('active')));
		Session::flash('actualizacion', $actualizacion);
		return redirect('pais');
//		return 'ID: '.$id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$eliminacion = DB::select('call paisesDelelte(?)',
			array($id));
		Session::flash('eliminacion', $eliminacion);
		return redirect('pais');
	}

}
