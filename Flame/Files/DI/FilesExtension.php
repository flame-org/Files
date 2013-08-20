<?php
/**
 * Class FilesExtension
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 20.08.13
 */
namespace Flame\Files\DI;

use Flame\Modules\Extension\NamedExtension;
use Nette\Utils\Validators;

class FilesExtension extends NamedExtension
{

	/** @var array  */
	public $defaults = array(
		'paths' => array(
			'base' => '',
			'folder' => '/media/images'
		)
	);

	/**
	 * @return void
	 */
	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig($this->defaults);

		Validators::assert($config, 'array');
		Validators::assertField($config, 'paths', 'array');
		Validators::assertField($config['paths'], 'base', 'string');
		Validators::assertField($config['paths'], 'folder', 'string');

		$builder->addDefinition($this->prefix('filePathHelpers'))
			->setClass('Flame\Files\Helpers\FilePathHelpers');

		$builder->addDefinition($this->prefix('fileHelpers'))
			->setClass('Flame\Files\Helpers\FileHelpers');

		$builder->addDefinition($this->prefix('storage'))
			->setClass('Flame\Files\Config\Storage')
			->setArguments(array($this->prefix('@filePathHelpers'), $config['paths']['base'], $config['paths']['folder']));

		$builder->addDefinition($this->prefix('fileUploadSaver'))
			->setClass('Flame\Files\FileUploadSaver');

		$builder->addDefinition($this->prefix('fileDownloader'))
			->setClass('Flame\Files\FileDownloader');
	}

}