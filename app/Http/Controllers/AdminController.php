<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class AdminController extends Controller
{
    // Display the admin dashboard
    public function dashboard()
    {
        $totalReports = Report::count();
        $pendingReports = Report::where('status', 'Pending')->count();
        $approvedReports = Report::where('status', 'Approved')->count();
        $rejectedReports = Report::where('status', 'Rejected')->count();
        $reports = Report::all(); 
        return view('admin.index ', compact('totalReports', 'pendingReports', 'approvedReports', 'rejectedReports', 'reports'));
    }

    // Display a list of users
    public function index()
    {
        $users = User::whereIn('role', ['user'])->get();
        return view('admin.users.index', compact('users'));
    }

    // Show a form for creating a new user
    public function create()
    {

        return view('admin.users.create');
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Show a form for editing an existing user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update an existing user in the database
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Delete an existing user from the database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
