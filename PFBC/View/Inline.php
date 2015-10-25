<?php
class View_Inline extends FormView {
    protected $class = "form-inline";

    public function renderElement ($element) {
        if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
            $element->render();
            return;
        }
        if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
            $element->appendAttribute("class", "form-control");

        if ($this->noLabel) {
            $label = $element->getLabel();
            $element->setAttribute("placeholder", $label);
            $element->setLabel("");
        }

        echo '<div class="form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);
        echo $element->render(), $this->renderDescriptions($element);
        echo "</div> ";
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
