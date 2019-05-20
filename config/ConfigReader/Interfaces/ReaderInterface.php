<?php

namespace Config\ConfigReader\Interfaces;

interface ReaderInterface
{
	public function start(): void;
	public function read(): array;
	public function stop(): void;
}