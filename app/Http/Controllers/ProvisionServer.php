<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvisionServer extends Controller
{
    // Hiển thị trang index đầu tiên hoặc trang khác
    public function page($index = "index")
    {
        if ($index === "index") {
            return $this->getStatistics();
        }

        return view($index);
    }

    private function getStatistics()
    {
        return view('index');
    }
}
