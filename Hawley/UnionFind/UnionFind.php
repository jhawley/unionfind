<?php

namespace Hawley\UnionFind;

class UnionFind implements IUnionFind {
    public function find(IHasParent $x) {
        if($x->getParent()->getLabel() != $x->getLabel()) {
            $x->setParent($this->find($x->getParent()));
        }
        return $x->getParent();
    }
    
    public function union(IHasParent $x, IHasParent $y) {
        $xRoot = $this->find($x);
        $yRoot = $this->find($y);
        
        if($xRoot->getLabel() == $yRoot->getLabel()) {
            return;
        }
        
        // This prevents the depth of the tree from growing unless both trees
        //  have an equal depth
        if($x->getRank() < $y->getRank()) {
            $x->setParent($yRoot);
        } elseif($x->getRank() > $y->getRank()) {
            $y->setParent($xRoot);
        } else {
            $y->setParent($xRoot);
            $x->addRank();
        }
    }
}