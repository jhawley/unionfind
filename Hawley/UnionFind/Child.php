<?php

namespace Hawley\UnionFind;

class Child implements IHasParent {
    private $parent;
    private $label;
    private $rank = 0;
    
    public function __construct($n) {
        $this->parent = $this;
        $this->label = $n;
    }
    
    public function setParent($x) {
        $this->parent = $x;
    }
    
    public function getParent() {
        return $this->parent;
    }
    
    public function getLabel() {
        return $this->label;
    }
    
    public function addRank() {
        $this->rank++;
    }
    
    public function getRank() {
        return $this->rank;
    }
}