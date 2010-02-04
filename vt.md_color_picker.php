<?php
/* ===========================================================================
ext.md_color_picker.php ---------------------------
A color picker Field Type for the ExpressionEngine control panel.
Requirements:
1) Brandon Kelly's FieldFrame extension
http://github.com/brandonkelly/bk.fieldframe.ee_addon/tree/master
2) jQuery (for the Control Panel; extension comes bundled with ExpressionEngine)
 
INFO ---------------------------
Developed by: Ryan Masuga, masugadesign.com
Created: Mar 10 2009
Last Mod: Mar 23 2009
SEE: README.textile
=============================================================================== */
if ( ! defined('EXT')) exit('Invalid file request');
 
class Md_color_picker extends Low_variables_type {
 
	var $info = array(
		'name' => 'MD Color Picker',
		'version' => '1.0.1',
		'desc' => 'Provides a color picker custom field',
		'docs_url' => 'http://masugadesign.com/the-lab/scripts/md-color-picker/',
		'versions_xml_url' => 'http://masugadesign.com/versions/'
	);
	
	var $assets = array(
		'js' => 'js/colorpicker.js',
		'css' => 'css/colorpicker.css'
	);
	
	// --------------------------------------------------------------------
 
	/**
	* Display Field
	*
	* @param string $field_name The field's name
	* @param mixed $field_data The field's current value
	* @param array $field_settings The field's settings
	* @return string The field's HTML
	*/
	function display_input($var_id, $var_data, $var_settings)
	{
		global $DSP;
		
		$this->insert_js('
			(function($){
				$(document).ready( function(){
					$("#var'.$var_id.'").ColorPicker({
						onSubmit: function(hsb, hex, rgb) {
							$("#var'.$var_id.'").val(hex);
						},
						onBeforeShow: function () {
							$(this).ColorPickerSetColor(this.value);
						}
					}).bind("keyup", function(){
						$(this).ColorPickerSetColor(this.value);
					});
				});
			})(jQuery);
		');
		
		return $DSP->input_text("var[{$var_id}]", $var_data, '6', '6', 'input', '60px', '', FALSE);
    }

 
/* END class */
}
/* End of file ft.md_color_picker.php */
/* Location: ./system/extensions/fieldtypes/md_color_picker/ft.md_color_picker.php */