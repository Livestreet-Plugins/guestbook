<?php
/**
 * @file        russian.php
 * @description
 *
 * PHP Version  5.3
 *
 * @package     Gusetbook plugin
 * @category    Language
 * @plugin URI
 * @copyright   2013, Vadim Pshentsov. All Rights Reserved.
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @author      Vadim Pshentsov <pshentsoff@gmail.com>
 * @created     22.04.13
 */

return array(

    'title' => 'Гостевая книга',
    'admin' => 'Настройки',
    'description' => 'Описание',
    'license' => 'Лицензия',
    'donate' => 'Пожертвования',
    'goback' => 'Вернуться',
    'nodata' => 'Нет данных',

    'thanx' => "Спасибо Вам за Ваш отзыв. <a href=\"%%url%%\" title=\"%%title%%\">%%text%%</a>",
    'please_select' => 'Выберите, пожалуйста...',
    'ask_question' => 'Задайте свой вопрос',
    'your_name' => 'Пожалуйста, представьтесь',
    'your_mail' => 'Ваш Email (не публикуется)',
    'your_question' => 'Ваш вопрос',
    'send_question' => 'Отправить вопрос',

    'buttons' => array(
        'save_config' => 'Сохранить настройки',
    ),

    'config' => array(

        'redirect' => array(
            'header' => 'Перенаправление после отправки',
            'url' => 'URL',
            'title' => 'Title ссылки',
            'text' => 'Текст',
        ),

        'email' => array(
            'header' => 'Настройки сообщений',
            'address' => 'EMail',
            'name' => 'Имя',
            'subject' => 'Тема',
            'template' => 'Шаблон',
            'log' => 'Вести лог',
        ),
    ),
);