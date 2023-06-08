<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
        $user = User::latest()->paginate(10);

        return view('admin.user.index',compact('user'))

        ->with('i', (request()->input('page', 1) - 1) * 5);

        //
    }
    public function destroy(User $user)
    {
        if (Gate::denies('access-admin')){
            abort('403');
         }
        $user->delete();

        return redirect()->route('user.index')

                        ->with('success','user deleted successfully');
    }
    public function show(User $user){
        return $user;
    }
    public function getUsers()
    {
        $users = User::all()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'emailaddress' => $user->email,
            ];
        });
        return response()->json($users);
    }
    public function updateAuthorization(Request $request, $id)
    {
        // Find the record by id
        $record = User::findOrFail($id);

        // Update the 'authorized' column to true
        $record->update(['authorized' => true]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Authorization updated successfully.');
    }
    public function usersNeedingAuthorization()
    {
        $users = User::where('authorized', false)->paginate(10);
    
        return view('admin.user.index', ['user' => $users])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    



}
