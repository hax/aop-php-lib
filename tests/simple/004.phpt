--TEST--
Just an around method test (version with 2 Pointcuts)
--FILE--
<?php 

class mytest {
	public function test () {
		return "intest";
	}
}

aop_add_around("mytest::test()", function ($pObj) {return "{".$pObj->process()."}";});
aop_add_around("mytest::test()", function ($pObj) {return "[".$pObj->process()."]";});
$test = new mytest();
echo $test->test();

?>
--EXPECT--
{[intest]}
