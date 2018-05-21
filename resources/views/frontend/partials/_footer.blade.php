<div class="center">
    <div class="footer_navs clear">
      <div class="footer_nav">
        <div class="nav_title">О компании</div>
        <ul>

            <li>
                <a href="/about/technical-equipment">Техническое оснащение</a>
            </li>

            <li>
                <a href="/about/certificates">Сертификаты</a>
            </li>

        </ul></div>                       
        <div class="footer_nav">
            <div class="nav_title">Продукция</div>    
            <ul>
                @foreach (App\Models\Category::getCategories() as $category)
                @if($loop->index < 4)
                <li>
                    <a href="{{ url('/products/' . $category['category']->slug) }}">{{$category['category']->title}}</a>
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
              <a href="{{ url('/products/' . $category['category']->slug) }}">{{ $category['category']->title }}</a>
            </li> 
            @endif
            @endforeach
          </ul>
        </div>                        
        <div class="footer_nav">
                <div class="nav_title">Контакты</div>
                <ul>
                  @foreach( App\Models\Backend\Contact::getContacts() as $contact )
                  @if( $loop->index == 0 )
                  <li>

                    <a style="color: #999999">{{ $contact->address }}</a>
                </li>                        <li> 

                    <a style="color: #999999">{{ $contact->phone }}</a>
                </li>                        <li>

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
    <a href="/"><img src="" alt="">Logo</a>
</div>
<div class="copyright">
    © 2018 AHBK.kz
</div>
<div class="developer">
    Разработано в  – <a target="_blank" href="http://qaz-tech.kz">Hitech</a>
</div>
</div>
</div>
    <!-- center -->