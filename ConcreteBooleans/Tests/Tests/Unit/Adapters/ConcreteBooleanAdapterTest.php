<?php
namespace ConcreteBooleans\Tests\Tests\Unit\Adapters;
use ConcreteBooleans\Infrastructure\Adapters\ConcreteBooleanAdapter;
use Primitives\Domain\Primitives\Builders\Exceptions\CannotBuildPrimitiveException;
use Primitives\Domain\Primitives\Adapters\Exceptions\CannotConvertElementToPrimitiveException;
use Primitives\Tests\Helpers\PrimitiveBuilderFactoryHelper;

class ConcreteBooleanAdapterTest extends \PHPUnit_Framework_TestCase {
    
    private $booleanBuilderFactoryMock;
    private $primitiveBuilderMock;
    private $booleanMock;
    private $adapter;
    private $primitiveBuilderFactoryHelper;
    public function setUp() {
        
        $this->booleanBuilderFactoryMock = $this->getMock('Booleans\Domain\Booleans\Builders\Factories\BooleanBuilderFactory');
        $this->primitiveBuilderMock = $this->getMock('Primitives\Domain\Primitives\Builders\PrimitiveBuilder');
        $this->booleanMock = $this->getMock('Booleans\Domain\Booleans\Boolean');
        $this->adapter = new ConcreteBooleanAdapter($this->booleanBuilderFactoryMock);
        
        $this->primitiveBuilderFactoryHelper = new PrimitiveBuilderFactoryHelper($this, $this->primitiveBuilderMock, $this->booleanBuilderFactoryMock);
        
    }
    
    public function tearDown() {
        
        $this->booleanBuilderFactoryMock = null;
        $this->primitiveBuilderMock = null;
        $this->booleanMock = null;
        $this->adapter = null;
        $this->helper = null;
    }
    
    public function testConvertTrueToBoolean_Success() {
        
        $this->primitiveBuilderFactoryHelper->expectsPrimitiveBuilderFactory_Success($this->booleanMock, true);
        $boolean = $this->adapter->convertElementToPrimitive(true);
        $this->assertEquals($this->booleanMock, $boolean);
        
    }
    
    public function testConvertFalseToBoolean_Success() {
        
        $this->primitiveBuilderFactoryHelper->expectsPrimitiveBuilderFactory_Success($this->booleanMock, false);
        $boolean = $this->adapter->convertElementToPrimitive(false);
        $this->assertEquals($this->booleanMock, $boolean);
    }
    
    public function testConvertElementToBoolean_throwsCannotBuildPrimitiveException_throwsCannotConvertElementToPrimitiveException() {
        
        $this->primitiveBuilderFactoryHelper->expectsPrimitiveBuilderFactory_throwsCannotBuildPrimitiveException(true);
        $asserted = false;
        try {
            
            $this->adapter->convertElementToPrimitive(true);
            
        } catch (CannotConvertElementToPrimitiveException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
    }
    
}