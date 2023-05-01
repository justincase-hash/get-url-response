<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $url = NULL;
        $url_response = NULL;
        $url_response_inverted = NULL;
        return view('home',compact('url', 'url_response', 'url_response_inverted'));
    }

    public function submit(Request $request)
    {   
        $url = $request->url;
        $url_response = NULL;
        $url_response_inverted = NULL;

        if(!empty($url)) {
            $query_str = parse_url($url, PHP_URL_QUERY);
            parse_str($query_str, $query_params);

            if($query_params) {
                $url_response = json_encode($query_params);

                $inverted = [];
                foreach($query_params as $key => $value) {
                    $inverted[] = [ strrev($key) => strrev($value)];
                } 
                
                $url_response_inverted = json_encode(array_reverse($inverted));

            } else {
                $url_response = $url_response_inverted = "No Query Found In Your URL";
            }
           
        }
        return view('home',compact('url', 'url_response', 'url_response_inverted'));
    }
}
