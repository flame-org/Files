<?php
/**
 * Class IFileUploadSaver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */

namespace Flame\Files;

use Nette\Http\FileUpload;

interface IFileUploadSaver
{

	/**
	 * Save uploaded file and return file path
	 *
	 * @param FileUpload $file
	 * @param null $name
	 * @return mixed
	 */
	public function save(FileUpload $file, $name = null);
}