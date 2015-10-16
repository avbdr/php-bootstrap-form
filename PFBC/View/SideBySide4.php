<?php
class View_SideBySide4 extends FormView {
    private $sharedCount = 0;

    public function renderElement ($element) {
        $element->bootstrapVersion = 4;
        if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
            $element->render();
            return;
        }
        if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
            $element->appendAttribute("class", "form-control");

        if (!$element->getAttribute("shared") || $this->sharedCount == 0)
            echo '<div class="row form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);

        $colSize = 'col-xs-12 col-md-8';
        if ($element->getAttribute ("shared")) {
            $sharedSize = $element->getAttribute("shared");
            $this->sharedCount += $sharedSize[strlen($sharedSize) - 1];
            $colSize = $element->getAttribute ("shared");
        }

        echo " <div class='$colSize'> ";
        echo $element->render(), $this->renderDescriptions($element);
        echo " </div> ";

        if (!$element->getAttribute("shared") || $this->sharedCount == 8) {
            $this->sharedCount = 0;
            echo " </div> ";
        }
    }

    protected function renderLabel (Element $element) {
        $label = $element->getLabel();
        if(empty ($label))
            $label = '';
        echo ' <label class="text-right-lg col-xs-12 col-md-4 form-control-label" for="', $element->getAttribute("id"), '">';
        if ($element->isRequired())
            echo '<span class="required">* </span>';
        echo $label, '</label> ';
    }

    public function renderCSS () {
        parent::renderCSS();
        echo '@media (min-width: 760px) { .text-right-lg { text-align: right !important; }}';
    }
}
