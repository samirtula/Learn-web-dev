<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use classes\Parser;

$page = Parser::curlGetPage("https://www.sport-express.ru/boxing/reviews/");
$html = str_get_html($page);
$pageNums = $html->find('.se-material-list-page__nav', 0)->getAttribute('data-prop-max-page');

for ($i = 1; $i <= $pageNums; $i++) {
    $referrer = 'https://google.com';
    if ($i > 1) $referrer = 'https://www.sport-express.ru/boxing/reviews/page' . ($i - 1) . '/';
    $page = Parser::curlGetPage("https://www.sport-express.ru/boxing/reviews/page{$i}/", $referrer);
    if ($i > 1)
    $html = str_get_html($page);
    foreach ($html->find('.se-press-list-page__item') as $element) {
        $img = $element->find('.se-material__content-media img', 0);
        $link = $element->find('.se-press-list-page__item-material-title a', 0);
        $post = [
            'img' => $img->src,
            'title' => $link->innertext,
            'link' => $link->href,
        ];
    }
    usleep(1000000);
}
