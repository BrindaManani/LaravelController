<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userdetail;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = Userdetail::all();
            return response()->json($user);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        };
    }
    public function userDetail($id)
    {
        try {
            $user = Userdetail::findOrFail($id);
            return response()->json($user);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        };
    }
}
