<table width="100%">
    <tr>
        <th>
            <{$lang_stat_hitdetail}> - <{$lang_stat_thissite}>
        </th>
    </tr>
    <tr>
        <td>
            <table width="95%" align="center">
                <tr>
                    <th colspan="2"><{$lang_stat_monthlystats}></th>
                </tr>
                <tr>
                    <td width="25%" align="center"><{$lang_stat_monthhead}></td>
                    <td><{$lang_stat_pagesviewed}></td>
                </tr>
                <{foreach item=monthlist from=$monthlist}>
                    <tr>
                        <td width="25%">
                            <{if $monthlist.link eq ""}>
                                <{$monthlist.month}>
                            <{else}>
                                <{$monthlist.link}>
                            <{/if}>
                        </td>
                        <td>
                            <{$monthlist.graph}>&nbsp;<{$monthlist.hits}>&nbsp;(<{$monthlist.percent}>)
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        </td>
    </tr>
</table>
