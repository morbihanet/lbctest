<?php

namespace LBC\Http\Controllers;

use Illuminate\Http\Request;

class Api extends Controller
{
    /**
     * @param string $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkmail(string $email)
    {
        $status = !filter_var($email, FILTER_VALIDATE_EMAIL) === false;

        return response()->json(compact('status'));
    }

}