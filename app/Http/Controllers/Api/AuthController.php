<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{

    public function auth(Request $request):JsonResponse
    {

        $code = 1234;

        Cache::put($code,$request->get('phone'),$seconds = 60);

        return response()->json(['message' => 'вам отправлен смс кодом 1234']);
    }

    public function verify(Request $request): JsonResponse
    {
        if (!Cache::has($request->get('code'))) {
            return response()->json('неверный код', 400, ['charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }
        $phone = Cache::get($request->get('code'));

        $user = User::firstOrNew(['phone' => $phone]);
        $user->phone =$phone;
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function profile(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json(['message' => 'вы вышли']);
    }
}
