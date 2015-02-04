<?php

error_reporting(E_ALL);
require_once dirname(__FILE__).'/../holidays.php';

function testNotQueensBirthday0(){
    assert(!isQueensBirthday(new DateTime('2014-06-08')));
}

testNotQueensBirthday0();

function testIsQueensBirthday0(){
    assert(isQueensBirthday(new DateTime('2015-06-08')));
}

testIsQueensBirthday0();

function testIsQueensBirthday1(){
    assert(isQueensBirthday(new DateTime('2000-06-12')));
}

testIsQueensBirthday1();

function testIsQueensBirthday2(){
    assert(isQueensBirthday(new DateTime('2009-06-08')));
}

testIsQueensBirthday2();

function testIsQueensBirthday3(){
    assert(isQueensBirthday(new DateTime('2020-06-08')));
}

testIsQueensBirthday3();
