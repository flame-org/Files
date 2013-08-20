<?php
/**
 * Class FilePath
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */
namespace Flame\Files\Helpers;

use Nette\Object;
use Flame\Files\Separator;

class FilePathHelpers extends Object
{

	/**
	 * @param $path1
	 * @param $path2
	 * @return bool
	 */
	public function useSepator($path1, $path2)
	{
		if (Separator::isOnPathEnding($path1) || Separator::isOnPathBegging($path2)) {
			return false;
		}

		return true;
	}

	/**
	 * @return string
	 */
	public function joinPaths(/* $path, $path, $path... */)
	{
		$agrs = func_get_args();
		$path = '';
		if (count($agrs) > 1) {
			$path = $agrs[0];
			unset($agrs[0]);
			foreach ($agrs as $arg) {
				$arg = (string) $arg;
				if ($this->useSepator($path, $arg)) {
					$path .= Separator::getSeparator() . $arg;
				} else {
					$path .= $agr;
				}
			}
		}

		return $path;
	}

}