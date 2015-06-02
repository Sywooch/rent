<?php
namespace app\modules\twitter\controllers;

use Yii;
use yii\web\Controller;
use Twitter\TwitterOAuth;
use PayPal\Api\Amount;

class TwitterController extends Controller {
	
	public $enableCsrfValidation = false;
	
	
	private $consumerKey = 'F6kRFXqNJhPgKmnt4fcjygQsV';
	private $consumerSecret = 'xPxDF2IL5HWyecP55hQzuboSmcJh7RJsDySjBn12frKRsS0UNA';
	private $oAuthToken = '211458005-QahgXfXjLZnJdQol2EwV0lnaaaCFeqjqp9byOC1C';
	private $oAuthTokenSecret = 'wG9hxfKS4GhobPdzEII3KttrxwYqfT57mn8NjYo6fAjNS';
	
	/*
	private $consumerKey = 'Xmxr5l2W7CdTIJfBlCgm45DQF';
	private $consumerSecret = '8rlFkuQFExIwylLZToUmr6v65xWkKwD3cF1ThB2yyZViNgD28F';
	private $oAuthToken = '211458005-i6hHHapkf61I7hn7noXE4HyB5fCplGj1ds4zx8CD';
	private $oAuthTokenSecret = 'toOsmZ1qs4FunCOac4RuMJPDn5NEK2y3wSNRzHXhHzYCG';
	*/
	private $twitteroauth;
	
	private $nextCursor = -1;
	
	private $followers = [];
	
	private $error = null;
	
	public function actionIndex() {
		
		return $this->render('index');
	}
	
	public function actionGet() {
		
		$request = Yii::$app->request;
		if($request->isPost) :
			
			$this->twitteroauth = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->oAuthToken, $this->oAuthTokenSecret);
			
			
			$id = $request->post()['id'];
			
			$cursor = null;
			$i = 0;
			
			while (/*$this->nextCursor != 0*/ $i < 1) {
				
				$this->call($id, $this->nextCursor);
				$i++;
			}
			
			$response = [];
			
			if ($this->error) {
				$response['responseType'] = 'error';
				$response['errorMessage'] = $this->error;
			} else {
				$response['responseType'] = 'success';
				$response['followers'] = $this->followers;
			}
			
			
			
			return json_encode($response);
			
		endif;
		
	}
	
	protected function call($id, $cursor) {
			
		$options = [
			'screen_name' => $id,
			'count' => 40
		];
		
		if($cursor != -1) $options['cursor'] = $cursor;
		
		$data = $this->twitteroauth->get('followers/list', $options);
		
		if(isset($data->users)) {
			
			$this->nextCursor = $data->next_cursor_str;
			$users = $data->users;
			
			//var_dump($this->nextCursor);
			
			if(!empty($users)) :
				
				foreach($users as $user) :
					array_push($this->followers, $user->name);
				endforeach;
			
			endif;
			
		} elseif(isset($data->errors)) {
			
				$this->error = $data->errors[0]->message;
			}
	}
	
	
	
	
	
	
	
}