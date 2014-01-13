<?php
namespace ConcreteBooleans\Infrastructure\Adapters;
use Booleans\Domain\Booleans\Adapters\BooleanAdapter;
use Booleans\Domain\Booleans\Builders\Factories\BooleanBuilderFactory;
use Primitives\Domain\Primitives\Builders\Exceptions\CannotBuildPrimitiveException;
use Primitives\Domain\Primitives\Adapters\Exceptions\CannotConvertElementToPrimitiveException;

final class ConcreteBooleanAdapter implements BooleanAdapter {
    
    private $booleanBuilderFactory;
    public function __construct(BooleanBuilderFactory $booleanBuilderFactory) {
        $this->booleanBuilderFactory = $booleanBuilderFactory;
    }
    
    public function convertElementToPrimitive($element) {
        
        try {
        
            $boolean = $this->booleanBuilderFactory->create()
                                                    ->create()
                                                    ->withElement($element)
                                                    ->now();

            return $boolean;
            
        } catch (CannotBuildPrimitiveException $exception) {
            throw new CannotConvertElementToPrimitiveException('There was an exception while building a Boolean object.', $exception);
        }
        
    }
    
}