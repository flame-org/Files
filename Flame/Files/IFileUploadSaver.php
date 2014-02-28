<?php
/**
 * Class IFileUploadSaver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */

namespace Flame\Files;

use Flame\Files\Config\IStorageProvider;
use Nette\Http\FileUpload;

interface IFileUploadSaver extends IStorageProvider
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