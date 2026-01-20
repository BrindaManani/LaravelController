<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Userdetail;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count = Userdetail::count();
        $activeUsersCount = Userdetail::where('status', 'active')->count();
        $inactiveUsersCount = Userdetail::where('status', 'inactive')->count();
        $blockUsersCount = Userdetail::where('status', 'block')->count();

        return view('user-management-system.dashboard', compact('count', 'activeUsersCount', 'inactiveUsersCount', 'blockUsersCount'));
    }

    public function userList(Request $request)
    {
        $paginatedUsers = User::with('user_department.department', 'user_code')->when($request->has('search'), function ($query) use ($request) {
            $search = $request->get('search');
            if (!empty($search)) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%');
                });
            }
        })->paginate(8);
        return view('user-management-system.userList', ['users' => $paginatedUsers, 'dept']);
    }

    public function userDetail($id)
    {
        $user = Userdetail::where('id', $id)->with('user_department', 'user_code')->first();
        return view('user-management-system.userDetail', compact('user'));
    }
}
