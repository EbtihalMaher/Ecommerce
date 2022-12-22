<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\PurchaseTransaction;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $purchaseTransactions = PurchaseTransaction::with('product')->get();
        return view('dashboard.purchaseTransactions.purchaseTransaction')->with('purchaseTransactions', $purchaseTransactions);

    }
      public function report($id)
    {
               $purchaseTransactions = PurchaseTransaction::with('product')->get();
               $count=0;
               $price=0;

           foreach ($purchaseTransactions as $purchaseTransaction) {
            if ( $purchaseTransaction->productId == $id) {

                $count += 1;
                $price += $purchaseTransaction->price;
            }

           
        }
       
        return view('dashboard.purchaseTransactions.report')->with('count', $count)->with('price',$price);


    }

}
