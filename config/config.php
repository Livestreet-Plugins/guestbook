<?php
/**
 * @file        config.php
 * @description
 *
 * PHP Version  5.3
 *
 * @package
 * @category
 * @plugin URI
 * @copyright   2013, Vadim Pshentsov. All Rights Reserved.
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @author      Vadim Pshentsov <pshentsoff@gmail.com>
 * @created     18.04.13
 */

$config = array();

//plugin routing
$config['$root$']['router']['page']['guestbook'] = 'PluginGuestbook_ActionGuestbook';

$config['redirect'] = array(
    'url' => '/',
    'title' => 'Вернуться',
    'text' => '<small>На главную&nbsp;&gt;</small>',
);

$config['email'] = array(
    'address' => 'pshentsoff@yandex.ru',
    'name' => 'Vadim',
    'subject' => 'Guestbook, plugin for Livestreet',
    'template' => 'mail.tpl',
    'log' => true,
);

$config['show_donate_link'] = 1;

return $config;