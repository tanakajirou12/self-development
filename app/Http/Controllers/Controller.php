<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
        $keyword = '';
    $response = null;

    $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706';
    
    // applicationIdの 'xxxxx....' は取得したアプリIDに書き換える
    $params = [
        'format' => 'json',
        'applicationId' => '1084521773457364307',
        'hits' => 15,
        'imageFlag' => 1
    ];
    if (array_key_exists('keyword', $_POST)) {
        $keyword = $_POST['keyword'];
        $response_json = execute_api($url, $params, $keyword);
        $response = json_decode($response_json);
        
        return view('welcome');
    }
    
    function execute_api($url, $params, $keyword) {
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query . '&keyword=' . $keyword;
        
        return file_get_contents($search_url);
    
    }
    }
}
