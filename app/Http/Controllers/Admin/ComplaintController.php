<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::orderBy('id', 'DESC')->get();
        return view('backend.admin.complaints.index' , compact('complaints'));
    }
}
