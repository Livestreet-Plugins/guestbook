<?php
/**
 * @file        ActionGuestbook.class.php
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

if (!class_exists('Action')) {
    die('This script can not be executed directly.');
}

class PluginGuestbook_ActionGuestbook extends Action {

    protected $oViewerLocal;

    public function Init() {
        $this->oViewerLocal=$this->Viewer_GetLocalViewer();
        $this->SetDefaultEvent('index');
    }

    public function RegisterEvent() {
        //Common service actions and pages
        $this->AddEvent('description', 'ShowDescription');
        $this->AddEvent('license', 'ShowLicense');
        $this->AddEvent('donate', 'ShowDonate');

        $this->AddEvent('index', 'EventDefault');
        $this->AddEvent('admin', 'EventAdmin');
    }

    protected function ShowDescription() {
        $this->Viewer_Assign('sShowTextTitle', $this->Lang_Get('plugin.guestbook.title').' : '.$this->Lang_Get('plugin.guestbook.description'));
        $this->Viewer_Assign('sURLBack', 'guestbook/admin');
        $this->Viewer_Assign('sURLBackTitle', $this->Lang_Get('plugin.guestbook.goback'));
        $this->Viewer_Assign('sTextFile', Plugin::GetPath(__CLASS__).'/Readme.txt');
        $this->SetTemplateAction('showtext');
    }

    protected function ShowLicense() {
        $this->Viewer_Assign('sShowTextTitle', $this->Lang_Get('plugin.guestbook.title').' : '.$this->Lang_Get('plugin.guestbook.license'));
        $this->Viewer_Assign('sURLBack', 'guestbook/admin');
        $this->Viewer_Assign('sURLBackTitle', $this->Lang_Get('plugin.guestbook.goback'));
        $this->Viewer_Assign('sTextFile', Plugin::GetPath(__CLASS__).'/License.txt');
        $this->SetTemplateAction('showtext');
    }

    protected function ShowDonate() {
        $this->Viewer_Assign('sShowTextTitle', $this->Lang_Get('plugin.guestbook.title').' : '.$this->Lang_Get('plugin.guestbook.donate'));
        $this->Viewer_Assign('sURLBack', 'guestbook/admin');
        $this->Viewer_Assign('sURLBackTitle', $this->Lang_Get('plugin.guestbook.goback'));
        $this->Viewer_Assign('sHTMLFile', Plugin::GetPath(__CLASS__).'/Donate.html');
        $this->SetTemplateAction('showtext');
    }

    protected function SendMail($sMail, $sName, $sSubject, $sMailTemplate, $aTemplateAssign = array()) {

        foreach($aTemplateAssign as $key => $value) {
            $this->oViewerLocal->Assign($key, $value);
        }
        $sMessage = $this->oViewerLocal->Fetch($sMailTemplate);

        $this->Mail_SetAdress($sMail,$sName);
        $this->Mail_SetSubject($sSubject);
        $this->Mail_SetBody($sMessage);
        $this->Mail_setHTML();
        $this->Mail_Send();

        if(Config::Get('plugin.guestbook.email.log')) {
            $this->Logger_Notice("Mail sent to $sName <$sMail> with subject '$sSubject'");
//            $this->Logger_Notice($sMessage);
        }

    }

    protected function Send() {
        $aMessage = getRequest('guestbook', array(), 'post');

        $this->SendMail(
            Config::Get('plugin.guestbook.email.address'),
            Config::Get('plugin.guestbook.email.name'),
            Config::Get('plugin.guestbook.email.subject'),
            Plugin::GetTemplatePath(__CLASS__).'actions/ActionGuestbook/'.Config::Get('plugin.guestbook.email.template'),
            $aMessage
        );
        $this->Viewer_Assign('sGuestbookMessage', $this->Lang_Get('plugin.guestbook.thanx', Config::Get('plugin.guestbook.redirect')));
        return true;
    }

    protected function EventDefault() {

        $bShowForm = true;

        if(isPost('guestbook_submit')) {
            $bShowForm = !$this->Send();
        }

        $this->Viewer_Assign('bShowForm', $bShowForm);
        $this->SetTemplateAction('index');
    }

    protected function EventAdmin() {
        if(!LS::Adm()) {
            return parent::EventNotFound();
        }

        if(isPost('guestbook_save_config')) {
            $config = array();
            $config['email'] = getRequest('email', array(), 'post');
            $config['redirect'] = getRequest('redirect', array(), 'post');

            //@todo Проверку параметров

            Config::Set('plugin.guestbook.email', $config['email']);
            Config::Set('plugin.guestbook.redirect', $config['redirect']);

            ConfigEngine::SaveMyConfig($this);
        }

        $this->Viewer_Assign('sActionGuestbookMenuTemplate', Plugin::GetTemplatePath(__CLASS__).'actions/ActionGuestbook/admin/menu.tpl');
        $this->Viewer_Assign('bShowDonateLink', Config::Get('plugin.guestbook.show_donate_link'));
        $this->Viewer_Assign('aGuestbookConfig', Config::Get('plugin.guestbook'));
        $this->SetTemplateAction('admin/index');
    }
}
