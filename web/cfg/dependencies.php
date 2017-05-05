<?php

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['trans'] = function ($c) {
    $t = \wblib\wbLang::getInstance();
    $t->addFile($c->get('settings')['lang'],$c->get('settings')['translations_path']);
    return $t;
};

$container['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        include $c->get('settings')['template_path'].'/error.tpl';
        return $c['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write($err);
    };
};

$container['route_name'] = 'main';