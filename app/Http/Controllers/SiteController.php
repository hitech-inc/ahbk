<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Backend\Contact;
use App\Models\Backend\Gallery;
use App\Models\Backend\About;
use App\Models\Backend\Background;
use App\Models\TechnicalEquipment;
use App\Models\Backend\Certificate;
use App\Models\Backend\textBlocks;
use App\Mail\Callback;
use Mail;

class SiteController extends Controller
{
    //
    public function index()
    {
      $text = textBlocks::render('main.text');
      $textAbout = textBlocks::render('about.text');
      //dd($block);
    	return view('frontend.index', compact('text', 'textAbout'));
    }

    public function about()
    {
      $background = Background::where('url', 'about')->first();
      $abouts = About::all();
    	return view('frontend.about', compact('abouts', 'background'));
    }

    public function technical()
    {
      $background = Background::where('url', 'technical-equipment')->first();
      $techEquipments = TechnicalEquipment::get();
      
    	return view('frontend.technical-equipment', compact('background', 'techEquipments'));
    }

    public function certificates()
    {
      $certificates = Certificate::all();

    	return view('frontend.certificates', compact('certificates'));
    }

    public function products( $categories = "", $child = "" )
    {
    	//products index page
    	if ( !$categories )
    	{
        $textProd = textBlocks::render('products.text');
        $background = Background::where('url', 'products')->first();
    		$categories = Category::withDepth()->having('depth', '=', 0)->get();
    		//dd($categories);
    		return view('frontend.products', compact('categories', 'background', 'textProd'));
    	}
    	//category page
    	else if ( $categories && !$child )
    	{
        $background = Background::where('url', 'category')->first();
    		$categories = Category::whereSlug($categories)->first();
    		if (!$categories) return redirect('/products');
    		$children = $categories->children;
    		//dd($children);
    		return view('frontend.category', compact('categories', 'children', 'background'));
    	}
    	//child page
    	else if ( $categories && $child )
    	{
        //Категория для хлебных крошек
        $category = Category::whereSlug( $categories )->first();
    		
        $background = Background::where('url', 'product')->first();
        $categories = Category::whereSlug( $child )->first();
        
    		if ( !$categories ) return redirect( '/products' );
        
    		return view( 'frontend.product', compact('categories', 'category', 'background') );
    	}
    }

    public function galleries()
    {
      $galleries = Gallery::all();
    	return view('frontend.galleries', compact('galleries'));
    }

    public function contacts()
    {
      $contacts = Contact::all();

    	return view('frontend.contacts', compact('contacts'));
    }

    public function callback( Request $request )
    {
      $data = [
        'name' => $request->name,
        'company' => $request->company,
        'phone' => $request->phone,
        'email' => $request->email,
        'text' => $request->text
      ];

      //$success = '';
      //dd($data);
      Mail::to(env('MAIL_TO'))->send( new Callback( $data ) );
      return 1;
    }
}
