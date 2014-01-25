<?php
namespace ConcreteBooleans\Tests\Tests\Functional;
use ConcreteFunctionalTestHelpers\Tests\Helpers\ConcreteDependencyInjectionFunctionalTestHelper;
use ConcreteClassAnnotationObjects\Tests\Helpers\ConcreteClassAnnotationsFunctionalTestHelper;
use ConcreteClassAnnotationObjects\Infrastructure\Objects\ConcreteValue;

final class ConcreteBooleanTest extends \PHPUnit_Framework_TestCase {
    
    private $dependencyInjectionFunctionTestHelper;
    private $jsonFilePathElement;
    private $classAnnotationsData;
    private $classAnnotationsHelper;
    public function setUp() {
        
        $this->dependencyInjectionFunctionTestHelper = new ConcreteDependencyInjectionFunctionalTestHelper(__DIR__.'/../../../../vendor');
        
        $this->jsonFilePathElement = realpath(__DIR__.'/../../../../dependencyinjection.json');
        
        $this->classAnnotationsData = array(
            new ConcreteValue(array('value' => 'get'))
        );
        
        $this->classAnnotationsHelper = new ConcreteClassAnnotationsFunctionalTestHelper();
    }
    
    public function tearDown() {
        
    }
    
    public function testCreateObjects_Success() {
        
        $objectsData = $this->dependencyInjectionFunctionTestHelper->getMultipleFileDependencyInjectionApplication()->execute($this->jsonFilePathElement);
        
        $this->assertTrue($objectsData['irestful.concreteobjectloaders.adapter'] instanceof \ConcreteObjectLoaders\Infrastructure\Adapters\ConcreteObjectLoaderAdapter);
        $this->assertTrue($objectsData['irestful.concreteobjectloaders.builderfactory'] instanceof \ConcreteObjectLoaders\Infrastructure\Factories\ConcreteObjectLoaderBuilderFactory);
        $this->assertTrue($objectsData['builderfactory'] instanceof \ConcreteBooleans\Infrastructure\Factories\ConcreteBooleanBuilderFactory);
        
        $boolean = $objectsData['builderfactory']->create()
                                                    ->withElement(true)
                                                    ->now();
        
        $this->assertTrue($boolean instanceof \ConcreteBooleans\Infrastructure\Objects\ConcreteBoolean);
    }
    
    public function testAnnotations_Success() {
        
        $classAnnotationsData = $this->classAnnotationsHelper->getClassAnnotationsData('ConcreteBooleans\Infrastructure\Objects\ConcreteBoolean');
        
        $this->assertEquals($this->classAnnotationsData, $classAnnotationsData);
    }
}