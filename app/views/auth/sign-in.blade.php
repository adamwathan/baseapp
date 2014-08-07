
{{ BootForm::open() }}
@if (Session::has('error'))
{{ Session::get('error') }}
@endif
{{ BootForm::text('Email', 'email') }}
{{ BootForm::password('Password', 'password') }}
{{ BootForm::submit('Sign in') }}
{{ BootForm::close() }}
