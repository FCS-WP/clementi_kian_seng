<?php

namespace ElementsKit_Lite\Modules\Widget_Builder\Controls;

defined( 'ABSPATH' ) || exit;

class Control_Type_Date_Time extends CT_Base {

	public function start_writing_conf( $file_handler, $conf ) {

		$ret = '';

		if ( ! empty( $conf->description ) ) {
			$ret .= "\t\t\t\t" . '\'description\' =>  esc_html( \'' . esc_html( $conf->description ) . '\' ),' . PHP_EOL;
		}

		if ( ! empty( $conf->default ) ) {
			$ret .= "\t\t\t\t" . '\'default\' =>  esc_html( \'' . esc_html( $conf->default ) . '\' ),' . PHP_EOL;
		}

		if ( ! empty( $conf->separator ) ) {
			$ret .= "\t\t\t\t" . '\'separator\' => \'' . esc_html( $conf->separator ) . '\' ,' . PHP_EOL;
		}

		if ( ! empty( $conf->classes ) ) {
			$ret .= "\t\t\t\t" . '\'classes\' => \'' . esc_html( $conf->classes ) . '\' ,' . PHP_EOL;
		}

		if ( isset( $conf->show_label ) ) {
			$ret .= "\t\t\t\t" . '\'show_label\' => ' . ( $conf->show_label == 1 ? 'true' : 'false' ) . ' ,' . PHP_EOL;
		}

		if ( isset( $conf->label_block ) ) {
			$ret .= "\t\t\t\t" . '\'label_block\' => ' . ( $conf->label_block == 1 ? 'true' : 'false' ) . ' ,' . PHP_EOL;
		}

		$ret .= "\t\t\t\t" . '\'picker_options\' => array(' . PHP_EOL;

		if ( ! empty( $conf->picker_options ) ) {

			foreach ( $conf->picker_options as $idx => $v_option ) {

				$exp = explode( ':', $v_option );

				// Check if $exp[1] is a boolean
				if (filter_var($exp[1], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null) {
					// If it's boolean, return the actual boolean value (true/false)
					$ret .= "\t\t\t\t\t" . '\'' . esc_html($exp[0]) . '\' => ' . (filter_var($exp[1], FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false') . ',' . PHP_EOL;
				} else {
					// Otherwise, return it as a string
					$ret .= "\t\t\t\t\t" . '\'' . esc_html($exp[0]) . '\' => \'' . esc_html($exp[1]) . '\',' . PHP_EOL;
				}
			}
		}

		$ret .= "\t\t\t\t" . ')' . PHP_EOL;

		return $ret;
	}
}
