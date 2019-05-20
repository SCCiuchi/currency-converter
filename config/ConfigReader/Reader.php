<?php

namespace Config\ConfigReader;

use Config\ConfigReader\Interfaces\ReaderInterface;
use Symfony\Component\Yaml\Yaml;

class Reader implements ReaderInterface
{
	/** @var ConfigReaderInterface */
	protected $yamlReader;
	protected $configPath;

	public function __construct()
	{

	}

	public function start(): void
	{
		$yamlParsed = Yaml::parse(file_get_contents(__DIR__.'/../../config.yml'));
		$yamlString = Yaml::dump($yamlParsed);

		var_dump($yamlString);
	}

	public function read(): array
	{
		
	}

	public function stop(): void
	{
		
	}
}