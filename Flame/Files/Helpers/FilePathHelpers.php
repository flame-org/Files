<?php
/**
 * Class FilePath
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */
namespace Flame\Files\Helpers;

use Nette\Object;
use Flame\Files\Utils\Separator;

class FilePathHelpers extends Object
{

	/**
	 * @return string
	 */
	public function joinPaths(/* $path, $path, $path... */)
	{
		$separator = Separator::getSeparator();
		$paths = array_filter(func_get_args());
		return preg_replace('#' . $separator . '{2,}#', $separator, implode($separator, $paths));
	}

}