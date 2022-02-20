<?php
require_once "vendor/autoload.php";

use Liquid\Liquid;
use Liquid\Template;
use Liquid\Cache\Local;

Liquid::set('INCLUDE_SUFFIX', '');
Liquid::set('INCLUDE_PREFIX', '');
Liquid::set('INCLUDE_ALLOW_EXT', true);
Liquid::set('ESCAPE_BY_DEFAULT', true);

$template = new Template(__DIR__.'/templates/');
$input = "Hello, {% include 'honorific.html' %}{{ plain-html | raw }} {{ comment-with-xss }}";
$template->parse($input);
$template->setCache(new Local());

echo $template->render([
    'name' => 'Maxi',
    'plain-html' => '<b>Your comment was:</b>',
    'comment-with-xss' => '<script>alert();</script>',
]);
