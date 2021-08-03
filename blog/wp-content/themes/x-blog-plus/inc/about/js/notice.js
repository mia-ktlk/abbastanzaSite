;(function($){
	$(document).ready(function(){
		$('.eye-notice .btnend').on('click',function(){
			var url = new URL(location.href);
			url.searchParams.append('xpnotice',1);
			location.href= url;
		});
	});
})(jQuery);