<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RandNum\RandNumRetrieveRequest;
use App\Http\Resources\RandomNumResource;
use App\Models\RandomNum;
use Illuminate\Http\JsonResponse;

class RandomNumController extends Controller
{
    public function generate(): \Illuminate\Http\JsonResponse
    {
        $random = new RandomNum([
            'random_num' => rand()
        ]);
        $random->save();
        return response()->json([
            'random' => $random
        ]);
    }

    public function retrieve(RandNumRetrieveRequest $request): RandomNumResource|JsonResponse
    {
        $randomNum = RandomNum::query()->find($request->id);
        if (!$randomNum) {
            return response()->json([
                'message' => 'Random number not found',
                'status' => false
            ], 404);
        }
        return new RandomNumResource($randomNum);
    }
}
