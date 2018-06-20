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
use App;

class SiteController extends Controller
{
    // Передаю в функцию параметр языка, по умолчанию русский
    public function index($lang = "ru")
    {
        // Вызываю функцию setLang что бы определить язык, передаю в него параметр lang, т.е. текущий язык
      self::setLang( $lang );
      $text = textBlocks::render('main.text');
      $textAbout = textBlocks::render('about.text');
      $lang = session('lang');
      //dd($lang);
        return view('frontend.index', compact('text', 'textAbout'))->with('lang', $lang);
    }

    public function about()
    {
        // Вызываю функцию определения языка передаю в нее сессию, и в ней переменную lang в которой будет находится определение языка
        self::setLang( session('lang') );
        $background = Background::where('url', 'about')->first();
        //$abouts = About::all();
        $abouts = About::all();
        $lang = session('lang');

        return view('frontend.about', compact('abouts', 'background'))->with('lang', $lang);
    }

    public function technical()
    {
      self::setLang( session('lang') );
      $background = Background::where('url', 'technical-equipment')->first();
      $techEquipments = TechnicalEquipment::get();
      $lang = session('lang');
      //dd($lang);
      return view('frontend.technical-equipment', compact('background', 'techEquipments', 'textBlock'))->with('lang', $lang);
    }

    public function certificates()
    {
        self::setLang( session('lang') );
        $certificates = Certificate::all();

        return view('frontend.certificates', compact('certificates'));
    }

    public function products( $categories = "", $child = "" )
    {

        //products index page
        if ( !$categories )
        {
            self::setLang( session('lang') );
            $textProd = textBlocks::render('products.text');

            $background = Background::where('url', 'products')->first();
                $categories = Category::withDepth()->having('depth', '=', 0)->get();
            $lang = session('lang');
            //dd($categories);
            return view('frontend.products', compact('categories', 'background', 'textProd'))->with('lang', $lang);
        }

        //category page
        else if ( $categories && !$child )
        {
            self::setLang( session('lang') );
            $background = Background::where('url', 'category')->first();
            $categories = Category::whereSlug($categories)->first();
            if (!$categories) return redirect('/products');
            $children = $categories->children;
            //dd($children);
            $lang = session('lang');
            //dd($l);
            // Если children не пустой
            if(!$children->isEmpty())
            {
                
                return view('frontend.category', compact('categories', 'children', 'background'))->with('lang', $lang);
            }

            else 
            {
                return view('frontend.category', compact('categories', 'children', 'background'))->with('lang', $lang);
            }
            
        }

        //child page
        else if ( $categories && $child )
        {
            self::setLang( session('lang') );
            //Категория для хлебных крошек
            $category = Category::whereSlug( $categories )->first();
            
            $background = Background::where('url', 'product')->first();
            $categories = Category::whereSlug( $child )->first();
            $lang = session('lang');
            //dd($lang);
            if ( !$categories ) return redirect( '/products' );
        
            return view( 'frontend.product', compact('categories', 'category', 'background') )->with('lang', $lang);
        }
    }

    public function galleries()
    {
        self::setLang( session('lang') );
        $galleries = Gallery::all();
        return view('frontend.galleries', compact('galleries'));
    }

    public function contacts()
    {
      self::setLang( session('lang') );
      $lang = session('lang');
      $contacts = Contact::all();

        return view('frontend.contacts', compact('contacts'))->with('lang', $lang);
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

    // Localization здесь создается сессия языка
    public function setLang( $language )
    {
        App::setLocale( $language );
        session(['lang' => $language]);
        $lang = session('lang');
        //return self::index();
    }
}
