
    var error = false;
	
    $(document).ready(function() {
        
		var doc = $.browser.webkit ? $("body") : $("html");
		
		$(".menu li").has('> ul').addClass('parent');
		
		$(".search_trigger").click(function(){
			if($(this).hasClass('clear_mode')){
				$('#search').removeAttr('value');
				$(this).removeClass('clear_mode');
			}
			else {
				$(this).toggleClass('active');
				$('.search_bar').toggleClass('active');
				$('#search').removeAttr('value');
			}
		});
		
		$('#search').on('keyup click', function(press){
			if(press.which !== 27){
				if($(this).val().length > 0){
					$(".search_trigger").addClass('clear_mode');
				}
				else {
					$(".search_trigger").removeClass('clear_mode');
				}
			}
		});
		
		$("body").on('keydown click',  function(event){
			if(event.type == 'keydown' && event.which == 27){
				if($(".search_bar").hasClass('active')){
					$(".search_bar").removeClass('active');
					$(".search_trigger").removeClass('active clear_mode');
				}
			}
			if(event.type == 'click'){
				if(!$(event.target).is('.search_bar, .search_bar *, .search_trigger')){
					$(".search_bar").removeClass('active');
					$(".search_trigger").removeClass('active clear_mode');
				}
			}
		});
		
		
		$(".callback_button").click(function(){
			$(".callback_form").addClass('active');
			setTimeout(function(){$(".callback_intro").removeClass('visible')}, 800);
			return false;
		});
		
		$(".close_cover").click(function(){
			$(".callback_intro").addClass('active');
			
			setTimeout(function(){
				$(".callback_panel").removeClass('active')
				$(".callback_intro").addClass('visible')
			}, 1200);
			
			return false;
		});
		
		if($(".phone_input").length > 0){
			$(".phone_input").each(function(){
				$(this).mask({ mask: "+7 (999) 999-9999", clearEmpty: true });
			});
		};
		
		
        if($(".page404").length){
            $(".page404").css("height",window.innerHeight - $("#header").height() - 20);
        }
        
        $(".contact_button .button").click(function(){
			var anchor = $(this).attr('href');
			console.log(address);
			$(anchor).siblings().removeClass('active');
			$(anchor).addClass('active');
			
			$(".contact_button .button").removeClass('hidden');
			$(".contact_button .button[href="+anchor+"]").addClass('hidden');
			setTimeout(function(){
			 console.log(address[anchor.split("#")[1]].cord);
                ymaps.ready(function(){
                    var myMap = new ymaps.Map(anchor.split("#")[1], {
                        center: address[anchor.split("#")[1]].cord,
                        zoom: 16,
                        controls: []
                    });
                    myPlacemark = new ymaps.Placemark(address[anchor.split("#")[1]].cord, {}, {
                        iconLayout: 'default#image',
                        iconImageHref: '/bitrix/templates/antarn_tmp/images/map_icon.png',
                        iconImageSize: [50*.86,50],
                        iconImageOffset: [-25*.86,-50]
                    });
                    myMap.geoObjects.add(myPlacemark)
                });
			},300)
			return false;
		});
		$(".contact_map_block .close_button").click(function(){
			$(".contact_button .button").removeClass('hidden');
			$(".contact_map").removeClass('active');
			return false;
		});
        
		$(window).load(function(){
			
			$(".red_ban").parallax("100%", -0.5);
			
			if( $('.tables').length > 0){
				
				var tableTop = $('.tables').offset();
				
				$(window).scroll(function(){
					if(doc.scrollTop() >= (tableTop.top - 70) && doc.scrollTop() < (tableTop.top + $('.tables').outerHeight() - 135 - $('.table_head').outerHeight())){
						if(!$('.table_head').hasClass('fixed_table')){
							$('.table_head').addClass('fixed_table');
							$('.tables').css({paddingTop: $('.table_head').outerHeight()});
						}
					}
					else {
						if($('.table_head').hasClass('fixed_table')){
							$('.table_head').removeClass('fixed_table');
							$('.tables').css({paddingTop: 0});
						}
					}
				});
			}
		});
		
		if($(".content_slider .content_slide").length > 1){
			$(".content_slider").cycle({
				fx: 'scrollHorz',
				slides: '> .content_slide',
				prev: '.content_slider_wrap .prev_slide',
				next: '.content_slider_wrap .next_slide',
				timeout: 5000,
				speed: 300,
				pager: '.content_slider_wrap .slider_pager'
			});
			$('.content_slider_wrap .prev_slide, .content_slider_wrap .next_slide').css('visibility', 'visible');
		}
        var has_class = false;
        $(".text table").each(function(){
            has_class = false;
            $(this).parent("div").each(function(){
                if($(this).hasClass("tables") || $(this).hasClass("table")) 
                    has_class = true; 
            });
            if(!has_class)
                $(this).wrap("<div class=\"tables\"><div class=\"table\"></div></div>").css({
                    width : "100%"
                });
        });


        $("#callbak_form").submit(function(e){
            e.preventDefault();
            console.log(1);
            data = $("#callbak_form").serializeArray();
            req = $("#callbak_form").attr("data-req");
            for(k in data){
                reserv[data[k].name] = data[k].value;
                if(req.search(data[k].name) != -1 && !check_data({t : data[k].name, v : data[k].value}))
                    error = true;
                delete data[k];
            }
            if(!error){
                $.ajax({
                    type : 'POST',
                    url : '/bitrix/templates/antarn_tmp/post.php',
                    data : reserv,
                    success : function(data){
                        console.log(data);
                        $(".callback_cover").addClass('active');
                        yaCounter29195280.reachGoal('ЗАЯВКА');
                    }
                })
            }
            error = false;
            return false;
        });
	});
    var reserv = {};
	/*function formSubmit() {
        $("#callbak_form").submit();
	}*/
    function check_data(p){
        if(p.t == "PHONE")
            if(!(p.v).match(/^((\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/)) return false; 
        if(p.t == "NAME")
            if(!p.v.length) return false;
        return true;
    }
    var langset;
    function langch(){
        langset = get_cookie("antarn_lang");
        console.log(langset)
        if(!langset) langset = $(".curent_lang").text().toLowerCase();
        l='';
        switch(langset){
            case "ru":
               // set_cookie("antarn_lang","en");
                l='en';
                break;
            case "en":
              //  set_cookie("antarn_lang","ru");
                l='ru';
                break;
        }
        $.ajax({
            url : '/bitrix/templates/antarn_tmp/ajax/cache_var.php',
            type : 'POST',
            data : 'l='+l,
            success : function(data){
                var m=Math.floor(Math.random() * (100000));
                 document.location=window.location+'?'+m;
            }
        });
        //$(".curent_lang").text(langset);
        //$(".lang_list").html("<a onclick=\"langch()\">"+langset+"</a>");
       
    }
    /*Cookie*/
    function set_cookie(name, value){
        expires = new Date();
        expires.setTime(expires.getTime() + (1000 * 86400 * 365));
        document.cookie = name + "=" + escape(value) + "; expires=" + expires.toGMTString() +  "; path=/";
    }
    function get_cookie(name){
        cookie_name = name + "=";
        cookie_length = document.cookie.length;
        cookie_begin = 0;
        while (cookie_begin < cookie_length){
            value_begin = cookie_begin + cookie_name.length;
            if (document.cookie.substring(cookie_begin, value_begin) == cookie_name){
                var value_end = document.cookie.indexOf (";", value_begin);
                if (value_end == -1){
                    value_end = cookie_length;
                }
                return unescape(document.cookie.substring(value_begin, value_end));
            }
            cookie_begin = document.cookie.indexOf(" ", cookie_begin) + 1;
            if (cookie_begin == 0){
                break;
            }
        }
        return null;
    }
    /*------*/
	
