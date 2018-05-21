<!DOCTYPE HTML>
<html lang="ru">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112536242-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112536242-1');
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/bitrix/cache/css/s1/ahbk/kernel_main/kernel_main.css?151689290126919" type="text/css"  rel="stylesheet" />
<link href="/bitrix/cache/css/s1/ahbk/template_e09673e266596228105bd81bfefa93a7_2852939192b3d33a9b5ecc4c07dfd3cc.css?15168906637159" type="text/css"  data-template-style="true"  rel="stylesheet" />
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/lightbox.min.css">
<link rel="stylesheet" href="/css/jquery.sweet-modal.min.css">

<script type="text/javascript">if(!window.BX)window.BX={message:function(mess){if(typeof mess=='object') for(var i in mess) BX.message[i]=mess[i]; return true;}};</script>
<script type="text/javascript">(window.BX||top.BX).message({'JS_CORE_LOADING':'Загрузка...','JS_CORE_NO_DATA':'- Нет данных -','JS_CORE_WINDOW_CLOSE':'Закрыть','JS_CORE_WINDOW_EXPAND':'Развернуть','JS_CORE_WINDOW_NARROW':'Свернуть в окно','JS_CORE_WINDOW_SAVE':'Сохранить','JS_CORE_WINDOW_CANCEL':'Отменить','JS_CORE_H':'ч','JS_CORE_M':'м','JS_CORE_S':'с','JSADM_AI_HIDE_EXTRA':'Скрыть лишние','JSADM_AI_ALL_NOTIF':'Показать все','JSADM_AUTH_REQ':'Требуется авторизация!','JS_CORE_WINDOW_AUTH':'Войти','JS_CORE_IMAGE_FULL':'Полный размер'});</script>
<script type="text/javascript">(window.BX||top.BX).message({'LANGUAGE_ID':'ru','FORMAT_DATE':'DD.MM.YYYY','FORMAT_DATETIME':'DD.MM.YYYY HH:MI:SS','COOKIE_PREFIX':'BITRIX_SM','USER_ID':'','SERVER_TIME':'1524550175','SERVER_TZ_OFFSET':'10800','USER_TZ_OFFSET':'0','USER_TZ_AUTO':'Y','bitrix_sessid':'935a6e77794da21ed5a24ca8fdd10d61','SITE_ID':'s1'});</script>


<script type="text/javascript" src="/bitrix/cache/js/s1/ahbk/kernel_main/kernel_main.js?1516950795279549"></script>
<script type="text/javascript">BX.setCSSList(['/bitrix/js/main/core/css/core.css','/bitrix/js/main/core/css/core_popup.css']); </script>
<script type="text/javascript">BX.setJSList(['/bitrix/js/main/core/core.js','/bitrix/js/main/core/core_ajax.js','/bitrix/js/main/session.js','/bitrix/js/main/core/core_popup.js','/bitrix/js/main/core/core_window.js','/bitrix/js/main/utils.js']); </script>

<script type="text/javascript">
bxSession.Expand(1440, '935a6e77794da21ed5a24ca8fdd10d61', false, 'a6521468cc4f3e94b48a289a2d017902');
</script>

<script type="text/javascript" src="/bitrix/cache/js/s1/ahbk/template_f81d7bdd9492508c6ed548c5f47c5e81_9a5623929b15357c2c96f6950552b217.js?15168906631372"></script>
 
    <meta charset="utf-8" />
	<meta name="Keywords" content="" />
	<meta name="Description" content="" />

	<title>АХБК</title>
	
	<link rel="icon" href="/bitrix/templates/ahbk/images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="/css/styles.css">
    <!--
    <link href="//test.ahbk.kz/bitrix/templates/ahbk/css/primitive.css?14199033737887" type="text/css" rel="stylesheet" />
    <link href="//test.ahbk.kz/bitrix/templates/ahbk/css/uggla_style.css?1419914582813" type="text/css" rel="stylesheet" />
    -->
	<link href="/bitrix/templates/ahbk/css/style.css?v=1" type="text/css" rel="stylesheet" />
    
    <script type="text/javascript" src="/bitrix/templates/ahbk/js/jquery.v1.11.0.js?1421171305103587"></script>
	<script type="text/javascript" src="/bitrix/templates/ahbk/js/jquery.cycle2.js?142117130122577"></script>
	<script type="text/javascript" src="/bitrix/templates/ahbk/js/slider.js?14210490494268"></script>
	<script type="text/javascript" src="/bitrix/templates/ahbk/js/jquery.mask.js?142117130213116"></script>
	<script type="text/javascript" src="/bitrix/templates/ahbk/js/jquery.parallax-1.1.3.js?14211713041770"></script>
	<script type="text/javascript" src="/bitrix/templates/ahbk/js/jquery.mobile-events.min.js?142117130314629"></script>
	<script type="text/javascript" src="/bitrix/templates/ahbk/js/scripts.js?v=56"></script>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
</head>
<body>
 
  <header id="header">   
     @include('frontend.partials._header')
  </header>

  @yield('content')

  <div id="footer">
    @include('frontend.partials._footer')
  </div>
  
  <script src="/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      var video = $("#video");
    });
  </script>
  <script src="/js/lightbox.min.js"></script>
  <script src="/js/jquery.sweet-modal.min.js"></script>

  <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $('form').on('submit', function(e){

          data = $(this).serialize();
          //console.log(data);
          url = $(this).attr('action');
          //console.log(url);
          $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function(data){
              //console.log(data);
              $.sweetModal({
                content: 'Сообщение успешно отравлено.',
                icon: $.sweetModal.ICON_SUCCESS
              });
            }
          });
          e.preventDefault();
        });
    </script>
</body>  
    