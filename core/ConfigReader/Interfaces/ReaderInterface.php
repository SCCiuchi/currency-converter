<?php

namespace Core\ConfigReader\Interfaces;

interface ReaderInterface
{
	public function export(): array;
	public function keys(): array;
	public function getSource(): array;
}