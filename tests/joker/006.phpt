--TEST--
Just a joker and test no bug with recursion
--FILE--
<?php 
/*
class A {
	public function test () {
		return "test";
	}
	public function test2 () {
		echo $this->test();
		return "test2";
	}
}

aop_add_around("*()", function ($pObj) {echo $pObj->getObject()->test(); return "[".$pObj->process()."]";});
$test = new A();
echo $test->test();
echo $test->test2();
*/
?>
--EXPECT--
