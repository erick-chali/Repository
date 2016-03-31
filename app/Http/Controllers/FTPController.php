<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class FTPController extends Controller {

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
//		//Direccion local del archivo que queremos subir
//		$fileLocal = storage_path('app/downloaded.txt');
//
//		/*Direccion remota donde queremos subir el archivo
//        En este caso seria a la raiz del servidor*/
//
//		$fileRemote = '/upload/downloaded.txt';
//
//		$mode = 'FTP_BINARY';
//
//		//Hacemos el upload
//		\FTP::connection()->uploadFile($fileLocal,$fileRemote,$mode);

//		$crear = \FTP::connection()->makeDir('Folder');
//		if($crear){
//			return 'si';
//		}else{
//			return 'no';
//		}

		//Direccion local del archivo que queremos bajar

//		$fileLocal = 'C:\Users\Erick\Downloads\LICENSE.txt';
//
//		/*Direccion remota donde queremos subir el archivo
//        En este caso seria a la raiz del servidor*/
//
//		$fileRemote = '/httpdocs/license.txt';
//
//		$mode = 'FTP_BINARY';
//
//		//Hacemos el download
//		\FTP::connection()->downloadFile($fileRemote,$fileLocal,$mode);
//
//		//Detenemos la funcion con un mensajes
//		return('Operación realizada con éxito');
		return view('archivo.homeupload');
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
	public function store()
	{
//		$listing = \FTP::connection()->getDirListing('/Folder');
//		return $listing;
		$files = Input::file('images');
		// Making counting of uploaded images
		$file_count = count($files);
		// start count how many uploaded
		$uploadcount = 0;
		foreach($files as $file) {

			//Direccion local del archivo que queremos subir
			$fileLocal = $file;

			/*Direccion remota donde queremos subir el archivo
			En este caso seria a la raiz del servidor*/

			$fileRemote = '/Folder/'.$file->getClientOriginalName();;

			$mode = 'FTP_BINARY';

			//Hacemos el upload
			if(\FTP::connection()->uploadFile($fileLocal,$fileRemote,$mode)){
				$uploadcount ++;
			}
		}
		if($uploadcount == $file_count){
			Session::flash('success', 'Upload successfully');
			return Redirect::to('ftp');
		}else{
			Session::flash('success', 'Error al subirlos todos');
			return Redirect::to('ftp');
		}
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
