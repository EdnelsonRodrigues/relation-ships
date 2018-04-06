<?php

/*
* One To One
*/

$this->get('one-to-one', 'OneToOneController@oneToOne');
$this->get('one-to-one-inverso', 'OneToOneController@oneToOneInverso');
$this->get('one-to-one-insert', 'OneToOneController@oneToOneInsert');

/*
* One To Many
*/

$this->get('one-to-many', 'OneToManyController@oneToMany');
$this->get('many-to-one', 'OneToManyController@manyToOne');
$this->get('one-to-many-two', 'OneToManyController@oneToManyTwo');
$this->get('one-to-many-insert', 'OneToManyController@oneToManyInsert');
$this->get('one-to-many-insert-two', 'OneToManyController@oneToManyInsertTwo');

/*
* Has Many Through
*/

$this->get('has-many-through', 'OneToManyController@hasManyThrough');

/*
* Many to Many
*/

$this->get('many-to-many', 'ManyToManyController@manyToMany');
$this->get('many-to-many-inverso', 'ManyToManyController@manyToManyInverso');
$this->get('many-to-many-insert', 'ManyToManyController@manyToManyInsert');

/*
* Relacionamento Polimórfico
*/

$this->get('polimorficos', 'PolimorficoController@polimorfico');
$this->get('polimorficos-insert', 'PolimorficoController@polimorficoInsert');


Route::get('/', function () {
    return view('welcome');
});
