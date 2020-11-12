<table width="100%">
    <tr>
        <td width="100%">
            <table width="99%">
                <tr>
                    <th colspan="3" width="100%"><{$lang_refer_counterhead}></th>
                </tr>
                <{foreach item=referhits from=$lang_refer_referhits}>
                    <tr>
                        <td>
                            <{if $referhits.pathing == "0"}>
                                <a href="http://<{$referhits.refer}><{$referhits.path}>" target="_new"
                                   alt="<{$referhits.refer}><{$referhits.path}>">
                                    <{$referhits.refer}>
                                    <{if $referhits.path != "" }>
                                        <{$referhits.elipses}>
                                    <{/if}>
                                </a>
                            <{elseif $referhits.pathing == "1"}>
                                <a href="http://<{$referhits.refer}>" target="_new" alt="<{$referhits.refer}>">
                                    <{$referhits.refer}>
                                    <{if $referhits.path != "" }>
                                        <br>
                                        <{$referhits.pathstrip}>
                                    <{/if}>
                                </a>
                            <{else}>
                                <a href="http://<{$referhits.refer}>" target="_new" alt="<{$referhits.refer}>">
                                    <{$referhits.refer}></a>
                                <{if $referhits.path != "" }>
                                    <a href="http://<{$referhits.refer}><{$referhits.path}>" target="_new"
                                       alt="<{$referhits.refer}><{$referhits.path}>">
                                        <br><{$referhits.pathdns}>
                                    </a>
                                <{/if}>
                            <{/if}>
                        </td>
                        <td>
                            <{$referhits.month}>-<{$referhits.day}>-<{$referhits.year}>&nbsp;/&nbsp;<{$referhits.hour}>
                        </td>
                        <td align="left">
                            <{$referhits.hits}>
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        </td>
    </tr>
</table>
