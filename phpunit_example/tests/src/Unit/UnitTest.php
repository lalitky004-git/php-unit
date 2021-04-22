<?php

namespace Drupal\Tests\phpunit_example\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\phpunit_example\Unit;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;

if(!\defined('AR')){
  \define('AR','ar');
}
if(!\defined('EN')){
  \define('EN','en');
}


/**
 * Simple test to ensure that asserts pass.
 *
 * @group phpunit_example
 */
class UnitTest extends UnitTestCase {

  protected $unit;
  private $container;

  /**
   * Before a test method is run, setUp() is invoked.
   * Create new unit object.
   */
  public function setUp():void {
    parent::setUp();
    $this->container = new ContainerBuilder();
    \Drupal::setContainer($this->container);
    $this->unit = new Unit();
  }

  /**
   * Test locale without uri
   * @covers Drupal\phpunit_example\Unit::getLocale
   */
  public function testGetLocaleDefault() {
    $requestStack = new RequestStack();
    $request = new Request();
    $requestStack->push($request);
    $this->container->set('request_stack',$requestStack);
    $this->assertEquals('ar',$this->unit->getLocale(''));
  }
  /**
   * Test locale with uri
   * @covers Drupal\phpunit_example\Unit::getLocale
   */
  // public function testGetLocaleWithUri(){
  //   $requestStack = new RequestStack();
  //   $request = new Request();
  //   $requestStack->push($request);
  //   $this->container->set('request_stack',$requestStack);
  //   $this->assertEquals('ar',$this->unit->getLocale('/ar/home'));
  //   $this->assertEquals('en',$this->unit->getLocale('/en/home'));
  // }

  /**
   * Once test method has finished running, whether it succeeded or failed, tearDown() will be invoked.
   * Unset the $unit object.
   */
  public function tearDown() {
    unset($this->unit);
  }

}