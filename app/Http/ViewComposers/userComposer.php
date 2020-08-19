<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

// Model
use App\Models\AdminDetails;

class UserComposer
{
    public function compose(View $view)
    {
        /**
         * get admin detail
         */
        $user_composer = '-';
        if (Auth::user() != null) {
            $user_composer = AdminDetails::where('admin_id', Auth::user()->id)->first();
        }

        $view->with('user_composer', $user_composer);
    }
}
