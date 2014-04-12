<?php

namespace Hawley\UnionFind;

interface IHasParent {
    public function getParent();
    public function setParent($x);
    public function getLabel();
    public function addRank();
    public function getRank();
}