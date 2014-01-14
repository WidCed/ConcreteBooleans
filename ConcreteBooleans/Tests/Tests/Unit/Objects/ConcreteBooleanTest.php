<?php
namespace ConcreteBooleans\Tests\Tests\Unit\Objects;
use ConcreteBooleans\Infrastructure\Objects\ConcreteBoolean;
use Primitives\Domain\Primitives\Exceptions\CannotCreatePrimitiveException;

class ConcreteBooleanTest extends \PHPUnit_Framework_TestCase {
    
    public function setUp() {
        
    }
    
    public function tearDown() {
        
    }
    
    public function testCreateBoolean_withTrue_Success() {
        
        $boolean = new ConcreteBoolean(true);
        $this->assertTrue($boolean->get());
        $this->assertTrue($boolean->isTrue());
    }
    
    public function testCreateBoolean_withFalse_Success() {
        
        $boolean = new ConcreteBoolean(false);
        $this->assertFalse($boolean->get());
        $this->assertFalse($boolean->isTrue());
    }
    
    public function testCreateBoolean_withNullElement_throwsCannotCreatePrimitiveException() {
        
        $asserted = false;
        try {
            new ConcreteBoolean(null);
            
        } catch (CannotCreatePrimitiveException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
    }
    
    public function testCreateBoolean_withNonBooleanElement_throwsCannotCreatePrimitiveException() {
        
        $asserted = false;
        try {
            new ConcreteBoolean('non-boolean');
            
        } catch (CannotCreatePrimitiveException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
    }
    
    public function testConcreteClassIsFinal_Success() {
        
        $reflectionClass = new \ReflectionClass('ConcreteBooleans\Infrastructure\Objects\ConcreteBoolean');
        $this->assertTrue($reflectionClass->isFinal());
        
    }
    
    public function testImplementsRightInterface_Success() {
        
        $boolean = new ConcreteBoolean(false);
        $this->assertTrue($boolean instanceof \Booleans\Domain\Booleans\Boolean);
        
    }
}