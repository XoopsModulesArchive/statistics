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
                    <th colspan="2"><{$lang_stat_dailystats}></th>
                </tr>
                <tr>
                    <td width="25%" align="center"><{$lang_stat_dailyhead}></td>
                    <td><{$lang_stat_pagesviewed}></td>
                </tr>
                <{foreach item=dailylist from=$dailylist}>
                    <tr>
                        <td width="25%">
                            <{if $dailylist.link eq ""}>
                                <{$dailylist.date}>
                            <{else}>
                                <{$dailylist.link}>
                            <{/if}>
                        </td>
                        <td>
                            <{$dailylist.graph}>&nbsp;<{$dailylist.hits}>&nbsp;(<{$dailylist.percent}>)
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        </td>
    </tr>
</table>
