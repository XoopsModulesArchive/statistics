<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright      {@link https://xoops.org/ XOOPS Project}
 * @license        {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package
 * @since
 * @author         XOOPS Development Team
 */

// defined('XOOPS_ROOT_PATH') || die('Restricted access');

require_once __DIR__ . '/preloads/autoloader.php';

$modversion['version']             = 0.70;
$modversion['module_status']       = 'Beta 2';
$modversion['release_date']        = '2017/07/23';
$modversion['name']                = _MI_STATISTICS_NAME;
$modversion['description']         = _MI_STATISTICS_DESC;
$modversion['author']              = 'Seventhseal (John Horne)';
$modversion['credits']             = 'John Horne ( http://xoops.ibdeeming.com/ ) The BEST XOOPing Mods!<br>'
                                     . 'German translation and XOOP graphics by baerchn (http://www.elephantgraphics.de)<br>'
                                     . 'Portuguese/Brazil by gibaphp (http://www.xoopstotal.com.br)<br> '
                                     . 'Dutch by rnijdam (http://www.grandebelleville.nl)<br>'
                                     . 'Italian by Juri Montico (jack_sharkit@yahoo.it no site, yet!)<br>'
                                     . 'Bulgarian Unicode - ep98<br>'
                                     . 'Spanish - josespi (http://www.planpasperu.org.pe)';
$modversion['help']                = 'page=help';
$modversion['license']             = 'GNU GPL 2.0 or later';
$modversion['license_url']         = 'www.gnu.org/licenses/gpl-2.0.html';
$modversion['official']            = 0; //1 indicates supported by XOOPS Dev Team, 0 means 3rd party supported
$modversion['image']               = 'assets/images/logoModule.png';
$modversion['dirname']             = basename(__DIR__);
$modversion['modicons16']          = 'assets/images/icons/16';
$modversion['modicons32']          = 'assets/images/icons/32';
$modversion['release_file']        = XOOPS_URL . '/modules/' . $modversion['dirname'] . '/docs/changelog.txt';
$modversion['module_website_url']  = 'www.xoops.org';
$modversion['module_website_name'] = 'XOOPS';
$modversion['min_php']             = '5.5';
$modversion['min_xoops']           = '2.5.9';
$modversion['min_admin']           = '1.2';
$modversion['min_db']              = ['mysql' => '5.5'];

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables created by sql file (without prefix!)
$modversion['tables'][0]  = 'counter';
$modversion['tables'][1]  = 'stats_date';
$modversion['tables'][2]  = 'stats_month';
$modversion['tables'][3]  = 'stats_hour';
$modversion['tables'][4]  = 'stats_year';
$modversion['tables'][5]  = 'stats_ip';
$modversion['tables'][6]  = 'stats_refer';
$modversion['tables'][7]  = 'stats_refer_blacklist';
$modversion['tables'][8]  = 'stats_userscreen';
$modversion['tables'][9]  = 'stats_usercolor';
$modversion['tables'][10] = 'stats_blockedyear';
$modverison['tables'][11] = 'stats_blockedmonth';
$modversion['tables'][12] = 'stats_blockeddate';
$modversion['tables'][13] = 'stats_blockedhour';

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => _MI_STATISTICS_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_STATISTICS_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_STATISTICS_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_STATISTICS_SUPPORT, 'link' => 'page=support'],
];

// Blocks
$modversion['blocks'][1]['file']        = 'hitcounter.php';
$modversion['blocks'][1]['name']        = _MI_STATISTICS_BNAME1;
$modversion['blocks'][1]['description'] = 'Shows Site hits current and historically';
$modversion['blocks'][1]['show_func']   = 'b_hitcounter_show';
$modversion['blocks'][1]['options']     = 'site|1';
$modversion['blocks'][1]['edit_func']   = 'b_hitcounter_edit';
$modversion['blocks'][1]['template']    = 'stats_hitcounter.tpl';

$modversion['blocks'][2]['file']        = 'refercounter.php';
$modversion['blocks'][2]['name']        = _MI_STATISTICS_BNAME2;
$modversion['blocks'][2]['description'] = 'Shows Top referers';
$modversion['blocks'][2]['show_func']   = 'b_refercounter_show';
// the first number = refers to list
// the second number = 0-show full path only, 1-show domain only, 2-show all
// the third number = 0-self refer off, 1-self refer on
$modversion['blocks'][2]['options']   = '10|0|0';
$modversion['blocks'][2]['edit_func'] = 'b_refercounter_edit';
$modversion['blocks'][2]['template']  = 'stats_refercounter.tpl';

$modversion['blocks'][3]['file']        = 'referaccum.php';
$modversion['blocks'][3]['name']        = _MI_STATISTICS_BNAME3;
$modversion['blocks'][3]['description'] = 'This block shows top referers as accumulated, not by top hour.';
$modversion['blocks'][3]['show_func']   = 'b_referaccum_show';
$modversion['blocks'][3]['options']     = '10|1';
$modversion['blocks'][3]['edit_func']   = 'b_referaccum_edit';
$modversion['blocks'][3]['template']    = 'stats_referaccum.tpl';

// Menu
$modversion['hasMain']        = 1;
$modversion['sub'][1]['name'] = _MI_STATISTICS_SMNAME1;
$modversion['sub'][1]['url']  = 'index.php';
$modversion['sub'][2]['name'] = _MI_STATISTICS_SMNAME2;
$modversion['sub'][2]['url']  = 'hits.php';

// this code shows only if logged in user
/** @var XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$module        = $moduleHandler->getByDirname($modversion['dirname']);
$cansubmit     = 0;
if ($module) {
    global $xoopsUser;
    if (is_object($xoopsUser)) {
        $groups = $xoopsUser->getGroups();
    } else {
        $groups = XOOPS_GROUP_ANONYMOUS;
    }
    if (XOOPS_GROUP_ANONYMOUS != $groups) {
        $cansubmit = 1;
    }
}

if ($cansubmit) {
    $modversion['sub'][3]['name'] = _MI_STATISTICS_SMNAME3;
    $modversion['sub'][3]['url']  = 'referdetail.php';
}
unset($cansubmit);

$modversion['sub'][4]['name'] = _MI_STATISTICS_SMNAME4;
$modversion['sub'][4]['url']  = 'bhits.php';

// Admin things
$modversion['hasAdmin']    = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex']  = "admin/index.php?op=''";
$modversion['adminmenu']   = 'admin/menu.php';

// Templates
$modversion['templates'][1]['file']        = 'statistics.tpl';
$modversion['templates'][1]['description'] = 'Site Statistics';
$modversion['templates'][2]['file']        = 'hits.tpl';
$modversion['templates'][2]['description'] = 'Detail Hits';
$modversion['templates'][3]['file']        = 'statdetails.tpl';
$modversion['templates'][3]['description'] = 'Default invalid operation on stat details';
$modversion['templates'][4]['file']        = 'm_statdetails.tpl';
$modversion['templates'][4]['description'] = 'Monthly detail stats - show day for selected month';
$modversion['templates'][5]['file']        = 'y_statdetails.tpl';
$modversion['templates'][5]['description'] = 'Yearly detail stats - show months for selected year';
$modversion['templates'][6]['file']        = 'd_statdetails.tpl';
$modversion['templates'][6]['description'] = 'Daily detail stats - show hours for selected day';
$modversion['templates'][7]['file']        = 'referdetail.tpl';
$modversion['templates'][7]['description'] = 'Referer long list - show based on the settings for the referer block';

// Config stuff
// refererspam
$modversion['config'][1]['name']        = 'refererspam';
$modversion['config'][1]['title']       = '_MI_REFERERSPAM';
$modversion['config'][1]['description'] = '_MI_REFERERSPAMDSC';
$modversion['config'][1]['formtype']    = 'select';
$modversion['config'][1]['valuetype']   = 'text';
$modversion['config'][1]['default']     = 'Forbidden';
$modversion['config'][1]['options']     = [
    '_MI_REFERERSPAMALLOW'     => 'Allow',
    '_MI_REFERERSPAMFORBIDDEN' => 'Forbidden',
    '_MI_REFERERSPAMIGNORE'    => 'Ignore',
    '_MI_REFERERSPAMREFLECT'   => 'Reflect'
];

// stats_customforbidmsg
$modversion['config'][2]['name']        = 'stats_customforbidmsg';
$modversion['config'][2]['title']       = '_MI_CUSTOMFORBIDMSG';
$modversion['config'][2]['description'] = '_MI_CUSTOMFORBIDMSGDSC';
$modversion['config'][2]['formtype']    = 'textarea';
$modversion['config'][2]['valuetype']   = 'text';
$modversion['config'][2]['default']     = 'http/1.1 403 Forbidden';

// stats_allowfilteriphits
$modversion['config'][3]['name']        = 'stats_allowfilteriphits';
$modversion['config'][3]['title']       = '_MI_ALLOWFILTERIPHITS';
$modversion['config'][3]['description'] = '_MI_ALLOWFILTERIPHITSDSC';
$modversion['config'][3]['formtype']    = 'yesno';
$modversion['config'][3]['valuetype']   = 'int';
$modversion['config'][3]['default']     = 0;

// stats_filteriphits
$modversion['config'][4]['name']        = 'stats_filteriplist';
$modversion['config'][4]['title']       = '_MI_FILTERIPLIST';
$modversion['config'][4]['description'] = '_MI_FILTERIPLISTDSC';
$modversion['config'][4]['formtype']    = 'textarea';
$modversion['config'][4]['valuetype']   = 'array';
$modversion['config'][4]['default']     = ['127.0.0.1'];

// stats_botidentities
$modversion['config'][5]['name']        = 'stats_botidentities';
$modversion['config'][5]['title']       = '_MI_BOTIDENTITIES';
$modversion['config'][5]['description'] = '_MI_BOTIDENTITIESDSC';
$modversion['config'][5]['formtype']    = 'textarea';
$modversion['config'][5]['valuetype']   = 'array';
$modversion['config'][5]['default']     = [
    'bot',
    'ia_arch',
    'Feedread',
    'Popos',
    'find',
    'Google',
    'Slurp',
    'Scooter',
    'Spider',
    'Infoseek',
    'DigExt',
    'SharpReader',
    'waypath',
    'media',
    'wwwster',
    'crawl',
    'seer',
    'claymont',
    'blaiz'
];

// stats_forbidbots
$modversion['config'][6]['name']        = 'stats_forbidbots';
$modversion['config'][6]['title']       = '_MI_FORBIDBOTS';
$modversion['config'][6]['description'] = '_MI_FORBIDBOTSDSC';
$modversion['config'][6]['formtype']    = 'yesno';
$modversion['config'][6]['valuetype']   = 'int';
$modversion['config'][6]['default']     = 1;

// stats_botstoblock
$modversion['config'][7]['name']        = 'stats_botstoblock';
$modversion['config'][7]['title']       = '_MI_BOTSTOBLOCK';
$modversion['config'][7]['description'] = '_MI_BOTSTOBLOCKDSC';
$modversion['config'][7]['formtype']    = 'textarea';
$modversion['config'][7]['valuetype']   = 'array';
$modversion['config'][7]['default']     = [
    'zyborg',
    'sherlock',
    'holmes',
    'searchalot',
    'mra',
    'appie',
    'yahooseeker',
    'ant chassis',
    'boitho',
    'webcopier',
    'web downloader',
    'gigabot'
];

// auto-purge referer list
$modversion['config'][8]['name']        = 'autopurgereferer';
$modversion['config'][8]['title']       = '_MI_AUTOPURGEREFERERLIST';
$modversion['config'][8]['description'] = '_MI_AUTOPURGEREFERERDSC';
$modversion['config'][8]['formtype']    = 'select';
$modversion['config'][8]['valuetype']   = 'text';
$modversion['config'][8]['default']     = 'never';
$modversion['config'][8]['options']     = [
    '_MI_AUTOPURGENEVER'      => 'never',
    '_MI_AUTOPURGESIXHOUR'    => 'sixhour',
    '_MI_AUTOPURGETWELVEHOUR' => 'twelvehour',
    '_MI_AUTOPURGEONEDAY'     => 'oneday',
    '_MI_AUTOPURGEFIVEDAY'    => 'fiveday'
];
