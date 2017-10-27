<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ticket;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
	public function create()
	{
		$categories = Category::all();

		return view('tickets.create', compact('categories'));
	}
}
