<?php
$this->title = 'Аренда квартир - Главная страница';
?>
<div id="fb-root"></div>

<script>
     window.fbAsyncInit = function(){
FB.init({
    appId: '635535643206786',
    status: true,
    cookie: true,
    xfbml: true
}); 
};
(function(d, debug) {
	var js, id = 'facebook-jssdk',
	ref = d.getElementsByTagName('script')[0];
	if(d.getElementById(id)) {
		return;
	}
	js = d.createElement('script');
	 js.id = id;
	  js.async = true;
	  js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
	  ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
	  
function postToFeed(title, desc, url){
var obj = {
	method: 'feed',
	link: url,
	name: title,
	description: desc
};

FB.ui(
 {
  method: 'share',
  href: 'http://edge.esy.es'
}, function(response){});

function callback(response){}

}
    </script>


<a href="edge.esy.es" data-title="Article Title" data-desc="Some description for this article" class="btnShare">Share</a>
<script>
	$(document).ready(function(){
		$('.btnShare').click(function(event){
			event.preventDefault();
			elem = $(this);
			postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'));
			return false;
		});
	})
</script>

