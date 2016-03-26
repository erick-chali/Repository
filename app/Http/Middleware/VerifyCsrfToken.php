<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Support\Facades\Input;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
//		$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
//		$token = Input::get('_token');
		return parent::handle($request, $next);
//		return $request->session()->token() == $token;
	}


}
