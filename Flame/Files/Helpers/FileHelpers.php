<?php
/**
 * Class FileHelper
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 20.08.13
 */
namespace Flame\Files\Helpers;

use Flame\Files\Separator;
use Nette\Object;

class FileHelpers extends Object
{

	/**
	 * @param $path
	 * @return mixed
	 */
	public function getFileName($path)
	{
		$path = preg_replace("#\\/#", Separator::getSeparator(), $path);
		if (strpos($path, Separator::getSeparator()) === false) {
			return $path;
		} else {
			return str_replace(Separator::getSeparator(), '', strrchr($path, Separator::getSeparator()));
		}
	}

	/**
	 * @param $path
	 * @return mixed
	 */
	public function getFileExtension($path)
	{
		return pathinfo($path, PATHINFO_EXTENSION);
	}

	/**
	 * @param string $path
	 * @param string $newExtension
	 * @return mixed
	 */
	public function modifyExtension($path, $newExtension)
	{
		return preg_replace('/\..+$/', '.' . (string) $newExtension, (string) $path);
	}
}