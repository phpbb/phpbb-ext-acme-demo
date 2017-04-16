<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\mcp;

class main_info
{
    function module()
    {
        return array(
            'filename'    => '\acme\demo\mcp\main_module',
            'title'        => 'MCP_DEMO_TITLE',
            'version'    => '1.0.1',
            'modes'        => array(
                'main'    => array('title' => 'MCP_DEMO', 'auth' => 'ext_acme/demo', 'cat' => array('MCP_DEMO_TITLE')),
            ),
        );
    }
}
