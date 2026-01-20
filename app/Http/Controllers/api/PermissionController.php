<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\UserPermission;
use Exception;

class PermissionController extends Controller
{
    public function permissionList()
    {
        try {
            $permissions = Permission::paginate(8);
            return response()->json([
                $permissions,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }

    // public function addPermission(Request $request, $id = null)
    // {
    //     $request->validate([
    //         "permission" => 'required|max:20',
    //     ]);
    //     try {
    //         $permissions = Permission::updateOrCreate(
    //             ['id' => $id],
    //             ['permission' => $request->permission],
    //         );
    //         return response()->json([
    //             $permissions,
    //         ]);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'Error' => 'Data not found'
    //         ], 404);
    //     }
    // }

}
