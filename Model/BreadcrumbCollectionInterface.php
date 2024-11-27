<?php

namespace Thormeier\BreadcrumbBundle\Model;

/**
 * Class BreadcrumbCollectionInterface
 */
interface BreadcrumbCollectionInterface
{

    public function addBreadcrumb(BreadcrumbInterface $breadcrumb): static;


    public function addBreadcrumbBeforeCrumb(BreadcrumbInterface $newBreadcrumb, BreadcrumbInterface $positionBreadcrumb): static;


    public function addBreadcrumbAfterCrumb(BreadcrumbInterface $newBreadcrumb, BreadcrumbInterface $positionBreadcrumb): static;


    public function addBreadcrumbAtPosition(BreadcrumbInterface $breadcrumb, $position): static;


    public function addBreadcrumbToStart(BreadcrumbInterface $breadcrumb): static;

    public function getAll(): array;

    public function getBreadcrumbByRoute(string $route): ?BreadcrumbInterface;
}
