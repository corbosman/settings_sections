settings_sections
=================

With this plugin you create extra sections in your settings menu

Setup
-----
Copy the config.inc.php.sample to config.inc.php and edit the file.

The config should look like this:

```php
$rcmail_config['settings_sections'] = array(
    'mysection' => array(
        'label' => 'mysection',
        'header' => false
    )
);
```

The name of your section should be the array key, in this example 'mysection'.
Then set a label key for your section. This key refers to an entry in your localization file. See the localization/en_US.inc.sample.

If you want your section to have a header, set the header boolean to true. This will include a template with the name of your section at the very top of this section's preferences page. See skins/larry/templates/header.html.sample.

To give your section an icon you have to set up a css file. See skins/larry/settings_sections.css.sample as an example.

CONTACT
-------
Author:   Cor Bosman (cor@roundcu.be)

Bug reports through github (https://github.com/corbosman/settings_sections/issues)

LICENSE
-------

This plugin is distributed under the GNU General Public License Version 2.
Please read through the file LICENSE for more information about this license.