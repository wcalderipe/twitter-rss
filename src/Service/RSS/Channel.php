<?php

namespace Service\RSS;

class Channel implements RSSComponentInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $ttl;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Channel
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Channel
     */
    public function setLink($link)
    {
        $this->link = $link;
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
     * @return Channel
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Channel
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param string $ttl
     * @return Channel
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    public function toXML()
    {
        $xml  = "\t\t<title>{$this->getTitle()}</title>" . PHP_EOL;
        $xml .= "\t\t<description>{$this->getDescription()}</description>" . PHP_EOL;
        $xml .= "\t\t<link>{$this->getLink()}</link>" . PHP_EOL;
        $xml .= "\t\t<language>{$this->getLanguage()}</language>" . PHP_EOL;
        $xml .= "\t\t<ttl>{$this->getTtl()}</ttl>" . PHP_EOL;

        return $xml;
    }
}