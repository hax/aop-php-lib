--TEST--
Issue 58 on GitHub
--FILE--
<?php

class Form {

    public function render(array $aParams = array()) {
        return 'foo';
    }
}

class Csrf {
    public function aroundFormRender(\AopJoinpoint $joinpoint) {
       throw new Exception('bar');
    }
}

$oForm = new Form();
$oCsrf = new Csrf();
aop_add_around('Form->render()', array($oCsrf, 'aroundFormRender'));
echo $oForm->render();
echo 'bar';
--EXPECTF--
Fatal error: Uncaught exception 'Exception' with message 'bar' in %s010.php:12%sbar


