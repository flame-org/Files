<?php
/**
 * Class IFileUploadSaver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */

namespace Flame\Files;

interface IFileUploadSaver
{

	/**
	 * Save uploaded file and return file path
	 *
	 * @return string
	 */
	public function save();
}