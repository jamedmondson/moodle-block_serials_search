// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


ABOUT THIS BLOCK
=========================================
This block is a simple interface to using Summon®, the unified discovery
service from Serials Solutions® (http://www.serialssolutions.com/en/services/summon/).

This is a community-developed block. It is not an official integration.


INSTALL INSTRUCTIONS
=========================================
This block was created for/tested in Moodle 2.2 but it should work for 2.0+

1. Create a directory called "serials_search" in your "blocks" directory and
 copy all the  files for this module into the "serials_search" directory.
2. Log in to your Moodle site as an administrator and click on the "notifications"
 link in "Settings" block under "Site Administration".
3. You will be prompted to enter details including what your institution calls the
 service, and your institution- specific prefix for the service.

You can change the language strings used in the block (title, optional text to appear
before search box, advanced search text, about text) - please refer to
http://docs.moodle.org/22/en/Language_customization

If your institution has a particular logo associated with the service, you can override
the default icon in your theme(s) by saving the new image in the "themes" directory under
THEME_NAME/pix_plugins/block/serials_search/about.png
