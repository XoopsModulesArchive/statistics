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
                    <th colspan="2"><{$lang_stat_hourlystats}></th>
                </tr>
                <tr>
                    <td width="25%" align="center"><{$lang_stat_hourlyhead}></td>
                    <td><{$lang_stat_pagesviewed}></td>
                </tr>
                <{foreach item=hourlist from=$hourlist}>
                    <tr>
                        <td width="25%">
                            <{$hourlist.hour}>
                        </td>
                        <td>
                            <{$hourlist.graph}>&nbsp;<{$hourlist.hits}>&nbsp;(<{$hourlist.percent}>)
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        </td>
    </tr>
</table>
