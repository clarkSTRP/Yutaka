<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->paginate(10);

        return view('admin.user.index',compact('user'))

        ->with('i', (request()->input('page', 1) - 1) * 5);

        //
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')

                        ->with('success','user deleted successfully');
    }
}
