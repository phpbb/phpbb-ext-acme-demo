<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\ucp;

class main_info
{
    function module()
    {
        return array(
            'filename'    => '\acme\demo\ucp\main_module',
            'title'        => 'UCP_DEMO_TITLE',
            'version'    => '1.0.1',
            'modes'        => array(
                'settings'    => array('title' => 'UCP_DEMO', 'auth' => '', 'cat' => array('UCP_MAIN')),
            ),
        );
    }
}
