<div class="center clear">
 <div class="header" style="height: 75px;">
   <a href="/" class="logo" style="padding: 3px; cursor: pointer;">
    <img src="/img/logo/logo002.png" alt="AHBK logo" style="max-width: 100%">
</a>
<div class="menu">
    <ul>

        <li>
            <a  href="/about">@lang('a.about')</a>
            <ul>
                <li>
                    <div class="link_wrap">
                        <a href="/about/technical-equipment">@lang('a.technical-equipment')</a>
                    </div>
                </li>
                <li>
                    <div class="link_wrap">
                        <a href="/about/certificates">@lang('a.certificates')</a>
                    </div>
                </li>
                 <!--                                    <li>
                <div class="link_wrap">
                    <a href="#">Новости</a>
                </div>
            </li> -->
        </ul>
    </li>                        
    {{--<li>
        <a  href="/products">@lang('a.products')</a>
        <ul>
            <li>
                <div class="link_wrap">
                    <a href="#">Спецодежда</a>
                </div>
                <ul>
                    <li>
                        <div class="link_wrap">
                            <a href="/products/specialist-clothes/specialist-clothes-for-industrial-production">Спецодежда для промышленных производств</a>
                        </div>
                    </li>
                    <li>
                        <div class="link_wrap">
                            <a href="#">Спецодежда для государственных учереждений</a>
                        </div>
                    </li>
                    <li>
                        <div class="link_wrap">
                            <a href="#">Спецодежда для частных компаний</a>
                        </div>
                    </li>

                </ul>
            </li>                        
            <li>
                <div class="link_wrap"> 
                    <a href="#">Военное обмундирование</a>
                </div>
            </li>                        <li>
                <div class="link_wrap">
                    <a href="#">Форма для охранных компаний</a>
                </div>
            </li>                        <li>
                <div class="link_wrap">
                    <a href="#">Форма для медецинских учереждений</a>
                </div>
            </li>                        <li>
                <div class="link_wrap">
                    <a href="#">Форма для обслуживающего персонала</a>
                </div></li>                        <li>
                    <div class="link_wrap">
                        <a href="#">Корпоративная одежда</a>
                    </div>
                </li>                        
                <li>
                    <div class="link_wrap">
                        <a href="#">Школьная форма</a>
                    </div>
                </li>                        <li>
                    <div class="link_wrap">
                        <a href="#">Домашний текстиль</a>
                    </div></li>   
                </ul>
            </li>--}}
            <!-- test menu -->
            <li>
                <a  href="/products">@lang('a.products')</a>
                <ul>
                        @foreach ( App\Models\Category::getCategories() as $category )
                        <li>
                            <!-- ($category['children']) ? 'link_wrap' : '' это запись логическая проверка, если у категории есть дети то вставляем класс link_wrap, иначе пустая строка. Класс link_wrap выставит стрелку подкатегориям -->
                            <div class="{{ ($category['children']) ? 'link_wrap' : '' }}">
                                <a href="{{ url('products/' . $category['category']->slug) }}">
                                    @if(session('lang') == 'ru')
                                        {{ $category['category']->title }}
                                    @else 
                                        {{ $category['category']->title_kz }}
                                    @endif     
                                </a>  
                            </div>
                            <!-- children -->
                            <!-- Функция isset проверит если есть объект $category и его свойство children существует то код ниже сработает  -->
                            @if(isset($category['children']))
                            <ul>
                                <!-- Пробегаюсь циклом по массиву category и по его свойству children, делаю временные перменные $slug=>$child, для вывода slug родителя и для вывода title ребенка, потому что в моделе мы получили через ассоцивный массив коллекцию категорий и массив детей -->
                                @foreach($category['children'] as $slug=>$child)

                                <li>
                                    <div class="link_wrap">
                                        <!-- Обращаемся к массиву $category и в нем к ключу category и в нем свойство slug, таким образом выводим slug родительской категории у которой parent_id null. $child это title подкатегории. $category['category']->slug это запись означает что мы обращаемся к объекту $category текущего цикла, и в нем обращаемся к массиву category и далее в его свойство slug. -->
                                        <a href="{{ url('products/' . $category['category']->slug . '/' . $slug) }}">
                                            @if (session('lang') == 'ru')
                                                {{ $child }}
                                            @else
                                                {{ $child }}
                                            @endif    

                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            <!-- end children -->
                        </li>

                        @endforeach         
                </ul>
            </li>
            <!-- end test menu -->

            <li>
                <a  href="/galleries">@lang('a.galleries')</a>
            </li>
            <li>
                <a  href="/contacts">@lang('a.contacts')</a>
            </li>
            <li class="header_num">
              +7 702 500 66 05
          </li>
      </ul>
  </div>
  <label for="search" class="search_trigger"></label>
  <div class="search_bar">
    <form action="/search/index.php">
       <input type="text" name="q" placeholder="поиск по сайту" id="search" />
       <input name="s" type="submit" value="Поиск" /></td>
   </form> 

</div>
<div class="language">
   <div class="curent_lang"><a href="/lang/ru">ru</a></div>
   <div class="pointer lang_list">
    <a href="/lang/kz">kz</a>
  </div>
</div>
</div><!-- header -->
	</div><!-- center -->