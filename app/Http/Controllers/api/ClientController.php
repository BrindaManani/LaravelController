<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tblclient;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function client(request $request)
    {
        try {
            $page = $request->input('page', 1);
            $perPage = $request->input('per_page', 10);

            $clients = Tblclient::query();

            if ($query = $request->input('query')) {
                $clients->where(function ($q) use ($query) {
                    $q->where('company', 'LIKE', "%{$query}%")
                        ->orWhere('phonenumber', 'LIKE', "%{$query}%")
                        ->orWhere('city', 'LIKE', "%{$query}%")
                        ->orWhere('state', 'LIKE', "%{$query}%");
                });
            }

            if ($request->has('userid_from') && $request->has('userid_to')) {
                $from = $request->get('userid_from');
                $to = $request->get('userid_to');
                $clients->whereBetween('userid', [$from, $to]);
            }
            $result = $clients->paginate($perPage, ['*'], 'page', $page);
            return response()->json(
                $result,
            );
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ]);
        }
    }
}
