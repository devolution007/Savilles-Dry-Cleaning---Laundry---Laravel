<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
      
        $sections = Section::has('services')->with('icon','tags')->take(4)->get();
        // dd($sections);
        
        $options = array(
            'googlemaps_free_apikey' => 'AIzaSyC4WoFgtt7XWR2pYlgcxXMdlSHyaOwjc6c',       // Google API Key
            'google_maps_review_cid' => 'ChIJO1V8IJrfdUgRcMtbDvagFcg', // Google Placec ID of the Business
            'google_reviews_sorting' => 'most_relevant',  // reviews are sorted by relevance (default), or in chronological order (most_relevant/newest)
            'cache_data_xdays_local' => 2,       // every x day the reviews are loaded from google (save API traffic)
            'your_language_for_tran' => 'en',     // give you language for auto translate reviews
            'show_not_more_than_max' => 5,        // (0-5) only show first x reviews
            'show_only_if_with_text' => false,    // true = show only reviews that have text
            'show_only_if_greater_x' => 0,        // (0-4) only show reviews with more than x stars
            'sort_reviews_by_a_data' => 'rating', // sort by 'time' or by 'rating' (newest/best first)
            'show_cname_as_headline' => true,     // true = show customer name as headline
            'show_stars_in_headline' => true,     // true = show customer stars after name in headline
            'show_author_avatar_img' => true,     // true = show the author avatar image (rounded)
            'show_blank_star_till_5' => true,     // false = don't show always 5 stars e.g. ⭐⭐⭐☆☆
            'show_txt_of_the_review' => true,     // true = show the text of each review
            'show_author_of_reviews' => true,     // true = show the author of each review
            'show_age_of_the_review' => true,     // true = show the age of each review
            'dateformat_for_the_age' => 'Y.m.d',  // see https://www.php.net/manual/en/datetime.format.php
            'show_rule_after_review' => true,     // false = don't show <hr> Tag after each review (and before first)
            'add_schemaorg_metadata' => true,     // add schemo.org data to loop back your rating to SERP
        );
        // $reviews =  $this->getReviews($options);

        $reviews = array();
        
        return view('index',compact('sections','reviews'));
    }

    function getReviews($option) {
          $url = 'https://maps.googleapis.com/maps/api/place/details/json?place_id='.$option['google_maps_review_cid'].'&reviews_sort='.$option['google_reviews_sorting'].'&key='.$option['googlemaps_free_apikey'];
          if (function_exists('curl_version')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if ( isset($option['your_language_for_tran']) and !empty($option['your_language_for_tran']) ) {
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: '.$option['your_language_for_tran']));
            }
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
          } else {
            $arrContextOptions=array(
              'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
              ),
              'http' => array(
                'method' => 'GET',
                'header' => 'Accept-language: '.$option['your_language_for_tran']."\r\n" .
                "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36\r\n"
              )
            );  
            $result = file_get_contents($url, false, stream_context_create($arrContextOptions));
          }
          $fp = fopen('reviews.json', 'w');
          fwrite($fp, $result);
          fclose($fp);
        // }
        $data  = json_decode($result, true);

        $reviews = $data['result']['reviews'];
       
        return $reviews;
      }

    function forgot_password(){
        return view('forgot_password');        
    }  
}
