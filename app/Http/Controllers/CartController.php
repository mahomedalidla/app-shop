<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save();

    	$notificationP = 'Tu pedido está en siendo procesado. Te enviaremos un correo para el segimiento de la orden. :)';

    	return back()->with(compact('notificationP'));
    }
}
