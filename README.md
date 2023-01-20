# sandbox-polylang-custom
Adds custom extensions to WordPress Polylang plugin.

v 1.0.0
action admin_init function sandbox_string_translations
// Add string translations to polylang settings
filter pll_the_languages_args function sandbox_lang_names
// Filter lang-item names to shortnames
// Displays DE|EN instead of Deutsch|Englisch in the language switch widget.
