<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\ColorModel;
use App\Models\OrderItemModel;
use Illuminate\Http\Request;
use Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
class PaymentController extends Controller
{

    public function checkout(Request $request)
    {
$data['meta_title'] = 'checkout';
$data['meta_description'] = '';
$data['meta_keywords']= '';



        return view('payment.checkout',$data);
    }



    public function view_cart(Request $request)
    {
$data['meta_title'] = 'Cart';
$data['meta_description'] = '';
$data['meta_keywords']= '';



        return view('payment.cart',$data);
    }
    public function cart_delete($id)
    {
Cart::remove($id);

        return redirect()->back();
    }


    

    public function add_to_cart(Request $request)
    {
        $getProduct = ProductModel::getSingle($request->product_id);
        $total = $getProduct->price;

$color_id= $request->color_id ;

Cart::add([
    'id'=>$getProduct->id,
    'name'=>'Product',
    'price'=>$total,
    'quantity'=>$request->qty,
    'attributes'=>array(
        'color_id'=>$color_id,
    )
    ]);

    return redirect()->back();  
    
    }


public function update_cart(Request $request)
{
    foreach($request->cart as $cart)
    {
        Cart::update($cart['id'],array(
            'quantity' => array(
                'relative' => false,
                'value' => $cart['qty']
            ),
        ));
    }
    return redirect()->back();
}

public function placeorder(Request $request)
{
    $order = new OrderModel();
    $order->firstname = trim($request->firstname);
    $order->lastname = trim($request->lastname);
    $order->town = trim($request->town);
    $order->address = trim($request->address);
    $order->state = trim($request->state);
    $order->postcode = trim($request->postcode);
    $order->phone = trim($request->phone);
    $order->email = trim($request->email);
    $order->payment_method = trim($request->payment_method);
    $order->save();

    foreach (Cart::getContent() as $cart) {
        $orderItem = new OrderItemModel();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $cart->id;
        $orderItem->quantity = $cart->quantity;
        $orderItem->price = $cart->price;
        $color_id = $cart->attributes->color_id;

        if (!empty($color_id)) {
            $getColor = ColorModel::getSingle($color_id);
            $orderItem->color_name = $getColor->name;
        }

        $orderItem->total_price = $cart->price * $cart->quantity;
        $order->total_amount=$orderItem->total_price;
        $order->save();
        $orderItem->save();
    }

    // Clear the cart after placing the order


    // Redirect to the payment function
    return redirect()->route('checkout_payment', ['order_id' => base64_encode($order->id)]);
}
public function checkout_payment(Request $request)
{
    $order_id = base64_decode($request->order_id);
    $getOrder = OrderModel::find($order_id);

    if ($getOrder) {
        if ($getOrder->payment_method == 'cash') {
            $getOrder->is_payment = 1;
            $getOrder->save();
            Cart::clear();
            return redirect('/cart')->with('success', "Order Placed");
        } elseif ($getOrder->payment_method == 'stripe') {
         

Stripe::setApiKey(env('STRIPE_SECRET'));
$finalprice = $getOrder->total_amount * 100;

$session = \Stripe\Checkout\Session::create([
    'customer_email'=>$getOrder->email,
    'payment_method_types'=>['card'],
    'line_items'=>[[
        'price_data' =>[
            'currency' => 'usd','product_data'=>[
                'name'=>'HarvestOfHeart',
            ],
            'unit_amount'=>intval($finalprice),
        ],
        'quantity'=>1,

    ]],
    'mode'=>'payment',
    'success_url'=>url('stripe/payment-success'),
    'cancel_url'=>url('checkout'),
    ]);

    $getOrder->stripe_session_id = $session['id'];
    $getOrder->is_payment = 1;
    $getOrder->save();
    Cart::clear();
   
    
$data['session_id']=$session['id'];
Session::put('stripe_session_id',$session['id']);
$data['setPublickey']=env('STRIPE_KEY');

return redirect()->away($session->url);
//view('stripe_payment',$data);



        
        } else {
            abort(404);
        }
    } else {
        abort(404);
    }
}

public function processStripePayment(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $order = OrderModel::find(base64_decode($request->order_id));

    if (!$order) {
        abort(404);
    }

    try {
        $charge = Charge::create([
            'amount' => $order->total * 100, // Stripe accepts amounts in cents
            'currency' => 'usd',
            'description' => 'Order ID: ' . $order->id,
            'source' => $request->stripeToken,
        ]);

        $order->is_payment = 1;
        $order->save();
        Cart::clear();

        return redirect('/cart')->with('success', "Payment Successful, Order Placed");
    } catch (\Exception $e) {
        return redirect('/checkout')->with('error', $e->getMessage());
    }
}



public function index()
{

}

public function success()
{
return view('stripe_payment');
}


}





