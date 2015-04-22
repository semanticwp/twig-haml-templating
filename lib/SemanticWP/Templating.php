<?php
/**
 * SemanticWP Templating - Better templating pipelines for efficient WordPress development
 *
 * @author Andrea Rota <a@xelera.eu>
 * @license AGPL-3.0+
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

namespace SemanticWP;

class Templating {
  /**
   * Thin wrapper for SemanticWP's Twig+MtHaml templating, meant to be
   * an almost-drop-in replacement for WordPress' get_template_part()
   *
   * TODO: look for templates up the starter theme chain (e.g. final
   * theme, foundoots, roots)
   */
  static function get_template_part($template_file, $data = []) {
    $engine = new Templating\TwigHAMLEngine();
    echo $engine->render_template($template_file . '.haml', $data);
  }
}
