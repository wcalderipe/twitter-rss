<?php
/**
 * Created by PhpStorm.
 * User: wcalderipe
 * Date: 2/4/15
 * Time: 10:30 PM
 */

namespace Service\RSS;


class Service {

    public function getRSS(Channel $channel, Array $timeline)
    {
        $rss = new RSS();
        $rss->setChannel($channel)
            ->parseTimeline($timeline);

        return $rss->toXML();
    }
}