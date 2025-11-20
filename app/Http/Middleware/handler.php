<?php

function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json(['message' => $exception->getMessage()], 401);
    }

    if (in_array('seller', $exception->guards())) {
        return redirect()->route('seller.login'); // ← this should match your route name
    }

    return redirect()->route('seller.login');
}
