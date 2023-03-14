<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function getUsers() {
        return response()->json(User::where('email', '<>', 'jatin@jprajapati.in')->get());
    }
}
