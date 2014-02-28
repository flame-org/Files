<?php
/**
 * Class FileUploadSaver
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 10.08.13
 */
namespace Flame\Files;

use Flame\Files\Helpers\FilePathHelpers;
use Nette\Http\FileUpload;
use Nette\InvalidArgumentException;
use Nette\Object;
use Nette\Utils\Strings;
use Flame\Files\Utils\FileSystem;
use Flame\Files\Config\Storage;

class FileUploadSaver extends Object implements IFileUploadSaver
{

	/** @var  Storage */
	private $storage;

	/** @var \Flame\Files\Helpers\FilePathHelpers  */
	private $filePathHelpers;

	/**
	 * @param FilePathHelpers $filePathHelpers
	 * @param Storage $storage
	 */
	function __construct(FilePathHelpers $filePathHelpers, Storage $storage)
	{
		$this->storage = $storage;
		$this->filePathHelpers = $filePathHelpers;
	}

	/**
	 * @return Storage
	 */
	public function getStorage()
	{
		return $this->storage;
	}

	/**
	 * Save uploaded file and return file path
	 *
	 * @param \Nette\Http\FileUpload $file
	 * @param null $name
	 * @return string
	 * @throws \Nette\InvalidArgumentException
	 */
	public function save(FileUpload $file, $name = null)
	{
		if (!$file->isOk()) {
			throw new InvalidArgumentException('File ' . $file->getName() . ' is not valid.');
		}

		$this->createDirectory($this->storage->getFullPath());

		if(!$name) {
			$name = $file->getSanitizedName();
		}

		$filePath = $this->getFullFilePath($name);
		if(file_exists($filePath)) {
			$new_name = $this->getPrefixedName($name);
			$filePath = str_replace($name, $new_name, $filePath);
			$name = $new_name;
		}

		$file->move($filePath);

		return $this->getFilePath($name);
	}

	/**
	 * @param $path
	 * @return bool
	 */
	private function createDirectory($path)
	{
		return FileSystem::mkDir((string) $path, true, 0777);
	}

	/**
	 * @param $name
	 * @return string
	 */
	private function getPrefixedName($name)
	{
		return Strings::random(3) . '_' . $name;
	}

	/**
	 * @param $name
	 * @return string
	 */
	private function getFullFilePath($name)
	{
		return $this->filePathHelpers->joinPaths($this->storage->getFullPath(), $name);
	}

	/**
	 * @param $name
	 * @return string
	 */
	private function getFilePath($name)
	{
		return $this->filePathHelpers->joinPaths($this->storage->getFolderPath(), $name);
	}

} 