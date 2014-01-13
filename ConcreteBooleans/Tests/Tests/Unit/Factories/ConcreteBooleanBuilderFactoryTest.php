<?php
namespace ConcreteBooleans\Tests\Tests\Unit\Factories;
use ConcreteBooleans\Infrastructure\Factories\ConcreteBooleanBuilderFactory;
use ConcretePrimitives\Infrastructure\Builders\ConcretePrimitiveBuilder;

class ConcreteBooleanBuilderFactoryTest extends \PHPUnit_Framework_TestCase {
    
    private $objectLoaderAdapterMock;
    private $factory;
    private $builder;
    public function setUp() {
        $this->objectLoaderAdapterMock = $this->getMock('ObjectLoaders\Domain\ObjectLoaders\Adapters\ObjectLoaderAdapter');
        $this->factory = new ConcreteBooleanBuilderFactory($this->objectLoaderAdapterMock);
        $this->builder = new ConcretePrimitiveBuilder($this->objectLoaderAdapterMock, 'Booleans\Domain\Booleans\Boolean');
    }
    
    public function tearDown() {
        $this->objectLoaderAdapterMock = null;
        $this->factory = null;
        $this->builder = null;
    }
    
    public function testCreateBuilder_Success() {
        
        $builder = $this->factory->create();
        $this->assertEquals($this->builder, $builder);
        
    }
    
    public function testConcreteClassIsFinal_Success() {
        
        $reflectionClass = new \ReflectionClass(get_class($this->factory));
        $this->assertTrue($reflectionClass->isFinal());
        
    }
    
    public function testImplementsRightInterface_Success() {
        
        $this->assertTrue($this->factory instanceof \Booleans\Domain\Booleans\Builders\Factories\BooleanBuilderFactory);
        
    }
}