<?php

class SgmbAddNewSection
{
	public function init()
	{
		$data = $this->getData();
		$theme = isset($data['options'])?$data['options']['socialTheme']:SGMB_DEFAULT_THEME;
		SgmbAddNewSection::renderScripts($theme);
		$this->render();
	}

	public function render()
	{
		$data = $this->getData();
		require_once(SGMB_VIEW.'sgmb_buttons_create.php');
	}

	public static function createSelect($fieldName, $selectedKey, $data, $optionType, $buttonName = null, $showOptionsGroup = true, $classes)
	{
		if(@$data['options']['fontSize'] == '') {
			@$data['options']['fontSize'] = '14';
		}
		if(@$data['options']['sgmbDropdownLabelFontSize'] == '') {
			@$data['options']['sgmbDropdownLabelFontSize'] = '14';
		}
		$html = "<select  data-selectbox='".$fieldName."' name='".$fieldName."' class ='input-width-static ".$classes." js-social-btn-icon' data-social-button='".$buttonName."'";
		if($optionType == 'sgmbSelectedPosts' || $optionType == 'sgmbSelectedCustomPosts' ||  $optionType == 'sgmbSelectedPages' ||  $optionType == 'sgmbExcludedPosts') {
			$html .= "multiple='multiple'>";
		}
		else {
			$html .= ">";
		}
		foreach ($selectedKey as $key => $value) {
			if(!is_array($value)) {
				$html .= "<option value = '$value'" ;
				if($buttonName == 'fbLike' && $value == @$data['buttonOptions'][$buttonName][$optionType]) {
					$html .= "selected";
				}
				// if multi select element
				if($optionType == 'sgmbSelectedPosts' || $optionType == 'sgmbSelectedPages'  || $optionType == 'sgmbExcludedPosts') {
					if(@$data['options'][$optionType] != null) {
						foreach (@$data['options'][$optionType] as  $option) {
							if($option == $value) {
								$html .= "selected";
							}
						}
					}
					else {
						foreach ($selectedKey as $option) {
							if($option == $value) {
								$html .= "selected";
							}
						}
					}
				}
				elseif($value == @$data['options'][$optionType]) {
					$html .= "selected";
				}
				$html .= ">$value</option>";
			}
			else {
				if($optionType == 'sgmbSelectedCustomPosts') {
					$html .='<optgroup label="'.$key.'">';
				}
				if(SGMB_PRO == 0 && $showOptionsGroup == true) {
					$html .='<optgroup label="'.$key.'">';
				}
				foreach ($value as $option) {
					$html .= "<option value = '$option'" ;
					if(SGMB_PRO == 0 && $key == 'Pro' && $showOptionsGroup == true) {
						$html .= "disabled";
					}
					if($buttonName == 'fbLike' && $option == @$data['buttonOptions'][$buttonName][$optionType]) {
						$html .= "selected";
					}
					if($optionType == 'sgmbSelectedCustomPosts' ) {
						if(@$data['options'][$optionType] != null) {
							foreach (@$data['options'][$optionType] as $opt) {
								if($opt == $option) {
									$html .= "selected";
								}
							}
						}
						else {
							foreach ($value as $opt) {
								if($opt == $option) {
									$html .= "selected";
								}
							}
						}
					}
					if($option == @$data['options'][$optionType]) {
						$html .= "selected";
					}
					$html .= ">$option</option>";
				}
				if(SGMB_PRO == 0 && $showOptionsGroup == true) {
					$html .='</optgroup>';
				}
				if($optionType == 'sgmbSelectedCustomPosts' ) {
					$html .='</optgroup>';
				}
			}
		}
		$html .= "</select>";
		return $html;
	}

	public static function createMultiSelect($fieldName, $selectedKeys, $data, $classes)
	{
		$html = "<select  data-selectbox='".$fieldName."' class='".$classes."' multiple='multiple'>";

		foreach ($selectedKeys as $key => $value) {

			if(!is_array($value)) {
				$html .= "<option value = '$key'" ;
				// if multi select element
				if($fieldName == 'sgmbSelectedPosts' || $fieldName == 'sgmbSelectedPages' || $fieldName == 'sgmbExcludedPosts') {
					if(@$data['options'][$fieldName] != null) {
						foreach (@$data['options'][$fieldName] as  $option) {
							if($option == $key) {
								$html .= "selected";
							}
						}
					}
					else {
						foreach ($selectedKeys as $option) {
							if($option == $key) {
								$html .= "selected";
							}
						}
					}
				}
				elseif($value == @$data['options'][$fieldName]) {
					$html .= "selected";
				}
				$html .= ">$value</option>";
			}
		}
		$html .= "</select>";
		return $html;
	}

	public function getData()
	{
		$data = array();
		if (isset($_GET['id'])) {
			$id = intval(sanitize_text_field($_GET['id']));
			$result = SGMBButton::findById($id);
			if ($result) {
				$data['id'] = $result->getId();
				$data['title'] = $result->getTitle();
				$data['options'] = json_decode($result->getOptions(), true);
				$data['buttonOptions'] = json_decode($data['options']['buttons'],true);
				foreach ($data['buttonOptions'] as $key => $value) {
					$data['button'][] = $key;
				}
			}
		}
		return $data;
	}

	public function renderOptions($name)
	{
		$data = $this->getData();
		include_once(SGMB_VIEW.'option-pages/'.$name.'.php');
	}

	public static function renderScripts($themeType )
	{
		if($themeType == null) {
			$themeType = SGMB_DEFAULT_THEME;
		}
		wp_register_style('sgmb_dropdown_style', SGMB_URL.'css/widget/simple.dropdown.css');
		wp_enqueue_style('sgmb_dropdown_style');
		wp_register_style('sgmb_tab_theme_style', SGMB_URL.'css/themes/pepper-grinder/jquery-ui.css');
		wp_enqueue_style('sgmb_tab_theme_style');
		wp_register_style('sgmb_social1_style', SGMB_URL.'css/jssocial/font-awesome.min.css');
		wp_enqueue_style('sgmb_social1_style');
		wp_register_style('sgmb_social2_style', SGMB_URL.'css/jssocial/jssocials.css');
		wp_enqueue_style('sgmb_social2_style');
		wp_register_style('sgmb_widget_style', SGMB_URL.'css/widget/widget-style.css');
		wp_enqueue_style('sgmb_widget_style');
		wp_register_style('jssocials_theme_tm', SGMB_URL.'css/widget/jssocials-theme-'.$themeType.'.css');
		wp_enqueue_style('jssocials_theme_tm');
		wp_register_style('sgmb_quick-wizard',  SGMB_URL.'css/quick-wizard/quick-wizard.css');
		wp_enqueue_style('sgmb_quick-wizard');
		wp_register_style('sgmb_smart_wizard_vertical',  SGMB_URL.'css/quick-wizard/smart_wizard_vertical.css');
		wp_enqueue_style('sgmb_smart_wizard_vertical');
		wp_register_style('sgmb_button_animate',  SGMB_URL.'css/animate.css');
		wp_enqueue_style('sgmb_button_animate');
		wp_register_style('sgmb-radio-checkbox',  SGMB_URL.'css/sgmb-radio-checkbox.css');
		wp_enqueue_style('sgmb-radio-checkbox');
		wp_register_style('sgmb-modal',  SGMB_URL.'css/sgmb-modal.min.css');
		wp_enqueue_style('sgmb-modal');

		wp_register_script('sgmb-classWidget-scripts', SGMB_URL.'js/addNewSection/SGMBWidget.js', array('jquery', 'jquery-ui-tooltip'),null);
		wp_enqueue_script('sgmb-classWidget-scripts');
		wp_register_script('sgmb-classDrag-scripts', SGMB_URL.'js/addNewSection/SGMBButtonPanel.js', array('jquery'),null);
		wp_enqueue_script('sgmb-classDrag-scripts');
		wp_register_script('sgmb-class-scripts', SGMB_URL.'js/addNewSection/SGMB.js', array('jquery'),null);
		wp_enqueue_script('sgmb-class-scripts');
		wp_register_script('sgmb-dropdown-scripts', SGMB_URL.'js/simple.dropdown.js', array('jquery'),null);
		wp_enqueue_script('sgmb-dropdown-scripts');
		wp_register_script('sgmb-jssocial1-scripts', SGMB_URL.'js/jssocials.js', array('jquery'),null);
		wp_enqueue_script('sgmb-jssocial1-scripts');
		wp_register_script('sgmb-jssocial2-scripts', SGMB_URL.'js/jssocials.shares.js', array('jquery'),null);
		wp_enqueue_script('sgmb-jssocial2-scripts');
		wp_register_script('sgmb-classLive-scripts', SGMB_URL.'js/addNewSection/SGMBLivePreview.js', array('jquery'),null);
		wp_enqueue_script('sgmb-classLive-scripts');
		wp_register_script('sgmb-quick-wizard-scripts', SGMB_URL.'js/quick-wizard.js', array('jquery'),null);
		wp_enqueue_script('sgmb-quick-wizard-scripts');
		wp_register_script('sgmb-radio-checkbox', SGMB_URL.'js/sgmb-radio-checkbox.js', array('jquery'),null);
		wp_enqueue_script('sgmb-radio-checkbox');
		wp_register_script('sgmb-modal', SGMB_URL.'js/sgmb-modal.min.js', array('jquery'),null);
		wp_enqueue_script('sgmb-modal');
		wp_register_script('sgmb-sortable', SGMB_URL.'js/sgmb-sortable.js', array('jquery'),null);
		wp_enqueue_script('sgmb-sortable');
	}
}
