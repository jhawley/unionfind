# Purpose
To provide a UnionFind data structure

# Notes
This implementation uses path compression and ranking to keep the tree depth minimal (for faster ->finds).  This implementation does lack the makeSet method; therefore, users are responsible for instantiating objects that support the IHasParent interface.

# Example
    for($i=0; $i<=9; ++$i) {
        $_children[] = new Child($i);
    }
    $uf = new UnionFind();
    $uf->union($_children[1], $_children[0]);
    $uf->union($_children[3], $_children[2]);
    $uf->union($_children[3], $_children[1]);
    $this->assertEqual($uf->find($_children[0])->getLabel(), 3);

# Installation
The autoload.php file requires a version of PHP that supports lambda expressions, but the rest should work under PHP 4.  To add / run tests, install simpletest in Hawley/UnionFind/tests/simpletest.

# License
Public domain without warranties