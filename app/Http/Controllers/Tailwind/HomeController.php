<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Userdetail;
use App\Models\UserDepartment;
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
        $paginatedUsers = Userdetail::with('user_department.department','user_code')->when($request->has('search'), function ($query) use ($request) {
            $search = $request->get('search');
            if (!empty($search)) {
                $query->where(function($query) use ($search) {
                    $query->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');
                });
            }
        })->paginate(8);
        // dd($paginatedUsers->user_department);
        return view('user-management-system.userList', ['users' => $paginatedUsers, 'dept']);
    }

    public function userDetail($id)
    {
        $user = Userdetail::where('id', $id)->with( 'user_department', 'user_code')->first();
        return view('user-management-system.userDetail', compact('user'));
    }
}
