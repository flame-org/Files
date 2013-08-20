<?php
/**
 * Class Separator
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */
namespace Flame\Files\Utils;

use Nette\Object;
use Nette\Utils\Strings;

class Separator extends Object
{

	/**
	 * @param $path
	 * @return bool
	 */
	public static function isOnPathBegging($path)
	{
		return Strings::startsWith($path, Separator::getSeparator());
	}

	/**
	 * @param $path
	 * @return bool
	 */
	public static function isOnPathEnding($path)
	{
		return Strings::startsWith($path, Separator::getSeparator());
	}

	/**
	 * @return string
	 */
	public static function getSeparator()
	{
		return DIRECTORY_SEPARATOR;
	}
}