<?php
namespace ConcreteBooleans\Infrastructure\Factories;
use Booleans\Domain\Booleans\Builders\Factories\BooleanBuilderFactory;
use ConcretePrimitives\Infrastructure\Builders\ConcretePrimitiveBuilder;
use ObjectLoaders\Domain\ObjectLoaders\Adapters\ObjectLoaderAdapter;

class ConcreteBooleanBuilderFactory implements BooleanBuilderFactory {
    
    private $objectLoaderAdapter;
    public function __construct(ObjectLoaderAdapter $objectLoaderAdapter) {
        $this->objectLoaderAdapter = $objectLoaderAdapter;
    }
    
    public function create() {
        return new ConcretePrimitiveBuilder($this->objectLoaderAdapter, 'Booleans\Domain\Booleans\Boolean');
    }
    
}