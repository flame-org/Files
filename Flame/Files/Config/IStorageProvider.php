<?php
/**
 * Class IStorageProvider
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */
namespace Flame\Files\Config;

interface IStorageProvider
{

	/**
	 * Return Storage configuration
	 *
	 * @return Storage
	 */
	public function getStorage();

}