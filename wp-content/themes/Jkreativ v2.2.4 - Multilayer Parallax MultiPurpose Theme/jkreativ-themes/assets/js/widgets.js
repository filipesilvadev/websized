(function($){
	$('document').ready(function(){
		
		var repositioning_block = function () {
			var woh = $(".widget-overlay-wrapper").height();
			var wh = $(window).height();
			$(".widget-overlay-wrapper").css({
				'top' : ( wh - woh ) / 2 
			});
		};
		
		var noduplicate = function(text){
			var duplicated = 0;
			$(".widget-content-wrapper li span").each(function(){
				var widgetname = $(this).text();				
				if(widgetname.toLowerCase() === text.toLowerCase()) {
					duplicated++;					
				}
			});
			
			return ( duplicated === 0 ) ? true : false;			
		};
		
		$(".widget-overlay .close").bind('click', function(){
			$(".widget-overlay").fadeOut();
		});
		
		$(".addwidgetconfirm").bind('click', function(){
			var text = $(".textwidgetconfirm").val();
			
			if(text !== '' && noduplicate(text)) {
				var template = "<li><span>" + text + "</span><input type='hidden' name='widgetlist[]' value='" + text + "'><div class='remove fa fa-ban'></div></li>";
				$(".widget-content-wrapper ul").append(template);
				$(".textwidgetconfirm").val('');
			}		
			
			// show list
			$(".widget-adding-content").hide();
			$(".widget-content-list").show();
		});
		
		$(".addwidget").bind('click', function(){
			$(".widget-adding-content").show();
			$(".widget-content-list").hide();
			$(".textwidgetconfirm").val('');
		});
		
		$(".widget-overlay").on('click', '.widget-content-wrapper .remove', function(){
			var element = this;
			var parent = $(this).parents('li');
			$(parent).fadeOut(function(){
				$(parent).remove();
			});
			
		});
		
		$(".sidebarwidget").bind('click', function(){
			$(".widget-overlay").fadeIn();
			
			if($(".widget-content-wrapper li").length === 0) {
				$(".widget-adding-content").show();
				$(".widget-content-list").hide();
			} else {
				$(".widget-adding-content").hide();
				$(".widget-content-list").show();
			}
			
			repositioning_block();
		});
		
		$(window).bind('resize', repositioning_block);
	});
})(jQuery);
