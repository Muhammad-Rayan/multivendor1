<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product\ProductCategory;
use App\Models\Admin\Product\Productlist;
use App\Models\Admin\Product\Brand;
use App\Models\Admin\Seller\Seller;
use App\Models\Admin\Order\Order;
use App\Models\User;
use App\Models\Admin\Refund\Refund;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Order\Item as OrderItems;
use App\Support\Helpers;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_category = ProductCategory::where('top_category',1)->limit(8)->orderby('updated_at','desc')->get();
        $new_seller = Productlist::with(['gallery'])->limit(10)->orderby('id','desc')
        ->where('parent_id',null)->get();
        $best_seller = Productlist::with(['gallery'])->limit(10)->orderby('id','asc')
        ->where('parent_id',null)->get();
        $most_popular = Productlist::with(['gallery'])->limit(10)->orderby('updated_at','desc')
        ->where('parent_id',null)->get();
        $featured = Productlist::with(['gallery'])->where('featured',1)->limit(10)->orderby('updated_at','desc')
        ->where('parent_id',null)->get();
        $categwise1 = Productlist::with(['gallery'])->where('cat_id',25)->limit(8)->orderby('updated_at','desc')
        ->where('parent_id',null)->get();
        $categwise2= Productlist::with(['gallery'])->where('cat_id',24)->limit(8)->orderby('updated_at','desc')
        ->where('parent_id',null)->get();
        $categwise3= Productlist::with(['gallery'])->where('cat_id',23)->limit(8)->orderby('updated_at','desc')
        ->where('parent_id',null)->get();
        $seller = Seller::limit(10)->orderby('id','desc')->get();
        $brand = Brand::limit(10)->orderby('id','desc')->get();
        
        return view('frontend.pages.index',compact('top_category','new_seller','best_seller',
        'most_popular','featured','categwise1','categwise2','categwise3','seller','brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function userdashboard()
    {
        $accountdetail1 =User::where('id',auth()->user()->id)->first();
   
        return view('frontend.pages.dashboard',compact('accountdetail1'));
    }
    public function order()
    {
        $order = Order::where('customer_id',auth()->user()->id)->orderby('updated_at','desc')->get();
       
        
        return view('frontend.pages.order',compact('order'));
    }
    public function accountdetail()
    {
        $accountdetail2 =User::with(['user_info'])->where('id',auth()->user()->id)->first();
        dd($accountdetail2);
        return view('frontend.pages.accountdetail',compact('accountdetail2'));
    }
    public function accountdetailupdate(Request $request,$id)
    {
           

        $seller = Seller::where('user_id',$id)->first();
        $seller->first_name=$request->first_name;
        $seller->last_name=$request->last_name;
        $seller->phone=$request->phone;
        $seller->email=$request->email;
        $seller->save();

        $user =User::where('id',$id)->first();
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return view('frontend.pages.accountdetail',compact('seller','user'));
    }
   
    public function cart()
    {
        
        return view('frontend.pages.cart');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add_to_cart($id)
    {
        $product = Productlist::findOrFail($id);
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "discount" => $product->discount,
                "free_shipping" => $product->free_shipping,
                "shipping_flatrate" => $product->shipping_flatrate,
                "shipping_costrate" => $product->shipping_costrate,  "capture_image" => $product->capture_image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function remove_all(Request $request)
    {
        
            $cart = session()->get('cart');
            
            if(isset($cart)) {
                foreach($cart as $key => $cart_remove){
                    dd($cart_remove);
                    unset($cart_remove[$key]);
                }
            }
            session()->flash('success', 'Product removed successfully');

    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function orderdetail()
    {
        $detail = Order::where('customer_id',auth()->user()->id)->orderby('updated_at','desc')->get();
       
        
        return view('frontend.pages.orderdetail',compact('detail'));
    }
    public function ordercomplete()
    {
        
        return view('frontend.pages.ordercomplete');
    }
    public function track()
    {
        
        return view('frontend.pages.track');
    }
    public function checkout()
    {
        
        return view('frontend.pages.checkout');
    }
    public function checkout_post(Request $request){
        $model = new Order;
        $model->fill($request->all());
        if(auth()->user() && auth()->user()->id){
            $model->customer_id = auth()->user()->id;
        }
        $model->delivery_status = 'unpaid';
        $model->payment_status = 'Pending';
        $model->order_number = $this->next('order');
        
        $model->save();
        $this->increment('order');
        $total = 0;
        $shipping_rate = 0;
        $discount = 0;
        if(session('cart')){
            foreach(session('cart') as $id => $products){
                $total += $products['price'] * $products['quantity'];
                $discount += $products['discount'] * $products['quantity'];
                if($products['shipping_flatrate'] == 1){
                    $shipping_rate += $products['shipping_costrate'];
                }
                $order_items = new OrderItems;
                $order_items->product_id = $products["id"];
                $order_items->order_id = $model->id;
                $order_items->qty = $products["quantity"];
                $order_items->price = $products["price"];
                $order_items->discount = $products["discount"];
                $order_items->total = $products["price"] * $products["quantity"];
                $order_items->save();
            }

            $order_update = Order::findOrFail($model->id);
            $order_update->number_of_product = count(session('cart'));
            $order_update->subtotal = $total;
            $order_update->amount = $total - $discount - $shipping_rate;
            $order_update->save();
            
            \Session::forget('cart');
            return redirect('/');
        }

        return redirect()->back();
    }
    public function userlogin()
    {
        return view('frontend.pages.login');
      
    }
    public function userlogindata(Request $request)
    {
       
    $request->validate([
        'email' => 'required',
        'password' => 'required',

    ]);

    // $credentials = $request->only('email', 'password');
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_user' => 1])) {
        return redirect()->intended('user-dashboard')
                    ->withSuccess('Signed in');
    }

    return redirect("userlogin")->withSuccess('Login details are not valid');
    }
    public function register()
    {
  
      return view('frontend.pages.register');
    }
  
    public function registerstore(Request $request)
    {
       
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
  
        $seller = new Seller;
        $seller->first_name=$request->first_name;
        $seller->last_name=$request->last_name;
        $seller->phone=$request->phone;
        $seller->email=$request->email;
        $seller->save();

        $user = new User;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->is_user=1;
        $user->save();

  
        return redirect('login');
    }
    public function refund()
    {
  
      return view('frontend.pages.refund');
    }
  
    public function refundpost(Request $request)
    {
       
        $request->validate([
            'subject' => 'required',
            'desscription' => 'required',
            'image' => 'required',
        ]);
      
        
        $refund = new Refund;
        $refund->subject=$request->subject;
        $refund->desscription=$request->desscription;
        if($request->image != null){
            $imageName = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('refund'), $imageName);
            $refund->image = $imageName;
        }        
        
        $refund->save();

     
        return redirect('login');
    }

    public function next($key)
    {
        $found = $this->db()
            ->where('key', $key)
            ->first();

        if(!$found) {
            throw new Exception('No record for counter found');
        }
        return $found->prefix.$found->value;
    }

    public function increment($key)
    {
        $result = $this->db()
            ->where('key', $key)
            ->increment('value');

        if(!$result) {
            throw new Exception('Counter could not increment');
        }

        return $result;
    }

    /**
     * Get new database instance
     *
     * @return DB
     */
    protected function db()
    {
        return DB::table('counters');
    }
}
