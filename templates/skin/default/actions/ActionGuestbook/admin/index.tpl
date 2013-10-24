{include file='header.tpl'  noSidebar=true}

<div class="title">{$aLang.plugin.guestbook.title}</div>

{include file=$sActionGuestbookMenuTemplate}

<form method="post" action="{router page='guestbook/admin'}">
    <div class="guestbook-admin">
        <h3>{$aLang.plugin.guestbook.config.email.header}</h3>
        <p>
            <label for="email[address]">{$aLang.plugin.guestbook.config.email.address} :</label>
            <input type="text" id="email[address]" name="email[address]" value="{$aGuestbookConfig.email.address}"/>
        </p>
        <p>
            <label for="email[name]">{$aLang.plugin.guestbook.config.email.name} :</label>
            <input type="text" id="email[name]" name="email[name]" value="{$aGuestbookConfig.email.name}"/>
        </p>
        <p>
            <label for="email[subject]">{$aLang.plugin.guestbook.config.email.subject} :</label>
            <input type="text" id="email[subject]" name="email[subject]" value="{$aGuestbookConfig.email.subject}"/>
        </p>
        <p>
            <label for="email[template]">{$aLang.plugin.guestbook.config.email.template} :</label>
            <input type="text" id="email[template]" name="email[template]" value="{$aGuestbookConfig.email.template}"/>
        </p>
        <p>
            <label for="email[log]">{$aLang.plugin.guestbook.config.email.log} :</label>
            <input type="checkbox" id="email[log]" name="email[log]" {if $aGuestbookConfig.email.log}checked="checked"{/if}/>
        </p>

        <h3>{$aLang.plugin.guestbook.config.redirect.header}</h3>
        <p>
            <label for="redirect[url]">{$aLang.plugin.guestbook.config.redirect.url} :</label>
            <input type="text" id="redirect[url]" name="redirect[url]" value="{$aGuestbookConfig.redirect.url}"/>
        </p>
        <p>
            <label for="redirect[title]">{$aLang.plugin.guestbook.config.redirect.title} :</label>
            <input type="text" id="redirect[title]" name="redirect[title]" value="{$aGuestbookConfig.redirect.title}"/>
        </p>
        <p>
            <label for="redirect[text]">{$aLang.plugin.guestbook.config.redirect.text} :</label>
            <input type="text" id="redirect[text]" name="redirect[text]" value="{$aGuestbookConfig.redirect.text}"/>
        </p>
        <p>
            <input type="submit" name="guestbook_save_config" value="{$aLang.plugin.guestbook.buttons.save_config}" />
        </p>
    </div>
    </form>

{include file='footer.tpl'}