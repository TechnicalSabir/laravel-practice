<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $users = User::all();
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        $user = new User();
        return view('user.manage', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse {
        $user = User::create($request->toArray());
        return redirect()->route('user.index')->with('status', ['success' => true, 'alert_type' => 'success', 'message' => 'User created!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View {
        $user = User::findOrFail($id);
        return view('user.manage', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->back()->with('status', ['success' => true, 'alert_type' => 'success', 'message' => 'User updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('status', ['success' => true, 'alert_type' => 'success', 'message' => 'User deleted!']);
    }
}
