<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use JWTAuth;
use App\User;

class StructureController extends Controller
{
     // === Return json response ===
    protected function respond($data, $status_code, $headers = [])
    {
        return response()->json($data, $status_code, $headers);
    }
    // === End function ===
    
    // === Generate validation error messages ===
    protected function getErrorMessage($validator)
    {
        $messages  = $validator->messages();
        $keys      = $validator->errors()->keys();
        $errors    = [];
        return $this->respond(['message' => $messages->toJson(), 'status_code' => 400], 400);
    }
    // === End function ===

     // === Generate validation error messages ===
    protected function phoneFormatMismatch()
    {
        return $this->respond(['message' => ['Phone format does not match with country code'] , 'status_code' => 400], 400);
    }
    // === End function ===

    // === Validate user authorization ====
  
  
    protected function getAuthenticatedUser()
    {
        try
        {
            if (! $user =  Auth::guard('api')->user()) 
            {
                return false;//response()->json(['user_not_found'], 404);
            }
        } 
        catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e)
        {
            return response()->json(['token_expired'], $e->getStatusCode());
        }
        catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) 
        {
            return response()->json(['token_invalid'], $e->getStatusCode());
        }
        catch (Tymon\JWTAuth\Exceptions\JWTException $e)
        {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return $user;      
    }
    // === End function ===
}
