<?php

namespace Service\RSS;

class RSS
{
    /**
     * @var Channel
     */
    private $channel;

    /**
     * @var Array
     */
    private $tweets;

    /**
     * @return Channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param Channel $channel
     * @return RSS
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return Array
     */
    public function getTweets()
    {
        return $this->tweets;
    }

    /**
     * @param Array $tweets
     * @return RSS
     */
    public function setTweets(Array $tweets)
    {
        $this->tweets = $tweets;
        return $this;
    }

    public function addTweet(Tweet $tweet)
    {
        $this->tweets[] = $tweet;
        return $this;
    }

    public function parseTimeline($timeline)
    {
        foreach ($timeline as $tweet) {
            $item = new Tweet();
            $item->setId($tweet->id)
                ->setTitle($tweet->text)
                ->setDescription($tweet->text)
                ->setPubDate($tweet->created_at)
                ->setPlace($tweet->place)
                ->setUsername($tweet->user->screen_name)
                ->setUserId($tweet->user->id)
            ;
            $this->addTweet($item);
        }
    }

    /**
     * @return string
     */
    public function toXML()
    {
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:georss="http://www.georss.org/georss" xmlns:twitter="http://api.twitter.com" version="2.0">'  . PHP_EOL;
        $xml .=     "\t<channel>" . PHP_EOL;
        $xml .= $this->getChannel()
            ->toXML();

        foreach ($this->tweets as $tweet) {
            $xml .= "\t\t<item>" . PHP_EOL;
            $xml .= $tweet->toXML();
            $xml .= "\t\t</item>" . PHP_EOL;
        }
        $xml .=     "\t</channel>" . PHP_EOL;
        $xml .= '</rss>';

        return $xml;
    }
}
