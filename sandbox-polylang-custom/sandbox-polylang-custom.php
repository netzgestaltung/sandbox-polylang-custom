<?php
/**
 * Plugin Name: Sandbox Polylang custom extensions
 * Version: 1.0.0
 * Plugin URI: http://www.dev-themes.com
 * Description: Add filter and features to polylang
 * Author: Thomas Fellinger
 * Author URI: http://www.netzgestaltung.at
 * License: GPL v2
 * Copyright 2022  Thomas Fellinger  (email : office@netzgestaltung.at)
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Plugin setup hook
 * 
 * @since 1.0.0
 * @added 2023-01-20 Thomas Fellinger
 */
add_action('plugins_loaded', 'sandbox_polylang_custom');

function sandbox_polylang_custom(){
  
  // translate polylang strings
  add_action('admin_init', 'sandbox_string_translations');
  
  // filter lang-item names to shortnames
  add_filter('pll_the_languages_args', 'sandbox_lang_names');
}

/**
 * Add string translations to polylang settings
 * 
 * Helps you translating anything
 * 
 * @since 1.0.0
 * @added 2023-01-20 Thomas Fellinger
 * @todo  custom options page to add strings, currently edit here.
 */
function sandbox_string_translations(){
  $strings = array(
    'Ergebnisse anzeigen',
    'auf Twitter',
    'Please contact us for additional information',
    'contact-form-id',
    'Schließen',
    'Aktuelles',
    'Wir arbeiten zusammen bei',
    'Ausgangssituation / Problemlage',
    'Lösungsansatz',
    'Ergebnis',
    'Ansprechpartnerin Bewerbungen',
    'E-Mail senden',
    'Lesen Sie mehr',
    'Ihr Ansprechpartner für',
    'Thema',
    'Sprache',
    'Datum',
    'Datum/Uhrzeit',
    'Unsere nächsten',
    'finden wie folgt statt:',
    'Uhr',
    'Momentan sind keine',
    'geplant.',
    'services',
    'Read more',
    'Share',
    'Search',
    'Search for',
    'Download',
    'Deutsch',
    'Englisch',
    'Scroll down',
    'Alle anzeigen',
    'Weniger anzeigen',
    'Tel',
    'Fax',
    'E-Mail',
    'Webadresse',
  );
  if ( function_exists('pll_register_string') ) {
    foreach ( $strings as $string ) {
      pll_register_string('sandbox', $string, 'field-labels');
    }
  }
}

/**
 * filter lang-item names to shortnames
 * 
 * Displays DE|EN instead of Deutsch|Englisch in the language switch widget.
 *
 * @since 1.0.0
 * @added 2023-01-20 Thomas Fellinger
 */
function sandbox_lang_names($args) {
  if ( isset($args['show_names']) && isset($args['echo']) && $args['show_names'] === 1 && $args['echo'] === 1 ) {
    $args['display_names_as'] = 'slug';
  }
  return $args;
}
