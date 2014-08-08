<?php
/**
 * TwigHAMLEngine - Twig and MtHaml integration for WordPress templates
 *
 * @author Andrea Rota <a@xelera.eu>
 * @license AGPL-3.0
 * @copyright 2014 Xelera
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace SemanticWP\Templating;

class TwigHAMLEngine {
  /**
   * @var Object $engine The Twig environment
   */
  protected $engine;

  /**
   * @param string $template_roots The full paths to all template roots
   */
  function __construct($template_roots = []) {
    // If no template roots are provided and this class is used within
    // a WordPress theme or plugin, set a default template root
    if(empty($template_roots) and function_exists('get_stylesheet_directory')) {
      $template_roots = get_stylesheet_directory() . '/templates';
    }

    // Initialize environments, loaders, etc.
    $haml = new \MtHaml\Environment('twig', [ 'enable_escaper' => false ]);

    $loader = new \Twig_Loader_Filesystem([
      $template_roots
    ]);

    $hamlLoader = new \MtHaml\Support\Twig\Loader($haml, $loader);

    $this->engine = new \Twig_Environment($hamlLoader);

    $this->engine->addExtension(new \MtHaml\Support\Twig\Extension($haml));
  }

  /**
   * Load and render a Twig+MtHaml template
   * @param string $template_file Path to the HAML template file (relative
   *        to the template root)
   * @param mixed $template_data Data structure to pass to the template
   *        renderer
   * @return string The rendered template
   */
  function render_template($template_file, $data) {
    return $this->engine->render($template_file, $data);
  }
}
