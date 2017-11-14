<?php

namespace Controller;

use Model\modelBlog;

class Blog
{
    public $id = 0;
    public $name = '';
    public $message = '';
    public $date = 0;

    public function __construct()
    {
        $this->MB = new modelBlog();
        $this->view = new Viewer();
    }

    public function index()
    {
        $blogs = $this->MB->getBlogs();
        echo $this->view->show('blogs', $blogs);
    }

    public function get($data = '')
    {
        if (!empty($data['id'])) {
            $blog = $this->MB->getBlogById($data['id']);
            echo $this->view->show('blog', $blog[0]);
        }
    }

    public function add($data = '')
    {
        if (!empty($data['name']) && !empty($data['message'])) {
            $this->MB->addBlog($data);
            header('Location: http://' . $_SERVER['HTTP_HOST']);
        } else {
            echo $this->view->show('blogAdd');
        }
    }

    public function del($data = '')
    {
        if (!empty($data['id'])) {
            $this->MB->delBlogById($data['id']);
            header('Location: http://' . $_SERVER['HTTP_HOST']);
        }
    }

}