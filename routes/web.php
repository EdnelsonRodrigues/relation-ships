<?php

/*
* One To One
*/

$this->get('one-to-one', 'OneToOneController@oneToOne');
$this->get('one-to-one-inverso', 'OneToOneController@oneToOneInverso');
$this->get('one-to-one-insert', 'OneToOneController@oneToOneInsert');

Route::get('/', function () {
    return view('welcome');
});
