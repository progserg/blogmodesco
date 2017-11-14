<?php

namespace Model;

use PDO;

class modelBlog
{
    public function __construct()
    {
        $this->db = new DB();
        $this->db = $this->db->init();
    }

    public function getBlogs()
    {
        return $this->db->query('SELECT id, name, date FROM blogs')->fetchAll(PDO::FETCH_CLASS, 'Controller\Blog');
    }

    public function getBlogById($id)
    {
        return $this->db->query("SELECT name, date, file, message FROM blogs WHERE id={$id}")->fetchAll(PDO::FETCH_CLASS, 'Controller\Blog');
    }

    public function addBlog($data)
    {
        $uploadDir = './uploads/';

        $filename = basename($data['file']['name']);
        if (!empty($filename)) {
            $uploadFile = $uploadDir . $filename;

            copy($data['file']['tmp_name'], $uploadFile);
        }

        $sql = $this->db->prepare("INSERT INTO blogs SET name=:name, message=:message, file=:file, date=:date");
        $blog = [
            'name' => $this->clearStr($data['name']),
            'message' => $this->clearStr($data['message']),
            'file' => $filename,
            'date' => time()
        ];
        $sql->execute($blog);
    }

    public function delBlogById($id)
    {
        $blog = $this->getBlogById($id);

        if(!empty($blog[0]->file)){
            $file = './uploads/' . $blog[0]->file;
            if(file_exists($file)){
                unlink($file);
            }
        }
        $this->db->query("DELETE FROM blogs WHERE id={$id}");
    }

    private function clearStr($str)
    {
        return htmlspecialchars(trim($str));
    }
}