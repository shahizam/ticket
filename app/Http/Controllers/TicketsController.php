<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use App\Category;
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

	public function store(Request $request, AppMailer $mailer)
	{
		$this->validate($request, [
			'title'		=> 'required',
			'category'	=> 'required',
			'priority'	=> 'required',
			'message'	=> 'required',
		]);

		$ticket = new Ticket([
			'title'			=> $request->input('title'),
			'user_id'		=> Auth::user()->id,
			'ticket_id'		=> strtoupper(str_random(10)),
			'category_id'	=> $request->input('category'),
			'priority'		=> $request->input('priority'),
			'message'		=> $request->input('message'),
			'status'		=> "Open",
		]);

		$ticket->save();

		$mailer->sendTicketInformation(Auth::user(), $ticket);

		return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
	}

	public function userTickets()
	{
		$tickets = Ticket::where('user_id', Auth::user()->id)->paginate(5);
		$categories = Category::all();

		return view('tickets.user_tickets', compact('tickets', 'categories'));
	}

	public function selectedTicket($ticket_id)
	{
		$ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
		$category = $ticket->category;
		$comments = $ticket->comments;

		return view('tickets.selected_ticket', compact('ticket', 'category', 'comments'));
	}

}
