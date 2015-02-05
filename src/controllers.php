<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})
->bind('homepage')
;

$app->get('/{username}', function ($username) use ($app) {
    $timeline = $app['tweets_repository']->findTimelineByUsername($username);
    $channel  = new \Service\RSS\Channel();
    $channel->setTitle("Twitter timeline / {$username}")
        ->setLink("https://twitter.com/{$username}")
        ->setDescription("Twitter timeline feed from {$username}")
        ->setLanguage('en')
        ->setTtl(40)
    ;
    $rss = $app['rss_service']->getRSS($channel, $timeline);

    $response = new Response();
    $response->setContent($rss);
    $response->setStatusCode(Response::HTTP_OK);
    $response->headers->set('Content-Type', 'text/plain');

    return $response;
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
