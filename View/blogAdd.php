<?php
$str .=
    '<form action="/add" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Имя" />
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Сообщение"></textarea>
        <input type="file" name="file">
        <input type="submit" value="Добавить блог">
    </form>';