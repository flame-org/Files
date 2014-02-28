<?php
/**
 * Class FileDownloader
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 20.08.13
 */
namespace Flame\Files;

use Flame\Files\Config\Storage;
use Flame\Files\Helpers\FileHelpers;
use Flame\Files\Helpers\FilePathHelpers;
use Flame\Files\Utils\FileSystem;
use Nette\Object;

class FileDownloader extends Object implements IFileDownloader
{

	/** @var  Storage */
	private $storage;

	/** @var  FileHelpers */
	private $fileHelpers;

	/** @var  FilePathHelpers */
	private $filePathHelpers;

	/**
	 * @param FileHelpers $fileHelpers
	 * @param FilePathHelpers $filePathHelpers
	 * @param Storage $storage
	 */
	function __construct(FileHelpers $fileHelpers, FilePathHelpers $filePathHelpers, Storage $storage)
	{
		$this->fileHelpers = $fileHelpers;
		$this->filePathHelpers = $filePathHelpers;
		$this->storage = $storage;
	}


	/**
	 * Download file from url and return file path
	 *
	 * @param string $url
	 * @param string $name
	 * @return null|string
	 */
	public function download($url, $name = null)
	{
		if(!$name) {
			$name = $this->fileHelpers->getFileName($url);
		}

		if ($file = FileSystem::read($url, false)) {
			$fileDir = $this->filePathHelpers->joinPaths($this->storage->getFullPath(), $name);

			if (FileSystem::write($fileDir, $file, true, 0777, false)) {
				return $this->filePathHelpers->joinPaths($this->storage->getFolderPath(), $name);
			}
		}

		return null;
	}

	/**
	 * Return Storage configuration
	 *
	 * @return Storage
	 */
	public function getStorage()
	{
		return $this->storage;
	}
}