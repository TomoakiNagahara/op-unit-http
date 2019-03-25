<?php
/**
 * unit-http:/Http.class.php
 *
 * @creation  2019-03-24
 * @version   1.0
 * @package   unit-http
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @creation  2019-03-24
 */
namespace OP\UNIT;

/** Used class
 *
 * @creation  2019-03-24
 */
use Exception;
use OP\OP_CORE;
use OP\OP_UNIT;
use OP\OP_DEBUG;
use OP\IF_UNIT;

/** Html
 *
 * @creation  2018-01-24
 * @version   1.0
 * @package   unit-i18n
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Http implements IF_UNIT
{
	/** trait
	 *
	 */
	use OP_CORE, OP_UNIT, OP_DEBUG;

	/** To redirect location.
	 *
	 * @param  string   $url
	 * @param  integer  $code
	 * @param  boolean  $replace
	 */
	function Location($url, $code=200, $replace=true)
	{
		/* @var $file null */
		/* @var $line null */
		if( headers_sent($file, $line) ){
			throw new Exception("Header was already output. ({$file} #{$line})");
		};

		//	...
		$url = $this->URL($url);

		//	...
		self::__DebugSet(__FUNCTION__, [$url, $code, $replace]);

		//	...
		header("Location: $url", $replace);

		//	...
		exit;
	}
}
