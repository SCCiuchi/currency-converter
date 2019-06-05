<?php

namespace Core\Router\Interfaces;

interface RouterInterface
{
    public function addRoute(string $uri, \Closure $fn): void;

    public function hasRoute(string $uri): bool;

    public function run(): void;
}