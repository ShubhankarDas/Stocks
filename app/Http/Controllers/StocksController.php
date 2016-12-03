<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StocksController extends Controller
{

    private $url = "https://www.nseindia.com/live_market/dynaContent/live_watch/stock_watch/niftyStockWatch.json";
    private $imageUrl = "https://www.nseindia.com/images/sparks/";
    private $yearImageUrl = "https://www.nseindia.com/images/sparks/monthly/";
    private $date_time="null";

    public function index(){
        $data = array();
        $filtered = $this->parseJson();
        foreach($filtered as $d){
            $temp = array();
            $temp["symbol"] = $d["symbol"];
            $temp["ltP"] = $d["ltP"];
            $temp["open"] = $d["open"];
            $temp["high"] = $d["high"];
            $temp["low"] = $d["low"];
            if(strcmp($d["low"],$d["open"]) == 0){
                $temp["trend"] = "UP";
            }elseif(strcmp($d["high"],$d["open"]) == 0){
                $temp["trend"] = "DOWN";
            }
            $temp["image_details"]= $this->getImageDetailes($d["symbol"]);
            array_push($data,$temp);
        }
        return response()->json($this->setJson($data));
    }

    public function show($id){

        $id = strtolower($id);

        if((strcmp($id,"up")==0)||(strcmp($id,"down")==0)){

            $data = array();
            $filtered = $this->parseJson();

            foreach($filtered as $d){
                if((strcmp($d["low"],$d["open"])== 0) && (strcmp($id,"up")== 0)){
                    $temp = array();
                    $temp["symbol"] = $d["symbol"];
                    $temp["ltP"] = $d["ltP"];
                    $temp["open"] = $d["open"];
                    $temp["high"] = $d["high"];
                    $temp["low"] = $d["low"];
                    $temp["trend"] = "UP";
                    $temp["image_details"]= $this->getImageDetailes($d["symbol"]);
                    array_push($data,$temp);
                }
                elseif((strcmp($d["high"],$d["open"])== 0) && (strcmp($id,"down")==0)){
                    $temp = array();
                    $temp["symbol"] = $d["symbol"];
                    $temp["ltP"] = $d["ltP"];
                    $temp["open"] = $d["open"];
                    $temp["high"] = $d["high"];
                    $temp["low"] = $d["low"];
                    $temp["trend"] = "DOWN";
                    $temp["image_details"]= $this->getImageDetailes($d["symbol"]);
                    array_push($data,$temp);
                }
            }
            return response()->json($this->setJson($data));
        }
        else{
            return response()->json($this->setJson(null));
        }
    }

    public function setJson($data){
        $response = array();
        if($data != null ){
            $response["status"] = 200;
            $response["time"] = $this->date_time;
            $response["data"] = $data;
        }
        else{
            $response["status"] = 400;
            $response["data"] = "No Data Found";
        }
        return $response;
    }

    private function parseJson(){

        $res = $this->getCurlResult($this->url);

        $json = json_decode($res, true);
        $data = $json["data"];
        $this->date_time = $json["time"];
        return $data;
    }

    private function getCurlResult($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Fedora; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36');
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    private function getImageDetailes($name){
        $imageDetails = array();

        $created_url = $this->imageUrl . $name . ".png";
        $create_year_url = $this->yearImageUrl . $name . "M.png";

        $imageDetails["todaysAngle"] = $this->calculateImageDetails($created_url);
        $imageDetails["30DaysAngle"] = $this->calculateImageDetails($create_year_url);

        return $imageDetails;
    }

    private function calculateImageDetails($res){
        $res = $this->getCurlResult($res);

        //(0,0) being the left top cornerof the graph
        $im = imagecreatefromstring($res);

        $imageStartX = -1;
        $imageStartY = 0;

        for($x=0;$x<20;$x++){
          if($imageStartX== -1){
            for($y=0;$y<20;$y++){
                $startPoint = $rgb = imagecolorat($im, $x, $y);
                $colors = imagecolorsforindex($im, $rgb);
                if($colors["red"] < 130){
                    $imageStartY = $y;
                    $imageStartX = $x;
                    break;
                }
            }
          }else{break;}
        }


        $imageEndX = -1;
        $imageEndY = 0;

        for($x=59;$x>30;$x--){
            if($imageEndX == -1){
                for($y=0;$y<20;$y++){
                    $startPoint = $rgb = imagecolorat($im, $x, $y);
                    $colors = imagecolorsforindex($im, $rgb);
                    if($colors["red"] < 130){
                        $imageEndX = $x;
                        $imageEndY = $y;
                        break;
                    }
                }
            }else{
                break;
            }
        }
        $imageDetails = array();

        $b = $imageEndX;
        $h = $imageStartY - $imageEndY;

        return $this->getAngle($b,$h);
    }

    private function getAngle($b,$h){
        $degree = atan($h/$b);
        return round(rad2deg($degree), 2);
    }

}
