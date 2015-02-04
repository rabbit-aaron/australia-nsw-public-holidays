<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testNotEasterMonday0(){
    assert(!isEasterMonday(new DateTime('2015-04-03')));
}

testNotEasterMonday0();

function testIsEasterMonday0(){
    assert(isEasterMonday(new DateTime('2015-04-06')));
}

testIsEasterMonday0();

function testIsEasterMonday1(){
    assert(isEasterMonday(new DateTime('2006-04-17')));
}

testIsEasterMonday1();

function testIsEasterMonday2(){
    assert(isEasterMonday(new DateTime('2020-04-13')));
}

testIsEasterMonday2();
