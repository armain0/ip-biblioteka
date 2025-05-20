<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	function index()
	{
		if (Auth::id()) {
			$usertype = Auth()->user()->usertype;

			$name = Auth()->user()->name;

			if ($usertype == 'admin') {
				$user = User::all()->count();
				$book = Book::all()->count();

				$borrowed = Borrow::where('status', 'Prihvaćeno')->count();
				$returned = Borrow::where('status', 'Vraćeno')->count();

				return view('admin.index', compact('name', 'user', 'book', 'borrowed', 'returned'));
			} else if ($usertype == 'user') {
				$data = Book::all();
				$category = Category::all();

				return view('home.index', compact('data', 'category'));
			}
		} else {
			return redirect()->back();
		}
	}

	function category_page()
	{
		$data = Category::all();
		$name = Auth()->user()->name;

		return view('admin.category', compact('name', 'data'));
	}

	function add_category(Request $request)
	{
		$data = new Category();

		$data->cat_title = $request->category;

		$data->save();

		return redirect()->back()->with('message', 'Žanr uspješno dodan.');
	}

	function edit_category($id)
	{
		$data = Category::find($id);
		$name = Auth()->user()->name;

		return view('admin.edit_category', compact('name', 'data'));
	}

	function update_category(Request $request, $id)
	{
		$data = Category::find($id);

		$data->cat_title = $request->cat_name;

		$data->save();

		return redirect('/category_page')->with('message', 'Žanr uspješno ažuriran.');
	}

	function delete_category($id)
	{
		$data = Category::find($id);

		$data->delete();

		return redirect()->back()->with('message', 'Žanr uspješno obrisan.');
	}

	function add_book()
	{
		$data = Category::all();
		$name = Auth()->user()->name;

		return view('admin.add_book', compact('name', 'data'));
	}

	function store_book(Request $request)
	{
		$data = new Book();

		$data->title = $request->book_name;
		$data->author_name = $request->author_name;
		$data->quantity = $request->quantity;
		$data->category_id = $request->category;

		$book_image = $request->book_img;

		if ($book_image) {
			$book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

			$request->book_img->move('book', $book_image_name);

			$data->book_img = $book_image_name;
		}

		$data->save();

		return redirect()->back()->with('message', 'Knjiga uspješno dodana.');
	}

	function show_book()
	{
		$data = Book::all();
		$name = Auth()->user()->name;

		return view('admin.show_book', compact('name', 'data'));
	}

	function delete_book($id)
	{
		$data = Book::find($id);

		$data->delete();

		return redirect()->back()->with('message', 'Knjiga uspješno obrisana.');
	}

	function edit_book($id)
	{
		$data = Book::find($id);
		$category = Category::all();
		$name = Auth()->user()->name;

		return view('admin.edit_book', compact('name', 'data', 'category'));
	}

	function update_book(Request $request, $id)
	{
		$data = Book::find($id);

		$data->title = $request->book_name;
		$data->author_name = $request->author_name;
		$data->quantity = $request->quantity;
		$data->category_id = $request->category;

		if ($request->hasFile('book_img')) {
			$book_image = $request->file('book_img');

			$book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

			$request->book_img->move('book', $book_image_name);

			$data->book_img = $book_image_name;
		}

		$data->save();

		return redirect('/show_book')->with('message', 'Lista knjiga uspješno ažurirana.');
	}

	function borrow_request()
	{
		$data = Borrow::all();
		$name = Auth()->user()->name;

		return view('admin.borrow_request', compact('name', 'data'));
	}


	function change_book_status(Request $request, $id)
	{
		$data = Borrow::find($id);
		$action = $request->input('action');
		$status = $data->status;
		$book = Book::find($data->book_id);

		if ($action === 'approve' && $status === 'Prijavljeno') {
			if ($book->quantity >= 1) {
				$data->status = 'Prihvaćeno';

				$book->quantity -= 1;

				$book->save();
			}
		} elseif ($action === 'reject' && $status === 'Prijavljeno') {
			$data->status = 'Odbijeno';
		} elseif (
			$action === 'return'
			&& $status === 'Prihvaćeno'
		) {
			if ($status === 'Prihvaćeno') {
				$book->quantity += 1;

				$book->save();
			}

			$data->status = 'Vraćeno';
		}

		$data->save();

		return redirect()->back();
	}
}