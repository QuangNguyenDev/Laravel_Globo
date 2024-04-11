<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateInput
{
    public function handle(Request $request, Closure $next)
    {
        $rules = [];
        $path = $request->path();

        switch ($path) {
            case 'users':
                $rules = [
                    'name' => 'required|string',
                    'email' => 'required|email|unique:users,email',
                    // Add more validation rules for user creation
                ];
                break;
            case 'posts':
                $rules = [
                    'title' => 'required|string',
                    'content' => 'required|string',
                    // Add more validation rules for post creation
                ];
                break;
            case 'categories':
                $rules = [
                    'name' => 'required|string',
                    // Add more validation rules for category creation
                ];
                break;
            case 'tags':
                $rules = [
                    'name' => 'required|string',
                    // Add more validation rules for tag creation
                ];
                break;
            default:
                break;
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        return $next($request);
    }
}
