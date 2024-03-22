<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::paginate(15);

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function show(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.show', [
            'user' => $user
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('admin.user.index');
    }

    public function edit(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('user.show', $user);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->name = '';
        $user->email = Str::random(40);
        $user->address = '';
        $user->password = '';
        $user->save();
        $user->delete();


        return redirect()->route('user.index');
    }
}
