<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\UserCreator;
use App\Utilities\UserValidator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data): Validator
    {
        return UserValidator::validate($data);
    }

    protected function create(array $data): User
    {
        return UserCreator::create($data);
    }
}
