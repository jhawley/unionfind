<?php
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php');

use Hawley\UnionFind\Child;
use Hawley\UnionFind\UnionFind;

class TestOfUnionFind extends UnitTestCase {
    private $_children = array();
    private $uf;
    
    public function setUp() {
        for($i=0; $i<=9; ++$i) {
            $this->_children[] = new Child($i);
        }
        $this->uf = new UnionFind();
    }
    
    public function testUnion() {
        $this->uf->union($this->_children[1], $this->_children[0]);
        $this->assertEqual($this->_children[0]->getParent()->getLabel(), 1);
    }
    
    public function testDefaultFind() {
        $this->assertEqual($this->uf->find($this->_children[1])->getLabel(), 1);
    }
    
    public function testFindOneLevel() {
        $this->uf->union($this->_children[1], $this->_children[0]);
        $this->assertEqual($this->uf->find($this->_children[0])->getLabel(), 1);
    }
    
    public function testRank() {
        $this->uf->union($this->_children[1], $this->_children[0]);
        $this->uf->union($this->_children[2], $this->_children[1]);
        $this->assertEqual($this->uf->find($this->_children[0])->getLabel(), 1);
    }
    
    public function testFindMultipleLevels() {
        $this->uf->union($this->_children[1], $this->_children[0]);
        $this->uf->union($this->_children[3], $this->_children[2]);
        $this->uf->union($this->_children[3], $this->_children[1]);
        $this->assertEqual($this->uf->find($this->_children[0])->getLabel(), 3);
    }
    
    public function testRoot() {
        $this->uf->union($this->_children[1], $this->_children[0]);
        $this->uf->union($this->_children[3], $this->_children[2]);
        $this->uf->union($this->_children[2], $this->_children[0]);
        $this->assertEqual($this->uf->find($this->_children[0])->getLabel(), 3);
    }
}