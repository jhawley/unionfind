<?php

namespace Hawley\UnionFind;

interface IUnionFind {
    public function find(IHasParent $x);
    public function union(IHasParent $x, IHasParent $y);
}