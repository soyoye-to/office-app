<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class TestingController extends Controller
{
    public function Index() {
        return 'Hello';
    }
}
