<?php
/**
 * Class IFileDownloader
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 20.08.13
 */

namespace Flame\Files;


interface IFileDownloader
{

	/**
	 * Download file from url and return file path
	 *
	 * @param string $url
	 * @param string $name
	 * @return null|string
	 */
	public function download($url, $name = null);
}