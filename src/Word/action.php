<?php
namespace Word;

use PhpOffice\PhpWord\IOFactory;

class action {
    private $load_path;

    private $file;

    public function __construct() {
        $this->setFileName();
    }

    protected $error = [
        10001 => 'File not found',
        10002 => 'Wrong file format',
    ];

    protected $mineType = [
        'application/zip',
    ];

    public function handle() {
        $check = $this->check();
        if ($check) {
            return $this->error[$check];
        }
        $word = IOFactory::load($this->load_path);
        $html = IOFactory::createWriter($word, "HTML");
        $html->save($this->file);
    }

    /**
     * @param $load_path
     * 设置读取文件路径
     */
    public function setLoadPath($load_path) {
        $this->load_path = $load_path;
    }

    /**
     * @param $path
     * @param $filename
     * 设置临时文件名
     * @return string
     */
    public function setFileName($path = '', $filename = '') {
        $suffix = '.html';
        $filename = $filename ? $filename : ('TMP' . time() . rand(1000, 9999) . $suffix);
        $save_path = $path ? $path : (__DIR__. './');
        $this->file = $save_path . $filename;
    }

    /**
     * @return bool|int
     * 基础校验
     */
    protected function check() {
        if (!file_exists($this->load_path)) {
            return 10001;
        }
        $file_info = mime_content_type($this->load_path);
        if (!in_array($file_info, $this->mineType)) {
            return 10002;
        }
        return false;
    }

    /**
     * @return bool|mixed
     * 获取html内容
     */
    public function getHtml() {
        self::handle();
        $content = file_get_contents($this->file);
        preg_match_all('/<body>(.*)<\/body>/iUs', $content, $res);
        if (array_key_exists(1, $res)) {
            return $res[1][0];
        }
        return false;
    }


    /**
     * 删除文件
     */
    public function __destruct() {
        unlink($this->file);
    }
}


