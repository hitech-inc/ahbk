<div class="center">
    <div class="footer_navs clear">
      <div class="footer_nav">
        <div class="nav_title">@lang('a.about')</div>
        <ul>

            <li>
                <a href="/about/technical-equipment">@lang('a.technical-equipment')</a>
            </li>

            <li>
                <a href="/about/certificates">@lang('a.certificates')</a>
            </li>

        </ul></div>                       
        <div class="footer_nav">
            <div class="nav_title">@lang('a.products')</div>    
            <ul>
                @foreach (App\Models\Category::getCategories() as $category)
                @if($loop->index < 4)
                <li>
                    <a href="{{ url('/products/' . $category['category']->slug) }}">
                        @if (session('lang') == 'ru')
                            {{$category['category']->title}}
                        @else
                             {{$category['category']->title_kz}} 
                        @endif       
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>                       
        <div class="footer_nav">
          <div class="nav_title"></div>
          <ul>
            <ul></ul>
            <br>
            @foreach( App\Models\Category::getCategories() as $category )
                @if( $loop->index > 3 )
                <li>
                  <a href="{{ url('/products/' . $category['category']->slug) }}">
                    @if (session('lang') == 'ru')
                        {{ $category['category']->title }}
                    @else
                        {{ $category['category']->title_kz }}
                    @endif    
                    </a>
                </li> 
                @endif
            @endforeach
          </ul>
        </div>                        
        <div class="footer_nav">
                <div class="nav_title">@lang('a.contacts')</div>
                <ul>
                @foreach( App\Models\Backend\Contact::getContacts() as $contact )
                    @if( $loop->index == 0 )
                        <li>
                        @if (session('lang') == 'ru')
                            <a style="color: #999999">{{ $contact->address }}</a>
                        @else
                            <a style="color: #999999">{{ $contact->address_kz }}</a>
                        @endif
                        </li>                        
                        <li> 
                            <a style="color: #999999">{{ $contact->phone }}</a>
                        </li>                        
                        <li>
                            <a style="color: #999999">{{ $contact->email }}</a>
                        </li>
                    @endif
                @endforeach
              </ul>
            </div>      
          </div>
            <div class="footer clear">
                <div style="text-align:center;">
                    <!-- <a href="#">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a> -->
                </div>
                <br>
<!-- <div style="text-align:center;">
<a href="#">СОГЛАШЕНИЕ ОБ ОБРАБОТКЕ ПЕРСОНАЛЬНЫХ ДАННЫХ</a>
</div> -->
<div class="footer_logo">
    <a href="/"><img src="/img/logo/logo002.png" alt="AHBK logo" style="max-width: 100%; margin-top: -10px;"></a>
</div>
<div class="copyright">
    © 2018 AHBK.kz
</div>
<div class="developer">
    @lang('a.copyrignt')  – <a target="_blank" href="http://qaz-tech.kz">Hitech</a>
</div>
</div>
</div>
    <!-- center -->