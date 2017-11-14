<?php

namespace Controller;


class Viewer
{
    const HEAD = 'head.html';
    const FOOT = 'foot.html';

    private $pathToLayout = '';
    private $pathToView = '';

    public function __construct()
    {
        $this->pathToView = __DIR__ . '/../View/';
        $this->pathToLayout = $this->pathToView . 'layout/';
    }

    public function show($templateName = '', $data = '')
    {
        $str = '';
        $str .= file_get_contents($this->pathToLayout . self::HEAD);
        include $this->pathToView . $templateName . '.php';
        $str .= file_get_contents($this->pathToLayout . self::FOOT);
        return $str;
    }
}