<?php
namespace ConcreteBooleans\Infrastructure\Objects;
use Booleans\Domain\Booleans\Boolean;
use Primitives\Domain\Primitives\Primitive;
use Primitives\Domain\Primitives\Exceptions\CannotCreatePrimitiveException;
use ConcretePrimitives\Infrastructure\Objects\AbstractPrimitive;
use ConcreteClassAnnotationObjects\Infrastructure\Objects\ConcreteValue;

/**
* @ConcreteValue("get")
**/
final class ConcreteBoolean extends AbstractPrimitive implements Boolean {
    
    public function __construct($element) {
        
        if (!is_bool($element)) {
            throw new CannotCreatePrimitiveException('The element must be a boolean.');
        }
        
        parent::__construct($element);
    }
    
    public function isTrue() {
        return $this->get();
    }
    
}