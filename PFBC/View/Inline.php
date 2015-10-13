<?php
class View_Inline extends FormView {
	protected $class = "form-inline";


    public function renderFormStart () {
        $this->_form->appendAttribute("class", $this->class);
        $this->_form->getErrorView()->render();
        echo '<form role="form"', $this->_form->getAttributes(), "><!--csrftoken--><fieldset> ";
    }

    public function renderElement ($element) {
        if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
            $element->render();
            return;
        }
        if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
            $element->appendAttribute("class", "form-control");

        echo '<div class="form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);
        echo $element->render(), $this->renderDescriptions($element);
        echo "</div> ";
    }

    public function renderFormClose () {
        echo '</fieldset></form> ';
    }

    public function render ($onlyElement = null) {
        $this->renderFormStart();
        if ($onlyElement && $onlyElement == 'open')
            return;

        $elements = $this->_form->getElements();
        foreach ($elements as $element)
            $this->renderElement ($element);
        $this->renderFormClose();
    }

    protected function renderLabel (Element $element) {
        $label = $element->getLabel();
        if(empty ($label))
            $label = '';
        echo ' <label for="', $element->getAttribute("id"), '">';
        if ($element->isRequired())
            echo '<span class="required">* </span> ';
        echo $label, '</label> ';
    }
}
