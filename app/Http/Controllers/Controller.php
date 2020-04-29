<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function apiSearch($title)
    {
        
        //$title = '';
        $response = null;
    
        $url = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';
        
        // applicationIdの 'xxxxx....' は取得したアプリIDに書き換える
        $params = [
            'format' => 'json',
            'applicationId' => '1080315934315089119',
            //'hits' => 15,
            //'imageFlag' => 1
        ];
    
    
    
        //if (array_key_exists('title', $_GET)) {
            //$keyword = $_POST['keyword'];
            $response_json = $this->execute_api($url, $params, $title);
            $response = json_decode($response_json);
            
            
        //}
        
        
        return $response;
    
    }
    function execute_api($url, $params, $title) {
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query . '&title=' . $title;
        
        return file_get_contents($search_url);
    
    }
    
    
    
    public function counts($user) {
        $count_developments = $user->developments()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();

        return [
            'count_developments' => $count_developments,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
        ];
    }
}
