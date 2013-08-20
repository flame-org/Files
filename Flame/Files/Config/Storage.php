<?php
/**
 * Class Storage
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 19.08.13
 */
namespace Flame\Files\Config;

use Flame\Files\Helpers\FilePathHelpers;
use Nette\Object;

class Storage extends Object
{

	/** @var  string */
	private $baseFolderPath;

	/** @var  string */
	private $folderPath;

	/** @var FilePathHelpers */
	private $filePathHelpers;

	/**
	 * @param FilePathHelper $filePathHelpers
	 * @param $baseFolderPath
	 * @param string $folderPath
	 */
	function __construct(FilePathHelpers $filePathHelpers, $baseFolderPath, $folderPath)
	{
		$this->baseFolderPath = (string) $baseFolderPath;
		$this->folderPath = (string) $folderPath;
		$this->filePathHelpers = $filePathHelpers;
	}

	/**
	 * @param string $baseFolderPath
	 * @return $this
	 */
	public function setBaseFolderPath($baseFolderPath)
	{
		$this->baseFolderPath = (string) $baseFolderPath;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBaseFolderPath()
	{
		return $this->baseFolderPath;
	}

	/**
	 * @param string $folderPath
	 * @return $this
	 */
	public function setFolderPath($folderPath)
	{
		$this->folderPath = (string) $folderPath;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFolderPath()
	{
		return $this->folderPath;
	}

	/**
	 * @return string
	 */
	public function getFullPath()
	{
		return $this->filePathHelpers->joinPaths($this->baseFolderPath, $this->getFolderPath());
	}
}