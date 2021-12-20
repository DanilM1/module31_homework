<?php

$tag = 'meta';
$attribute = 'name';
$names = ['title', 'description', 'keywords'];

$doc = new DOMDocument();
$doc->loadHTMLFile('page.html');

$xpath = new DOMXPath($doc);

foreach ($names as &$name) {
    foreach ($xpath->query('//'.$tag.'[contains(attribute::'.$attribute.', "'.$name.'")]') as $e) {
        $e->parentNode->removeChild($e);
    }
}
echo $doc->saveHTML();

?>