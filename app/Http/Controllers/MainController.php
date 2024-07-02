<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Sale;
use App\Models\ScientificArea;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\View\View;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function show(): View
    {
        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $scientific_areas = ScientificArea::get();
        $books = Book::orderBy('created_at', 'desc')->get()->take(4);

        return view('library.index', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
            'books' => $books
        ]);
    }
    
    public function detail(int $id): View
    {
        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $scientific_areas = ScientificArea::get();
        $book = Book::find($id);
        return view('library.detail', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
            'book' => $book
        ]);
    }

    public function shops(): View
    {
        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $scientific_areas = ScientificArea::get();
        $books = Book::query()
            ->orderBy('created_at', 'desc')
            ->paginate();


        return view('library.shop', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
            'books' => $books
        ]);
    }

    public function contact(): View
    {
        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $scientific_areas = ScientificArea::get();

        return view('library.contact', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
        ]);
    }

    public function cart(): View
    {
        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $cart = Sale::where('user_id', request()->user()->id)
        ->where('is_paid', false)
        ->get();
        $subtotal = 0;

        foreach ($cart as $item) {
            $book = Book::find($item->id);
            $item->book = $book;
            $subtotal += $item->price;
        }

        $scientific_areas = ScientificArea::get();

        return view('library.cart', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function remove_from_cart(int $id): View
    {
        Sale::destroy($id);
        return $this->cart();
    }

    public function finalize(): View
    {
        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $cart = Sale::where('user_id', request()->user()->id)
        ->where('is_paid', false)
        ->get();

        $user = User::find(request()->user()->id);
        $user_info = UserInfo::where('user_id', $user->id)->first();

        $subtotal = 0;

        foreach ($cart as $item) {
            $book = Book::find($item->id);
            $item->book = $book;
            $subtotal += $item->price;
        }

        $scientific_areas = ScientificArea::get();

        return view('library.checkout', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
            'cart' => $cart,
            'subtotal' => $subtotal,
            'user' => $user,
            'user_info' => $user_info,
        ]);
    }

    public function finalize_over(): View
    {
        Sale::where('user_id', request()->user()->id)
        ->where('is_paid', false)
        ->update(['is_paid' => true]);

        return $this->finalize();
    }

    public function add_to_cart(int $id): View
    {
        $user_info = UserInfo::where('user_id', request()->user()->id)
        ->first();
        $book = Book::find($id);

        Sale::create([
            'user_id' => request()->user()->id,
            'book_id' => $book->id,
            'is_paid' => false,
            'price' => $book->price,
            'delivery_address' => $user_info->address,
        ]);

        $book->stock = $book->stock-1;
        $book->save();

        return $this->cart();
    }

    public function search(Request $request): View
    {
        $request->validate([
            'search' => ['required', 'string', 'max:255'],
        ]);

        $cart_count = Sale::where('user_id', request()->user()->id)
            ->where('is_paid', false)
            ->count();
        $scientific_areas = ScientificArea::get();
        $books = Book::query()
            ->whereRaw('LOWER(title) LIKE ?', '%' . strtolower($request->search) . '%')
            ->orderBy('created_at', 'desc')
            ->paginate();


        return view('library.shop', [
            'scientific_areas' => $scientific_areas,
            'cart_count' => $cart_count,
            'books' => $books
        ]);
    }
}
