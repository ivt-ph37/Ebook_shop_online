<?php

namespace App\Http\Middleware;

use Closure;

class RoleAuthorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        $token = null;
        try{
            $token = JWTAuth::parseToken();
        }catch (Exception $ex){
            return $this->unauthorized('Your must login to take token.');
        }

        try{
            //  $token = JWTAuth::parseToken();
            $user = $token->authenticate();

        }catch (TokenExpiredException $e) {
            return $this->unauthorized('Your token has expired. Please, login again.');
        } catch (TokenInvalidException $e) {
            return $this->unauthorized('Your token is invalid. Please, login again.');
        }catch (JWTException $e) {
            return $this->unauthorized('Please, attach a Bearer Token to your request');
        }catch (Exception $ex){
            return $this->unauthorized('Your token is invalid.');
        }

        if ($user->hasAnyRole($role) == true){
            return $next($request);
        }
        return $this->unauthorized();

    }

    public function unauthorized($message = null){
        return response()->json([
            'message' => $message ? $message : 'You are unauthorized to access this resource',
            'success' => false
        ], 401);
    }
}
