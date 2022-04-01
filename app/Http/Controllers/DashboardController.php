<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCertification;
use App\Models\ServiceVoucher;
use App\Models\Prescription;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('dashboard');
    }
}
