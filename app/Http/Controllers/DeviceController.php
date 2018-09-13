<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use App\Http\Controllers\Controller;
use JWTAuth;
use App\Device;
use JWTAuthException;
use Helpers\Api;

use App\Services\UsersService;

class DeviceController extends Controller
{
    protected $userService;
    private $device;

    /**
     * DeviceController constructor.
     * @param Device $device
     */
    public function __construct(Device $device){
        $this->device = $device;
    }
   
    public function register(Request $request){
        $device = $this->device->create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);
        return "11111";
        // return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$device]);
    }

    /**
     * Login for get Json Web Token
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        $userService = new UsersService();
        $device_code = $request -> device_code;
        $username = $request -> username;

        $users = $userService -> findCondition('device_code', 'LIKE', $device_code);
        if (empty($users)) {
         $userService -> create(['device_code' => $device_code, 'username' => $username]);
        }
        try {
          if (!$token = JWTAuth::attempt($credentials)) {
            return Api::r_response("", 'invalid_email_or_password', 'S422');
          }
        } catch (JWTAuthException $e) {
          return Api::r_response("", 'failed_to_create_token', 'E500');
        }
        return Api::r_response($token, 'Login successfully', 'S200');
    }

    /**
     * @api {get} /user Request User infomation
     * @apiName getAuthUser
     * @apiGroup User
     */
    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json($user);
    }
}
