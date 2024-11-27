<?php

namespace Thormeier\BreadcrumbBundle\Model;

/**
 * Breadcrumb collection that holds all breadcrumbs and allows special operations on it
 */
class BreadcrumbCollection implements BreadcrumbCollectionInterface
{
    /**
     * @var BreadcrumbInterface[] Array of breadcrumbs
     */
    private array $breadcrumbs = array();

    public function addBreadcrumb(BreadcrumbInterface $breadcrumb): static {
        $this->breadcrumbs[] = $breadcrumb;

        return $this;
    }


    public function addBreadcrumbBeforeCrumb(BreadcrumbInterface $newBreadcrumb, BreadcrumbInterface $positionBreadcrumb): static {
        return $this->addBreadcrumbAtPosition($newBreadcrumb, ($this->getBreadcrumbPosition($positionBreadcrumb)));
    }


    public function addBreadcrumbAfterCrumb(BreadcrumbInterface $newBreadcrumb, BreadcrumbInterface $positionBreadcrumb): static {
        return $this->addBreadcrumbAtPosition($newBreadcrumb, ($this->getBreadcrumbPosition($positionBreadcrumb) + 1));
    }

    /**
     * If $position is positive then the start of removed
     * portion is at that offset from the beginning of the
     * breadcrumbs. If $position is negative then it starts that
     * far from the end of the breadcrumbs.
     *
     * @param BreadcrumbInterface $breadcrumb
     * @param int                 $position
     *
     * @return $this
     */
    public function addBreadcrumbAtPosition(BreadcrumbInterface $breadcrumb, $position): static {
        array_splice($this->breadcrumbs, $position, 0, array($breadcrumb));

        return $this;
    }


    public function addBreadcrumbToStart(BreadcrumbInterface $breadcrumb): static {
        array_unshift($this->breadcrumbs, $breadcrumb);

        return $this;
    }

    /**
     * @return BreadcrumbInterface[]
     */
    public function getAll(): array {
        return $this->breadcrumbs;
    }

    /**
     * Get the first breadcrumb entry for $route from the breadcrumb tree for the current route.
     */
    public function getBreadcrumbByRoute(string $route): ?BreadcrumbInterface {
        foreach ($this->breadcrumbs as $breadcrumb) {
            if ($route === $breadcrumb->getRoute()) {
                return $breadcrumb;
            }
        }

        return null;
    }

    private function getBreadcrumbPosition(BreadcrumbInterface $breadcrumb): string|int {
        $position = array_search($breadcrumb, $this->breadcrumbs);

        if (false === $position) {
            throw new \InvalidArgumentException(sprintf(
                'Breadcrumb for route "%s" with label "%s" not found',
                $breadcrumb->getRoute(),
                $breadcrumb->getLabel()
            ));
        }

        return $position;
    }
}
