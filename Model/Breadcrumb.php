<?php

namespace Thormeier\BreadcrumbBundle\Model;

/**
 * Single breadcrumb model
 */
class Breadcrumb implements BreadcrumbInterface {

    private string $label;

    private string $route;

    private array $routeParameters;

    private array $labelParameters;

    public function __construct(string $label, string $route, array $routeParameters = array(), array $labelParameters = array()) {
        $this->label = $label;
        $this->route = $route;
        $this->setRouteParameters($routeParameters);
        $this->setLabelParameters($labelParameters);
    }



    public function getRoute(): string {
        return $this->route;
    }


    public function getLabel(): string {
        return $this->label;
    }


    public function setRouteParameters(array $routeParameters): static {
        $this->routeParameters = $routeParameters;

        return $this;
    }


    public function setLabelParameters(array $labelParameters): static {
        $this->labelParameters = $labelParameters;

        return $this;
    }


    public function getRouteParameters(): array {
        return $this->routeParameters;
    }


    public function getLabelParameters(): array {
        return $this->labelParameters;
    }
}
