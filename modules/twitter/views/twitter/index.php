<style>
body {
	background: #FFF;
}
.navbar-collapse, .navbar-header {
	opacity: 0;
}

.footer {
	display: none;
}

.twitter-wrap {
	width: 960px;
	min-height: 600px;
	height: auto;
	margin: 0 auto; 
}

.twitter-wrap h1 {
	font-size: 18px;
	margin-top: 40px;
	margin-bottom: 40px;
}

.user {
	height: 36px;
	line-height: 36px;
	border: 1px solid #CCC;
	border-radius: 3px;
	padding: 0 10px;
	width: 300px;
	color: #333;
	vertical-align: top;
}

button[type="submit"] {
	display: inline-block;
	padding: 0 16px;
	margin-left: 10px;
	height: 36px;
	line-height: 36px;
	vertical-align: top;
	background: deepskyblue;
	color: #FFF;
	border-style: none;
	border-radius: 3px;
}

h2 {
	font-size: 17px;
}

.error-message {
	margin-top: 20px;
	font-size: 14px;
}
</style>
<div class="twitter-wrap">
<h1>Get list of followers by Twitter user screen name:</h1>
<form id="twitter-form" method="post">
	<input id="user_id" class="user" type="text" />
	<button type="submit">Get list</button>
</form>
<p class="error-message"></p>
<h2 class="list-header"></h2>
<div class="user-list"></div>
</div>

<script>
$(document).ready(function(){
	$('#twitter-form').on('submit', function(ev){
		ev.preventDefault();
		$userId = $('#user_id').val();
		
		
		$.ajax({
			url: '/twitter/twitter/get',
            type: 'POST',
            data: {
            	id: $userId
            },
            cache: false,
            dataType: 'json',
            success: function(data)
            {
            	$('.error-message').empty();
            	$('.list-header').empty();
            	$('.user-list').empty();
            	
            	if(data.responseType == 'error') {
            		$('.error-message').html(data.errorMessage);
            	} else {
            		
            		$list = data.followers;
            		
            		console.log($($list).size());
            		
            		if($($list).size() == 0) {
            			$('.list-header').html('There is no followers');
            		} else {
            			$('.list-header').html('Here are followers:');
            			
            			$.each($list, function(index, value){
            				$('.user-list').append('<p>' + value + '</p>');
            			});
            			
            		}
            		
            		
            		
            	}
				
				
            }
        });
	});
});
</script>