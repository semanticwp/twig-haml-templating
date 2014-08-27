# SemanticWP Twig+HAML templating

This library makes it easy to use [Twig](http://twig.sensiolabs.org/)
templates, using [HAML](http://haml.info/) syntax, in WordPress themes.

## Quick start

Add `semanticwp/twig-haml-templating` to your `composer.json`:

  [...]

  "require" : {
    [...],
    "semanticwp/twig-haml-templating": "dev-develop"
  }

Write your theme templates using HAML syntax and Twig; you can mix legacy PHP
templates and Twig+HAML templates, so if you are migrating an existing theme to
Twig+HAML this can be done one template at a time.

To keep code and templates tidy, your PHP theme code should **only** deal with
data, never sending anything to output. Just build a PHP array containing all
the data that will be needed to fill the templates.

If your Twig+HAML templates are under the `/templates` folder relative to your
theme root, to process a template file `/templates/page.haml` using data from
an array `$page_data`:

  SemanticWP\Templating::get_template_part('/templates/page', $page_data));

(note the omission of the .haml file extension in the function call).

## License

Copyright (C) 2014 Xelera (<inbox@xelera.eu>)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
