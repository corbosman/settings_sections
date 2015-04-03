<?php

/*
 +-----------------------------------------------------------------------+
 | Copyright (C) 2015, Cor Bosman                                        |
 |                                                                       |
 | Licensed under the GNU General Public License version 3 or            |
 | any later version with exceptions for skins & plugins.                |
 | See the README file for a full license statement.                     |
 |                                                                       |
 | PURPOSE:                                                              |
 |   add settings sections                                               |
 +-----------------------------------------------------------------------+
 | Author: Cor Bosman <cor@roundcu.be>                        |
 +-----------------------------------------------------------------------+
*/

/**
 * settings_sections plugin
 */
class settings_sections extends rcube_plugin
{

    public $task = 'settings';

    /**
     * initialize plugin
     */
    public function init()
    {
        $this->add_hook('preferences_sections_list',array($this, 'add_sections'));
        $this->add_hook('preferences_section_header',array($this, 'add_header'));
    }

    /**
     * @param $args
     * @return mixed
     */
    public function add_sections($args)
    {
        $this->add_texts('localization/', false);

        // add stylesheet
        $this->include_stylesheet($this->local_skin_path() . '/settings_sections.css');

        // load config
        $this->load_config();

        // get sections from config
        $sections = rcmail::get_instance()->config->get('settings_sections', array());

        // go trough all sections and add them
        foreach ($sections as $section => $options) {
            $args['list'][$section] = array(
                'id' => $section,
                'section' => Q($this->gettext($options['label']))
            );
        }

        return($args);
    }

    public function add_header($args)
    {
        $this->add_texts('localization/', false);

        // load config
        $this->load_config();

        // fetch the config
        $sections = rcmail::get_instance()->config->get('settings_sections', array());

        // what is the current section we're checking
        $current = $args['current'];

        // if we want a header, return a template with the name of the section
        if( isset($sections[$current]) && isset($sections[$current]['header']) && $sections[$current]['header']) {
            $args['header'] = rcmail::get_instance()->output->parse('settings_sections.'.$current, false, false);
        }
        return $args;
    }
}