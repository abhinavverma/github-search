<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class GithubTrending extends Controller
{
    public function index(Request $request)
    {
    	try {
	    	$q = "user:laravel";
	    	if ($request->isMethod('post')) {
	    		$stype = $request->stype;
	    		$keyword = $request->keyword;
	    		switch ($stype) {
	    			case 'Name':
	    			case 'Owner':
	    				$q = "user:$keyword";
	    			break;

	    			case 'Stars':
	    				$q = "stars:$keyword";
	    			break;
	    			
	    			default:
	    				$q = "user:$keyword";
	    			break;
	    		}
	    	}
	    	$client = new Client();
			$url = 'https://api.github.com/search/repositories';
			$res = $client->request(
								'GET', 
								$url, 
								[
									'query' => 
									[
										'q' => $q,
										'sort' => "stars"
									],
									['debug' => true]
								]
							);
			$statusCode = $res->getStatusCode();
			$res = json_decode($res->getBody()->getContents());
			$fin = [];
			foreach($res->items as $key => $value){
				$results = new \stdClass();
				$results->name = $value->name;
				$results->description = $value->description;
				$results->stars = $value->stargazers_count;
				$fin[] = $results;
			}

	    	return view('welcome', ['res' => $fin]);
	    }catch(\Exception $e){
			\Log::error($e);
			abort(404);
			return $e->getMessage();
		}
    }
}
