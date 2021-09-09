<?php
namespace Word;

use Word\Func\WordTurnHtml;

class action {
    private $path;

    public function handle() {
        if (!file_exists($this->path)) {
            return 'File not found';
        }
        $file_info = mime_content_type($this->path);
//        die($file_info);
        return WordTurnHtml::setHtml($this->path);
    }

    public function setPath($path) {
        $this->path = $path;
    }
}


