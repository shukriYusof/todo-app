<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\OAuthClients;
use App\Models\OAuthRefreshToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    protected function login(Request $request)
    {
        // Check if a user with the specified email exists
        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            return $this->errorJsonResponse('User not exists', null, 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->errorJsonResponse('Invalid email or password', null, 422);
        }

        $tokenData = $this->generateToken($request);

        return $this->successJsonResponse(
            'Successfully logged in to the app.',
            [
                'user' => UserResource::make($user),
                'token' => $tokenData->access_token,
                'expires_in' => $tokenData->expires_in
            ],
            200
        );
    }

    protected function register(Request $request)
    {
        $user = User::create($request->all());

        $tokenData = $this->generateToken($request);

        return $this->successJsonResponse(
            'Successfully registered to the app.',
            [
                'user' => UserResource::make($user),
                'token' => $tokenData->access_token,
                'expires_in' => $tokenData->expires_in
            ],
            200
        );
    }

    protected function logout()
    {
        $accessToken = auth()->user()->token();

        OAuthRefreshToken::currentUser($accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        return response()->json(['status' => 204]);

    }

    private function generateToken($request) : object
    {
         // Get the Password Client for OAuth
         $oauthClient = OAuthClients::client()->first();

         if (!$oauthClient) {
             return $this->errorJsonResponse('Laravel Passport is not set up properly. Please contact an admin or tech who is responsible for setting up Laravel Passport.', null, 500);
         }

         // Prepare data for requesting an access token
         $tokenRequestData = [
             'grant_type' => 'password',
             'client_id' => $oauthClient->id,
             'client_secret' => $oauthClient->secret,
             'username' => $request->email,
             'password' => $request->password
         ];

         $tokenRequest = Request::create('/oauth/token', 'POST', $tokenRequestData);

         $response = app()->handle($tokenRequest);

         if ($response->getStatusCode() !== 200) {
             return $this->errorJsonResponse('Invalid email or password', null, 422);
         }

         $tokenData = json_decode($response->getContent());

         return $tokenData;
    }
}
