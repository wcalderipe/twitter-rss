<?php

namespace Repository;

use Abraham\TwitterOAuth\TwitterOAuth;

class TweetsRepository {
	
	private $twitter;

	public function __construct(TwitterOAuth $twitter)
	{
		$this->twitter = $twitter;
	}

	public function findTimelineByUsername($username) 
	{
		$timeline = $this->twitter->get(
			'/statuses/user_timeline',
			array(
				'screen_name' => $username,
				'count' => 15 // number of timeline items
			)
		);

		return $timeline;
	}
}