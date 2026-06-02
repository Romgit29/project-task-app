<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\RedirectResponse;

abstract class Controller
{
    /**
     * @param Closure $code
     * @param string $successRoute
     * @return RedirectResponse
     */
    protected function tryCatchWrap(Closure $code, string $successRoute): RedirectResponse
    {
        try {
            $code();
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Внутренняя ошибка сервера');
        }

        return redirect()
            ->to($successRoute)
            ->with('success', 'Успех');
    }
}
