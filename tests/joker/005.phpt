--TEST--
Class in selector is partial with a Joker
--FILE--
<?php 
namespace test\truc;
class AECT {
	public function adminTest () {
		return "test";
	}

	public function adminTest2 () {
		return "test2";
	}

	public function test3 () {
		return "test3";
	}
}

aop_add_around("test\\truc\*::admin*()", function ($pObj) {return "[".$pObj->process()."]";});
$test = new AECT();
echo $test->adminTest();
echo $test->adminTest2();
echo $test->test3();

?>
--EXPECT--
[test][test2]test3
