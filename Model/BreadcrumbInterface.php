<?php

namespace Thormeier\BreadcrumbBundle\Model;

/**
 * Interface for type hinting and having a similar interface for custom implementations
 */
interface BreadcrumbInterface
{

    public function __construct(string $label, string $route, array $routeParameters = array(), array $labelParameters = array());


    public function getRoute(): string;


    public function getLabel(): string;


    public function setRouteParameters(array $routeParameters): static;


    public function setLabelParameters(array $labelParameters): static;


    public function getRouteParameters(): array;


    public function getLabelParameters(): array;
}
