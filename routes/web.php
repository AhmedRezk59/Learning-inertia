<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/users', function () {
        return inertia('Users/Index', [
            'users' => User::query()
                ->when(request()->search, function ($query, $search) {
                    return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->orderBy('id', 'desc')
                ->paginate(10)
                ->withQueryString()
                ->through(
                    fn ($user) => [
                        'id' => $user->id,
                        'email' => $user->email,
                        'name' => $user->name,
                        'editable' => auth()->user()->can('edit' , $user)
                    ]
                ),
            'filters' => request()->only(['search']),
            'can' => [
                'create_user' => auth()->user()->can('create' , User::class)
            ]
        ]);
    });
    Route::get('/users/create', function () {
        return inertia('Users/Create');
    })->can('create' , User::class);
    Route::post('/users', function () {
        $data = Request::validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        User::create($data);

        return redirect('/users/create');
    })->can('create' , User::class);
    Route::get('/', function () {
        return inertia('Home');
    });
    Route::post('/logout', [LoginController::class , 'logout']);
});
