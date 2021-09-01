<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MpesaController extends Controller
{
    
    public function generatesAccessToken(){

        $consumer_key ="fh2l6z71gLpg8W4GBBdwgIsEOdxxEKdL";
        $consumer_secret = "cqKAML1jUBJmGvbA";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
        $curl_response = curl_exec($curl);
  
        $access_token = json_decode($curl_response);

        return $access_token->access_token;
     }

     public function STKPush(){

/*        
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer Rhxk6LGLQJLLAjVGjHRpQTnUDhUP',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
    {
    "BusinessShortCode": 174379,
    "Password": "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjEwODI5MTU1MzUw",
    "Timestamp": Carbon::rawParse('now')->('YmdHms'),
    "TransactionType": "CustomerPayBillOnline",
    "Amount": 1,
    "PartyA": 254728705035,
    "PartyB": 174379,
    "PhoneNumber": 254728705035,
    "CallBackURL": "http://5720-41-212-58-12.ngrok.io/memontagram/",
    "AccountReference": "Mementogram",
    "TransactionDesc": "Memontogram Hiquip" 
  });
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response     = curl_exec($ch);
curl_close($ch);
return $response;*/
        //Cart
       // $cart = \Cart::session(auth()->id());

        
        //Credentials
         $BusinessShortCode = 174379;
          $passkey ='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
       // $timestamp = (new \DateTime())->format("YmdHis");
       $timestamp= Carbon::rawParse('now')->format('YmdHms');
        $password = base64_encode($BusinessShortCode.$passkey.$timestamp);

        //
        $Amount= 2000;
       // $Amount= $cart->getTotal();
        $PartyA = 254722864073;
        $PartyB = 174379;


        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generatesAccessToken())); //setting custom header
        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => $BusinessShortCode,
          'Password' => $password,
          'Timestamp' => $timestamp,
          'TransactionType' => 'CustomerPayBillOnline',
          'Amount' => $Amount,
          'PartyA' => $PartyA,
          'PartyB' => $PartyB,
          'PhoneNumber' => $PartyA,
          'CallBackURL' => 'http://34f3-41-212-58-12.ngrok.io/memontagram/',
          "AccountReference"=> "Mementogram",
         "TransactionDesc"=> "Memontogram Hiquip" 
        );
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response = curl_exec($curl);
        
        
        return $curl_response;
     }


}
