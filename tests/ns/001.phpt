--TEST--
TU on namespace
--FILE--
<?php 
namespace ns1\ns2\ns3\ns4;
class mytest {
	public function test () {
		return 'test';
	}
}

aop_add_around('ns1\ns2\ns3\ns4\mytest::test()', 
function ($pObj) {
    return '1['.$pObj->process()."]\n"; 
});


aop_add_around('*\ns2\ns3\ns4\mytest::test()', 
function ($pObj) {
    return '2['.$pObj->process()."]\n"; 
});


aop_add_around('ns1\*\ns3\ns4\mytest::test()', 
function ($pObj) {
    return '3['.$pObj->process()."]\n"; 
});

aop_add_around('ns1\ns2\**\mytest::test()', 
function ($pObj) {
    return '4['.$pObj->process()."]\n"; 
});

aop_add_around('ns*\ns2\ns3\ns4\mytest::test()', 
function ($pObj) {
    return '5['.$pObj->process()."]\n"; 
});

aop_add_around('*1\ns2\ns3\ns4\mytest::test()', 
function ($pObj) {
    return '6['.$pObj->process()."]\n"; 
});


aop_add_around('ns1\ns2\*\mytest::test()', 
function ($pObj) {
    return '7['.$pObj->process()."]\n"; 
});
'TEST';
$test = new mytest();
echo $test->test();

?>
--EXPECT--
1[2[3[4[5[6[test]
]
]
]
]
]

