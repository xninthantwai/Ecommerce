<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $cart_total = Cart::query()
                    ->where('user_id', $user_id)
                    ->get();


        $articles = Article::all();
        return view('articles.index',[
            'cart_total' => $cart_total, 
            'articles' => $articles,
        ]);
    }

    public function detail(){
        $data = Cart::all();
        return view('articles.detail', [
            'data' => $data,
        ]);
    }



        public function add(){
           $categories = Category::all();
            return view('articles.add', [
                'categories' => $categories,
            ]);
        }

        public function create(){

            $validator = validator(request()->all(), [
                'name.required' => 'Name is required',
                'price' => 'required', 
                'category_id' => 'required',

                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example valida
            ]);

            if($validator->fails()){
                return back()->withErrors($validator);
            }

            $image = request()->file('image');
            $imageName = $image->getclientoriginalName();
            $image->move(public_path('/images'),$imageName);
            
            $article = new Article;
            $article->name = request()->name;
            $article->price = request()->price;
            $article->category_id = request()->category_id;
            $article->article_image = $imageName;
            $article->save();

            return redirect('/articles')->with('info', 'Success Order');
            // return back();
        }

        public function delete($id){
            $article = Article::find($id);
            $article->delete();

            return redirect('/articles')->with('info', 'Order Deleted');

        }

        public function addToCart($id){
            // $cart = Cart::query()
            //             -> where('user_id', Auth::id())
            //             ->get();
            //             return redirect('/articles');
       
            $carts = Cart::findorFail($id);
            $cart = session()->get('cart', []);
            if(isset($cart[$id])){
                $cart[$id]['quantity']++;
            }else{
                $cart[$id] = [
                    "name" => $cart->name,
                    "price" => $cart->price,
                    "quantity"=> 1,
                    "image" =>  $cart->image
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart has been add to Shopping Cart');
            
        }

        public function storeToCart(Request $request){
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->article_id = $request->input('id');
            $cart->save();

            return back();
            // return view('/articles');
        }

      
}
