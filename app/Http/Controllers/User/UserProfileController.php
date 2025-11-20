<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
   public function index()
    {
        $user = Auth::user(); // ab Customer return karega

        if (!$user) {
            return view('user.profile')->with('error', 'User not logged in!');
        }

        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('profile.index')->with('error', 'User not logged in!');
    }

    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:customers,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'gender'=> 'nullable|in:male,female,other'
    ]);

    $user->update([
        'full_name' => $request->name,
        'email'     => $request->email,
        'phone'     => $request->phone,
        'gender'    => $request->gender,
    ]);

    return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
}
}
