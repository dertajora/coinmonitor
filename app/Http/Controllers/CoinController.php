<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CoinController extends Controller
{
    public function __construct(){
        
    }
    
    public function default(){
        
        $api_url = "https://api2.bitcoin.co.id/api/webdata/XLMIDR";
        $curl = curl_init();
        
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, $api_url); 
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       
        $response = curl_exec($curl);
       
        $result = json_decode($response, true);
        
        $selected_coin = array("stridr", "xrpidr", "wavesidr", "btcidr", "ethidr", "nxtidr" );
        $coin_name = array("stridr" => "Stellar", 
                           "xrpidr" => "Ripple", 
                           "wavesidr" => "Waves", 
                           "btcidr" => "Bitcoin", 
                           "ethidr" => "Ethereum",
                           "nxtidr" => "Nxt" );
        $i = 0;
        foreach ($result['prices'] as $row => $value) {
            if (in_array($row, $selected_coin)) {
                $data_bitcoin[$i]['price_now'] = $value;
                $data_bitcoin[$i]['name'] = $coin_name[$row];
                $i+=1;
            }
            
        }

        $i = 0;
        foreach ($result['prices_24h'] as $row => $value) {
            if (in_array($row, $selected_coin)) {
                $data_bitcoin[$i]['price_24h'] = $value;
                $data_bitcoin[$i]['percentage'] = $this->CalculatePercentage($data_bitcoin[$i]['price_now'],$data_bitcoin[$i]['price_24h']);
                $i+=1;
            }
        }

        
        // get data from coinmarketcap
        $array_coin = ["stellar", "ripple", "bitcoin", "waves", "ethereum", "nxt"];
        for ($i=0; $i < count($array_coin); $i++) { 
            $data_coinmarketcap[$i] = $this->GetDataFromCoinmarketcap($array_coin[$i]);
        }

        // sort multidimensional array. Read here https://laravel.com/docs/5.4/helpers#method-array-sort
        $data_bitcoin = array_values(array_sort($data_bitcoin, function ($value) {
            return $value['name'];
        }));

        $data_coinmarketcap = array_values(array_sort($data_coinmarketcap, function ($value) {
            return $value['name'];
        }));


        $data['bitcoin'] = $data_bitcoin ;
        $data['coinmarketcap'] = $data_coinmarketcap ;
        
        return view('content.coin')->with('data',$data);
    }

    function querySort ($x, $y) {
        return strcasecmp($x['name'], $y['name']);
    }

    

    public function chart() {

        $coin_name = array("stridr" => "Stellar", 
                           "xrpidr" => "Ripple", 
                           "wavesidr" => "Waves", 
                           "btcidr" => "Bitcoin", 
                           "ethidr" => "Ethereum",
                           "nxtidr" => "Nxt" );

        return view('content.chart')->with('data',$coin_name);
    }

    /**
     * The name and signature of the console command.
     *
     * @var coin is a coin name for API url
     */
    public function GetDataFromCoinmarketcap($coin){
        $client = new Client(); //substitution of GuzzleHttp/Client
        
        // get data from Coinmarketcap API
        $response = $client->get('https://api.coinmarketcap.com/v1/ticker/'.$coin);
        $dataBody = $response->getBody();
        $dataContent = json_decode($dataBody->getContents());
        // define data
        $data['price_idr'] = $dataContent[0]->price_usd * 13500;
        $data['price_usd'] = $dataContent[0]->price_usd;
        $data['percent_change_1h'] = $dataContent[0]->percent_change_1h ." %";
        $data['percent_change_24h'] = $dataContent[0]->percent_change_24h ." %";
        $data['name'] = $dataContent[0]->name;

        return $data;
    }

    /**
     * The name and signature of the console command.
     *
     * @var price_now is a current_price of coin
     * @var price_now is a last saved price of coin in 24h before
     */
    public function CalculatePercentage($price_now, $last_price){
        $difference = $price_now - $last_price;
        if ($difference < 0) {
            $difference = round(abs($difference)/$last_price,2) * 100;
            $result = "- ".$difference." %";
        }else{
            $result = round($difference/$last_price * 100,2)." %";
        }
        return $result;
    }

}
    
