<?php
$str .= '<ul class="blogs">';
foreach ($data as $item){
    $date = date('d-m-Y H:i:s', $item->date);
    $str .= "<li><a class='blog' href='blog?id={$item->id}'><span class='name'>{$item->name}</span><span class='time'>{$date}</span></a><a class='delete-blog' href='del?id={$item->id}'>X</a></li>";
}
$str .='</ul>';