<?php

use App\Models\MainCatagory;
use App\Models\Setting;
use App\Models\Social;
use App\Models\SubCatagory;

function sitemaps() {
   return MainCatagory::with([
    'subcategories'
   ])->get();
}


function setting(){
    return Setting::first();
}

function socialLink(){
    return Social::get();
}
