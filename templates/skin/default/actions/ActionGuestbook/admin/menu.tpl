<div class="guestbook-menu">
    <a href="{router page='guestbook/admin'}">{$aLang.plugin.guestbook.admin}</a>
    &nbsp;|&nbsp;<a href="{router page='guestbook/description'}">{$aLang.plugin.guestbook.description}</a>
    &nbsp;|&nbsp;<a href="{router page='guestbook/license'}">{$aLang.plugin.guestbook.license}</a>
    {if $bShowDonateLink}
    &nbsp;|&nbsp;<a href="{router page='guestbook/donate'}">{$aLang.plugin.guestbook.donate}</a>
    {/if}
</div>