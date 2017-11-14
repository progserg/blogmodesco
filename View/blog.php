<?php
$date = date('d-m-Y H:i:s', $data->date);
$str .= '<div class="full-blog">';
$str .= "<p class='message'>{$data->message}</p>";
$str .= "<div class='info'><span class='name'>Имя: {$data->name}</span><span class='time'>Дата: {$date}</span></div>";
if($data->file != '') {
    $str .= "<a class='download' href='/uploads/{$data->file}' download>Скачать файл {$data->file}</a>";
}
$str .= "</div>";