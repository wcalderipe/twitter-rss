<?php

namespace Service\RSS;

use Symfony\Component\Serializer;

class Tweet implements RSSComponentInterface
{
	const TWEET_URL = "https://twitter.com/%s/status/%s";

	private $username;

	private $userId;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $pubDate;

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $source;

	/**
	 * @var string
	 */
	private $place;

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return Tweet
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Tweet
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPubDate()
	{
		return $this->pubDate;
	}

	/**
	 * @param string $pubDate
	 * @return Tweet
	 */
	public function setPubDate($pubDate)
	{
		$this->pubDate = $pubDate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return Tweet
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * @param string $source
	 * @return Tweet
	 */
	public function setSource($source)
	{
		$this->source = $source;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPlace()
	{
		return $this->place;
	}

	/**
	 * @param string $place
	 * @return Tweet
	 */
	public function setPlace($place)
	{
		$this->place = $place;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 * @return Tweet
	 */
	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->userId;
	}

	/**
	 * @param mixed $userId
	 * @return Tweet
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
		return $this;
	}

	public function getUrl()
	{
		return sprintf(
			self::TWEET_URL,
			$this->getUsername(),
			$this->getId()
		);
	}

	/**
	 * @return string
	 */
	public function toXML()
	{
		$xml  = "\t\t\t<title>![CDATA[{$this->getTitle()}]]</title>" . PHP_EOL;
		$xml .= "\t\t\t<description>![CDATA[{$this->getDescription()}]]</description>" . PHP_EOL;
		$xml .= "\t\t\t<pubDate>{$this->getPubDate()}</pubDate>" . PHP_EOL;
		$xml .= "\t\t\t<guid>{$this->getUrl()}</guid>" . PHP_EOL;
		$xml .= "\t\t\t<link>{$this->getUrl()}</link>" . PHP_EOL;
		$xml .= "\t\t\t<twitter:source/>" . PHP_EOL;
		$xml .= "\t\t\t<twitter:place/>" . PHP_EOL;

		return $xml;
	}
}