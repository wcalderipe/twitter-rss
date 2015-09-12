<?php

namespace Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Yaml\Parser;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterProvider implements ServiceProviderInterface 
{
	private $connection;

	public function register(Container $app)
	{
		$config = $this->getTwitterConfig();
		$this->setConnection($config);
		$app['TwitterProvider'] = $this->getConnection();
	}

	private function getTwitterConfig()
	{
		$yaml = new Parser();
		return $yaml->parse(
			file_get_contents(__DIR__ . '/../../config/twitter.yml')
		);
	}

	private function setConnection($config) 
	{
		$this->connection = new TwitterOAuth(
			$config['Twitter']['consumer_key'],
			$config['Twitter']['consumer_secret'],
			$config['Twitter']['access_token'],
			$config['Twitter']['access_token_secret']
		);
	}

	public function getConnection()
	{
		return $this->connection;	
	}

	public function boot(Container $app)
	{
	}
}
