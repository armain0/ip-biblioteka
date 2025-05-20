<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	function index()
	{
		$data = Book::all();
		$category = Category::all();

		return view('home.index', compact('data', 'category'));
	}

	function borrow_books($id)
	{
		$data = Book::find($id);

		$book_id = $id;

		$quantity = $data->quantity;

		if ($quantity >= 1) {
			if (Auth::id()) {
				$user_id = Auth::user()->id;

				$borrow = new Borrow();

				$borrow->book_id = $book_id;
				$borrow->user_id = $user_id;
				$borrow->status = "Prijavljeno";

				$borrow->save();

				return redirect()->back()->with('message', 'Zahtjev prijave za posudbu je poslan.');
			} else {
				return redirect('/login');
			}
		} else {
			return redirect()->back()->with('message', 'Nedovoljan broj knjiga!');
		}
	}

	function book_history()
	{
		if (Auth::id()) {
			$userid = Auth::user()->id;

			$data = Borrow::where('user_id', '=', $userid)->get();

			return view('home.book_history', compact('data'));
		}
	}

	function cancel_request(Request $request, $id)
	{
		$data = Borrow::find($id);

		if ($data->status === 'Prijavljeno') {
			$data->delete();

			return redirect()->back()->with('message', 'Odbijen zahtjev za posudbu.');
		}

		return redirect()->back()->with('message', 'Knjiga je već vraćena.');
	}

	function explore()
	{
		$data = Book::all();
		$category = Category::all();

		return view('home.explore', compact('data', 'category'));
	}

	function search(Request $request)
	{
		$search = $request->search;

		$data = Book::where('title', 'LIKE', '%' . $search . '%')
			->orWhere('author_name', 'LIKE', '%' . $search . '%')->get();

		$category = Category::all();

		return view('home.explore', compact('data', 'category'));
	}

	function category_search($id)
	{
		if ($id == 0) {
			$data = Book::all();
		} else {
			$data = Book::where('category_id', $id)->get();
		}

		$category = Category::all();

		return view('home.explore', compact('data', 'category'));
	}
}
