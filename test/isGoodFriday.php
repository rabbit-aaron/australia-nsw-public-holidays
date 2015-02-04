<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testNotGoodFriday0(){
    assert(!isGoodFriday(new DateTime('2015-02-10')));
}

testNotGoodFriday0();
function testIsGoodFriday0(){
    assert(isGoodFriday(new DateTime('2015-04-03')));
}

testIsGoodFriday0();

function testIsGoodFriday1(){
    assert(isGoodFriday(new DateTime('2016-03-25')));
}

testIsGoodFriday1();

function testIsGoodFriday2(){
    assert(isGoodFriday(new DateTime('2017-04-14')));
}

testIsGoodFriday2();

function testIsGoodFriday3(){
    assert(isGoodFriday(new DateTime('2000-04-21')));
}

testIsGoodFriday3();
