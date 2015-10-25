<?php
abstract class FormView extends Base {
    public $noLabel = false;
    protected $_form;
    protected $class = null;

    public function __construct(array $properties = null) {
        $this->configure($properties);
    }

    public function _setForm(Form $form) {
        $this->_form = $form;
    }

    /*jQuery is used to apply css entries to the last element.*/
    public function jQueryDocumentReady() {}

    public function render ($onlyElement = null) {
        if ($this->class)
            $this->_form->appendAttribute("class", $this->class);

        $this->_form->getErrorView()->render();
        echo '<form ', $this->_form->getAttributes(), "><!--csrftoken--><fieldset> ";
        if ($onlyElement && $onlyElement == 'open')
            return;

        $elements = $this->_form->getElements();
        foreach ($elements as $element)
            $this->renderElement ($element);
        $this->renderFormClose();
    }

    public function renderFormClose () {
        echo ' </fieldset></form> ';
    }

    public function renderCSS() {
        echo 'label span.required { color: #B94A48; }';
        echo 'span.help-inline, span.help-block { color: #888; font-size: .9em; font-style: italic; }';
    }

    protected function renderDescriptions($element) {
        $shortDesc = $element->getShortDesc();
        if(!empty($shortDesc))
            echo '<span class="help-inline">', $shortDesc, '</span>';;

        $longDesc = $element->getLongDesc();
        if(!empty($longDesc))
            echo '<span class="help-block">', $longDesc, '</span>';;
    }

    public function renderJS() {}

    protected function renderLabel(Element $element) {}
}
