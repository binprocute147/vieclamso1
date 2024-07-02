<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvisionServer extends Controller
{
    // hiển thị trang index đầu tiên
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
