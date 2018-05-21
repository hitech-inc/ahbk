	
	
	
	$(document).ready(function(){
	
		$('.slider').before($('.slider').clone().removeClass('staticSlider').addClass('mainSlider'));
		$('.mainSlider').find(".slider_pager, .prev_slide, .next_slide").remove();
		
		$('.slider').each(function(){
			if($(this).find('li.activeSlide').length < 1){
				$(this).find('li:first').addClass('activeSlide');
			}
		});
		
		if($(".slider").length > 0){
			if($(".mainSlider li").length > 1){
			
				$('.slider .prev_slide').css('visibility', 'visible');
				$('.slider .next_slide').css('visibility', 'visible');
				
				$(".slider .slider_pager").each(function(){
					var slidesLength = $(this).closest('.slider').find('li').length;
					for(var i = 0; i < slidesLength; i++){
						$(this).prepend('<span></span>');
					}
				});
				
				$(".staticSlider .next_slide").click(function(){
					if(click){
						clearInterval(inter);
						goTo('next');
						cycleRun();
					}
					return false;
				});
				$(".staticSlider .prev_slide").click(function(){
					if(click){
						clearInterval(inter);
						goTo('prev');
						cycleRun();
					}
					return false;
				});
				
				if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$('.slider').swipeleft(function(){
						if(click){
							clearInterval(inter);
							goTo('next');
							cycleRun();
						}
					});
					$('.slider').swiperight(function(){
						if(click){
							clearInterval(inter);
							goTo('prev');
							cycleRun();
						}
					});
				}
				
				cycleRun();
				pagerFunction();
			}
		};
		
		$(".staticSlider .slider_pager span").click(function(){
			var curInd = $(this).index();
			if(click){
				clearInterval(inter);
				goTo(curInd);
				cycleRun();
			}
		});
		
	});
	
	var activeSlide = $(".mainSlider li.activeSlide").index();
	var prevSlide = activeSlide;
	var nextSlide;
	var inter;
	var click = true;
	
	function goTo(goSlide){
		
		activeSlide = $(".mainSlider li.activeSlide").index();
		prevSlide = activeSlide;
		nextSlide;
		
		click = false;
		
		switch(goSlide){
			case 'next':
				nextSlide = activeSlide + 1;
				if(activeSlide == ($(".mainSlider li").length - 1)){
					activeSlide = 0;
					prevSlide = $(".mainSlider li").length - 1;
					nextSlide = activeSlide;
				}
				$(".slider li.activeSlide").removeClass('activeSlide');
				
				$(".slider").each(function(){
					$(this).find("li:eq("+prevSlide+")").addClass('rightPrev');
					$(this).find("li:eq("+nextSlide+")").addClass('activeSlide rightNext');
				});
			break;
			
			case 'prev':
				
				nextSlide = activeSlide - 1;
				
				if(activeSlide == 0){
					activeSlide = $(".mainSlider li").length - 1;
					prevSlide = 0;
					nextSlide = activeSlide;
				}
				
				$(".slider li.activeSlide").removeClass('activeSlide');
				
				$(".slider").each(function(){
					$(this).find("li:eq("+prevSlide+")").addClass('leftPrev');
					$(this).find("li:eq("+nextSlide+")").addClass('activeSlide leftNext');
				});
				click = false;
				
			break;
			
			default:
			if(goSlide > activeSlide){
				$(".slider li.activeSlide").removeClass('activeSlide');
				$(".slider").each(function(){
					$(this).find("li:eq("+activeSlide+")").addClass('rightPrev');
					$(this).find("li:eq("+goSlide+")").addClass('activeSlide rightNext');
				});
			}
			else {
				$(".slider li.activeSlide").removeClass('activeSlide');
				
				$(".slider").each(function(){
					$(this).find("li:eq("+activeSlide+")").addClass('leftPrev');
					$(this).find("li:eq("+goSlide+")").addClass('activeSlide leftNext');
				});
				
			}
			break;
		}
		
		pagerFunction();
		
		setTimeout(function(){
			$('.slider li').removeClass('rightPrev rightNext leftPrev leftNext');
			click = true;
		}, 800);
		
	};
	
	function cycleRun(){
		inter = setInterval(function(){
			goTo('next');
		}, 5000);
	}
	
	function pagerFunction(){
		var actPager = $(".mainSlider li.activeSlide").index();
		$('.staticSlider .slider_pager span').removeClass('cycle-pager-active');
		$('.staticSlider .slider_pager span:eq('+actPager+')').addClass('cycle-pager-active');
	}
