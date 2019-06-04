<?php
/**
 * Plugin Name: Woption demo
 * Plugin URI: https://github.com/bologer/Woption-Examples
 * Description: Woption example plugin.
 * Version: 0.1
 * Author: Woption
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WoptionLoader' ) ) {
	require __DIR__ . '/../woption/woption.php';
}

use Woption\Fields\Select;
use Woption\Fields\Color;
use Woption\Fields\Textarea;
use Woption\Fields\Checkbox;

/**
 * Class My_Plugin is a core plugin class.
 *
 * @author Alexander Teshabaev <sasha.tesh@gmail.com>
 */
class My_Plugin extends \Woption\OptionManager {

	public $menu_title = 'Menu title';
	public $page_title = 'Page title';

	protected $option_name = 'generic';
	protected $page_slug = 'my-plugin-page';

	/**
	 * {@inheritDoc}
	 */
	public function __construct () {
		parent::__construct();

		parent::init();
	}

	/**
	 * {@inheritDoc}
	 */
	public function init () {
		$form = $this->form();

		$form->add_section(
			$this->section_builder()
			     ->set_id( 'generic' )
			     ->set_title( 'Section #1' )
			     ->set_fields( [
				     ( new Select() )
					     ->set_id( 'select' )
					     ->set_title( 'Checkbox' )
					     ->set_description( 'Dropdown description' )
					     ->set_options( [
						     'opt1' => 'Option1',
						     'opt2' => 'Option2',
					     ] )
					     ->set_selected( 'opt2' ),
				     ( new Textarea() )
					     ->set_id( 'textarea' )
					     ->set_title( 'Textarea' )
					     ->set_description( 'Textarea description' )
					     ->set_rows( 10 ),

				     ( new Color() )
					     ->set_id( 'color' )
					     ->set_title( 'Color' )
					     ->set_description( 'Color description' )
					     ->set_field_attributes( [
						     'kek' => 1,
					     ] ),

				     ( new Checkbox() )
					     ->set_id( 'checkbox' )
					     ->set_title( 'Checkbox' )
					     ->set_description( 'Some checkbox' ),
			     ] )
		);

		$form->add_section(
			$this->section_builder()
			     ->set_id( 'other_section' )
			     ->set_title( 'Section #2' )
			     ->set_fields( [
				     ( new Textarea() )
					     ->set_id( 'other_section_textarea' )
					     ->set_title( 'Other Textarea' )
					     ->set_rows( 3 ),
			     ] )
		);
	}
}

new My_Plugin();