<?php

class AuthController extends BaseController {

	public function showSignIn()
	{
		return View::make('auth.sign-in');
	}

	public function attemptSignIn()
	{
		if (! Auth::attempt(Input::only('email', 'password'))) {
			return Redirect::action('AuthController@showSignIn')
				->with('error', 'Invalid credentials')->withInput();
		}
		return Redirect::intended();
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::home();
	}

	public function showSignUp()
	{
		return View::make('auth.sign-up');
	}

	public function attemptSignUp()
	{
		$form = new RegistrationForm(Input::all());

		try {
			$form->save();
		} catch (ValidationException $e) {
			return Redirect::action('AuthController@showSignUp')
				->withErrors($e->errors())->withInput();
		}

		return Redirect::intended();
	}
}
