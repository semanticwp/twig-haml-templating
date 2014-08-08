<?php

namespace SemanticWP;

class Templating {
  /**
   * Thin wrapper for SemanticWP's Twig+MtHaml templating, meant to be
   * an almost-drop-in replacement for WordPress' get_template_part()
   *
   * TODO: look for templates up the starter theme chain (e.g. final
   * theme, foundoots, roots)
   */
  static function get_template_part($template_file, $data) {
    $engine = new Templating\TwigHAMLEngine();
    echo $engine->render_template($template_file . '.haml', $data);
  }
}
