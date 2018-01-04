<table width="100%">
    <tr>
        <td width="100%">
            <table width="99%">
                <tr>
                    <th colspan="3" width="100%"><{$block.counterhead}></th>
                </tr>
                <{foreach item=referhits from=$block.referhits}>
                    <tr>
                        <td width="40%">
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
                                    <{$referhits.refer}>
                                    <{if $referhits.path != "" }>
                                        <a href="http://<{$referhits.refer}><{$referhits.path}>" target="_new"
                                           alt="<{$referhits.refer}><{$referhits.path}>">
                                            <br><{$referhits.pathdns}>
                                        </a>
                                    <{/if}>
                                </a>
                            <{/if}>
                        </td>
                        <td width="30%">
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
