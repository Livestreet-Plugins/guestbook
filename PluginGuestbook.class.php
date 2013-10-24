<?php
/**
 * @file        PluginGuestbook.class.php
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

if (!class_exists('Plugin')) {
    die('This script can not be executed directly.');
}

class PluginGuestbook extends Plugin {

    public function Init() {
        parent::Init();
        $this->Viewer_AppendStyle(Plugin::GetTemplateWebPath(__CLASS__).'css/guestbook.css');

        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/jquery.validate.min.js');
        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/messages_ru.js');
        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/guestbook.js');
    }

}
