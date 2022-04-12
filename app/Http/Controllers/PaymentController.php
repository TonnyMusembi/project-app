<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class PaymentController extends Controller
{
    //
    public function  index()
    {
        return Payment::all();
     //return response()->json(['$data']);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->errors()]);
        }
        else {

            Payment::create([
                'transaction_id' => $request->input('transaction_id'),
                'amount' => $request->input('amount'),
            ]);
        }
        return response()->json(['req' => $request]);
    }
    public function destroy(Payment $payement){

       $payement->delete();
        //return response()->json('$data');
    }
    public function update(Request $request){

        return response()->json(['$data']);
    }
}
