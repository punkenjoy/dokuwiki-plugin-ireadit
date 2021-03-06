<?php
/**
 * Plugin Now: Inserts a timestamp.
 * 
 * @license    GPL 3 (http://www.gnu.org/licenses/gpl.html)
 * @author     Szymon Olewniczak <szymon.olewniczak@rid.pl>
 */

// must be run within DokuWiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once DOKU_PLUGIN.'syntax.php';

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_ireadit extends DokuWiki_Syntax_Plugin {

    function getPType(){
       return 'block';
    }

    function getType() { return 'substition'; }
    function getSort() { return 99; }


    function connectTo($mode) {
	$this->Lexer->addSpecialPattern('~~IREADIT~~',$mode,'plugin_ireadit');
    }

    function handle($match, $state, $pos, &$handler)
    {
	return true;
    }

    function render($mode, &$renderer, $data) {
	if($mode == 'xhtml')
       	{
	    return true;
	}
	elseif($mode == 'metadata')
	{
	    $renderer->meta['plugin_ireadit'] = true;
	    return true;
        }
        return false;
    }
}
