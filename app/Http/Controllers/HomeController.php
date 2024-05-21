<?php

namespace App\Http\Controllers;
use App\Models\PageModel;
use App\Models\SliderModel;
use App\Models\PartnerModel;
use App\Models\CategoryModel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home()
   {
      $getPage = PageModel::getSlug('home');
      $data['getPage']= 
      $getPage;
     
$data['getSlider']=SliderModel::getRecordActive();
$data['getPartner']=PartnerModel::getRecordActive();
$data['getCategory']=CategoryModel::getRecordActiveHome();


      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('home',$data);
   }
   public function contact()
   {
      $getPage = PageModel::getSlug('contact');
      $data['getPage']= 
      $getPage;
     
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;
    return view('page.contact',$data);
   }
   public function about()
   {
      $getPage = PageModel::getSlug('about');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.about',$data);
   }

  
   public function privacy_policy()
   {
      $getPage = PageModel::getSlug('privacy_policy');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.privacy_policy',$data);
   }

   public function money_back()
   {
      $getPage = PageModel::getSlug('money_back');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;
    return view('page.money_back',$data);
   }

   public function terms_condition()
   {
      $getPage = PageModel::getSlug('terms_condition');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.terms_condition',$data);
   }

   public function help()
   {
      $getPage = PageModel::getSlug('help');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.help',$data);
   }


   public function return()
   {
      $getPage = PageModel::getSlug('return');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.return',$data);
   }

   public function payment_method()
   {
      $getPage = PageModel::getSlug('payment_method');
      $data['getPage']= 
      $getPage;
      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] =  $getPage->meta_description;
      $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.payment_method',$data);
   }

   public function faq()
   {
      $getPage = PageModel::getSlug('faq');
      $data['getPage']= 
      $getPage;
    $data['meta_title'] = $getPage->meta_title;
    $data['meta_description'] =  $getPage->meta_description;
    $data['meta_keywords'] =  $getPage->meta_keywords;

    return view('page.faq',$data);
   }
   
}
