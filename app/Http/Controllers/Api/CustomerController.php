<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\StructureController;
use Illuminate\Http\Request;
use App\Models\Country; 
use App\User;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Validation\Rule;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegisterRequest;

class CustomerController extends StructureController
{
	public function __construct() 
    {     
        $this->upload_folder = 'user_images';
    }

/* start register*/
    public function register(RegisterRequest $request)
    {
    	// all validation belongs to request RegisterRequest
    	
        	// check if phone starts with desired format(E.164)
        	$checkResult = check_e164Format($request->country_code, $request->phone_number);
 
        	if($checkResult)  // if e.164 format fails
        	{
                   return $this->respond(['message' => [$checkResult], 'status_code' => 400], 400);
            }
            else{    // if e.164 format pass

            	// if phone number belongs to country available phone numbers
	            $code_validator = Validator::make($request->all(), [
	                'phone_number'        => [Rule::phone()->country([$request->country_code])],
	                 ]);

	                if($code_validator->fails()) {
	                   return $this->phoneFormatMismatch();
	                }
	                else{ // if all stipulations pass

	                	$upload_image = uploadImage($request->avatar, $this->upload_folder);
				        if($upload_image == false)
				        {
				            return $this->respond(['message' => ['invalid image extension'], 'status_code' => 400], 400);
				        }
				        
	                	$user = User::create([
	                		'first_name'    => $request->first_name,
	                		'last_name'     => $request->last_name,
	                		'email'         => $request->email,
	                		'password'      => bcrypt(123456789),
	                		'gender'        => $request->gender,
	                		'date_of_birth' => $request->date_of_birth,
	                		'avatar'        => $upload_image,
	                		'country_code'  => $request->country_code,
	                		'phone_number'         => PhoneNumber::make($request->phone_number, $request->country_code)->formatE164(),
	                	]);

	                	 $token = JWTAuth::fromUser($user);
	                	 $user['token'] = $token;
	                	
	                	return $this->respond(['data' => $user, 'status_code' => 201], 201);
	                }
	        }
      //  }
    } /* end register*/

    public function login(Request $request)
    {
    	$credentials = $request->only('phone_number', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user['token'] = $token;
        return $this->respond(['token' => $token, 'status_code' => 200], 200);
    }

     // get status list 
    public function status(Request $request)
    {
        $data = Country::take(1)->get(['id', 'name', 'iso', 'iso3', 'phonecode']);
        $user = $this->getAuthenticatedUser();
        if ($user->phone_number != $request->phone_number) {
        	return $this->respond(['message' => ['token does not belong to phone number'], 'status_code' => 400], 400);
        }
        $data['user'] = $user;
        return $this->respond(['data' => $data, 'status_code' => 200], 200);
    } 
    // end // get status list 

    // get countries list 
    public function getCountries()
    {
        $data = Country::get(['id', 'name', 'iso', 'iso3', 'phonecode']);
        return $this->respond(['data' => $data, 'status_code' => 200], 200);
    } 
    // end // get countries list 
}
