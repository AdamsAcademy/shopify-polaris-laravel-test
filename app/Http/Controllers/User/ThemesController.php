<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Shopify\Objects\Theme;
use Auth;

class ThemesController extends Controller
{
    function get_themes(Request $request){
        $theme = new Theme(Auth::User()->shop_name,Auth::User()->shopify_token);
        
        $themes = $theme->all();
        $result_themes = [];
        foreach($themes as $index=>$theme_){
            $result_themes[$index] = [
                "label" => $theme_->name,
                "value" => $theme_->id
            ];
        }
        return [
            "themes" => $result_themes
        ];
    }
    //
}
