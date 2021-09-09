<?php
namespace Word\Func;

use PhpOffice\PhpWord\IOFactory;

class WordTurnHtml {

    public static function setHtml($path) {
        $word = IOFactory::load($path);
        $html = IOFactory::createWriter($word, "HTML");
        $html->save('./text.html');
        return $html;
    }

}