<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CheckUserInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:50',
            'middleName' => 'nullable|string|max:50',
            'lastName' => 'required|string|max:50',
            'mobile' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users,email',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email') && $errors->get('email')[0] === 'The email has already been taken.') {
                return response()->json(['error' => 'The email has already been taken.'], 422);
            }
        }
        return $next($request);
    }
}
