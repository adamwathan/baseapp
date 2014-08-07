<?php

class RegistrationForm
{
    protected $input = array();
    protected $rules = [
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required'],
    ];

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function save()
    {
        $this->validate();
        $this->createUser();
    }

    protected function validate()
    {
        $validator = Validator::make($this->input, $this->rules);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors());
        }
    }

    protected function createUser()
    {
        $user = new User;
        $user->email = $this->input['email'];
        $user->password = Hash::make($this->input['password']);
        $user->save();
    }
}
