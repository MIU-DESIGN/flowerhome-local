function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
var viewport = updateViewportDimensions();


var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();


var timeToWaitForLast = 100;


function loadGravatars() {
  viewport = updateViewportDimensions();
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
}


jQuery(document).ready(function($) {

  loadGravatars();

	// スムーススクロールを実装
	$(function(){
  	$('a[href^="#"]').click(function(){
    	var speed = 500;
    	var href= $(this).attr("href");
    	var target = $(href == "#" || href == "" ? 'html' : href);
    	var position = target.offset().top;
    	$("html, body").animate({scrollTop:position}, speed, "swing");
    	return false;
  	});
	});

	//スクロールしたらヘッダーにクラス追加
	$(function () {
  var headerBar = $('header');
  	$(window).scroll(function () {
    	hsize = $('header').height();
    	if ($(this).scrollTop() > hsize) {
      	headerBar.addClass('header-scroll');
				$("#nav-open").addClass("header-scroll");
    	} else {
      	headerBar.removeClass('header-scroll');
				$("#nav-open").removeClass("header-scroll");
    	}
  	});
	});

	//ハンバーガーメニューのクラス切り替え
	$("#nav-open").click(function(){
  	$(this).toggleClass("active");
	});

	$("#nav-close").click(function(){
  	$("#nav-open").removeClass("active");
	});

	/* ハンバーガーメニュー内のリンクをクリックでメニューを閉じる */
	jQuery('#nav-content a[href]').on('click', function(event) {
		jQuery('#nav-open').trigger('click');
	});

}); /* end of as page load scripts */

// フェードインアニメーション
window.onload = function() {
	scroll_effect();

	jQuery(window).scroll(function(){
	 scroll_effect();
	});

	function scroll_effect(){
	 jQuery('.fadein').each(function(){
		var elemPos = jQuery(this).offset().top;
		var scroll = jQuery(window).scrollTop();
		var windowHeight = jQuery(window).height();
		if (scroll > elemPos - windowHeight + 0){
		 jQuery(this).addClass('scrollin');
		}
	 });
	}
};

// TOPへ戻るボタン
jQuery(function(){
  var pagetop = jQuery('#page_top');
  // ボタン非表示
  pagetop.hide();
  // 100px スクロールしたらボタン表示
  jQuery(window).scroll(function () {
     if (jQuery(this).scrollTop() > 100) {
          pagetop.fadeIn();
     } else {
          pagetop.fadeOut();
     }
  });
  pagetop.click(function () {
     jQuery('body, html').animate({ scrollTop: 0 }, 500);
     return false;
  });
});
