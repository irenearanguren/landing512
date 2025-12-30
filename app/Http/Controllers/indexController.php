<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{

    /* public function __construct()
    {
        $this->middleware('auth')->except(['index', 'login', 'registerClient']);
    } */
    public function products()
    {
        $products= Product::paginate(20);
        if ($products->isEmpty()) {
            
            return redirect()->back()->withErrors(['products' => 'No products found.']);
        }
        return $products;
    }

    public function landingIrene()
    {
        $title = 'irenearanguren.com';
        $titlePage = 'Irene Aranguren ';
        $image = storage_path('app/public/irenearanguren/jumboirene.png');
        $descriptionMain = 'Esta es una muestra de una landingpage interactiva.';
        return view('home', compact('title', 'image', 'descriptionMain', 'titlePage'));
    }
    public function category($id){
        $category = Category::all();
        $products = Product::where('cat_id', $id)->paginate(20);
        if ($products->isEmpty()) {
            return $category;
        }
        return $products;
    }
    public function demo()
    {
        $title = 'Pageland - Catalogo';
        $titlePage = 'Muestra y organiza tus productos y servicios';
        $image = 'https://example.com/image.jpg';
        $descriptionMain = 'Organiza y muestra tus productos y servicios de manera sencilla y atractiva para tus clientes.';
        $products = $this->products();
        $allCat = Category::all();
        return view('index', compact('title', 'image', 'descriptionMain', 'titlePage', 'products', 'allCat'));
    }
    public function client(Request $request)
    {
        $title = 'Area de cliente';
        $titlePage = 'Pageland - Area de cliente';
        $image = 'https://example.com/image.jpg';
        $descriptionMain = 'Esta es una descripción de muestra para el área de cliente.';
        $allCat= Category::all();
        $products = Product::with('imagenes')->paginate(20);
        //$user = User::find($id);
        $category= $this->category(request('id_cat') );
        $nameButton = 'Salir';
        $Link = route('client.logout');
/*         if (!$user) {
            return redirect()->route('index')->withErrors(['client' => 'Client not found.']);
        } */
        return view('index', compact('title', 'titlePage', 'image', 'descriptionMain', 'category', 'products', 'allCat', 'nameButton', 'Link'));
    }

    public function login(Request $request)
    {
       try {
            $credentials = $request->only('email', 'password');

            $remember = $request->has('remember');
            if (Auth::attempt($credentials, $remember)) {
                if (Auth::user()->permission === 1) {
                    return redirect()->route('admin.dashboard')->with('success', 'Login successful');
                } elseif (Auth::user()->permission === 2) {
                    return redirect()->route('index.client')->with('success', 'Login successful');
                } else { 
                    return redirect()->back()->withErrors(['login' => 'Permission denied']);
                }
            } else {
                return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['login' => 'An error occurred while logging in.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('index')->with('success', 'Logged out successfully');
    }
    public function registerClient(Request $request)
    {

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->permission = '2';
        $user->save();
        if (!$user) {
            return redirect()->back()->withErrors(['register' => 'Registration failed. Please try again.']);
        }
        return redirect()->route('index')->with('success', 'Registered successfully');

    }
    public function registerFormAdmin(){
        return view('registerAdmin');
    }

}
