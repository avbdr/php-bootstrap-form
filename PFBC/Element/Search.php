<?php
class Element_Search extends Element_Textbox {
	protected $_attributes = array(
		"class" => "search-query",
	);
    protected $append = '<button class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>';
}
