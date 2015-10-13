<?php
class View_Vertical extends FormView {
    public function renderElement ($element) {
		if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
			$element->render();
            return;
		}
		if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
			$element->appendAttribute("class", "form-control");

        $element->setAttribute('placeholder', $element->getLabel());
		echo $element->render(), $this->renderDescriptions($element);
    }

	protected function renderLabel (Element $element) {
		$label = $element->getLabel();
		if(empty ($label))
            $label = '';
		echo '<label class="col-md-4 control-label" for="', $element->getAttribute("id"), '">';
		if ($element->isRequired())
			echo '<span class="required">* </span>';
		echo '</label>';
	}
}
