<?php
namespace Word;
use Word\Func\WordTurnHtml;

class action {
    private $path;

    public function handle() {
        if (!file_exists($this->path)) {
            return 'File not found';
        }
        return WordTurnHtml::setHtml($this->path);
    }

    public function setPath($path) {
        $this->path = $path;
    }
}


