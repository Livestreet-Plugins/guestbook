{include file='header.tpl'}

<h1>{$aLang.plugin.guestbook.title}</h1>

{if $sGuestbookMessage}
    <div class="guestbook-message">
        <span>
            {$sGuestbookMessage}
        </span>
    </div>
{/if}
{if $bShowForm}
<form id="guestbookForm" class="guestbook-form" method="post" action="">
    <fieldset title="{$aLang.plugin.guestbook.ask_question}" form="guestbookForm">
        <p>
            <label for="gbfname">* {$aLang.plugin.guestbook.your_name}:</label>
            <input id="gbfname" type="text" class="required" name="guestbook[enquirer_name]" value="{if $aPrevRequest.enquirer_name}{$aPrevRequest.enquirer_name}{/if}"/>
        </p>
        <p>
            <label for="gbfmail">* {$aLang.plugin.guestbook.your_mail}:</label>
            <input id="gbfmail" type="text" class="required email" name="guestbook[enquirer_mail]" value="{if $aPrevRequest.enquirer_mail}{$aPrevRequest.enquirer_mail}{/if}"/>
        </p>
        <p>
            <label for="gbfquestion">* {$aLang.plugin.guestbook.your_question}:</label>
            <textarea id="gbfquestion" class="required" name="guestbook[enquirer_question]">{if $aPrevRequest.enquirer_question}{$aPrevRequest.enquirer_question}{/if}</textarea>
        </p>
        <p>
            <input type="submit" class="submit" name="guestbook_submit" value="{$aLang.plugin.guestbook.send_question}"/>
        </p>
    </fieldset>
</form>
{/if}
{include file='footer.tpl'}