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
        $admin_detail = '-';
        if (Auth::user() != null) {
            $admin_detail = AdminDetails::where('admin_id', Auth::user()->id)->first();
        }

        $view->with('admin_detail', $admin_detail);
    }
}
