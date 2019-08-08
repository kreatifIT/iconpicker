<?php

if (rex::isBackend()) {
    $font_path = $this->getAssetsPath('fonts');
    $fonts     = glob($font_path . '/*/');

    foreach ($fonts as $font_folder) {
        if (file_exists($font_folder . 'config.js')) {
            $font_name = array_pop(explode('/', trim($font_folder, '/')));
            $css_files = glob($font_folder . 'css/*.css');

            foreach ($css_files as $css_file) {
                $_file = array_pop(explode('/', $css_file));
                rex_view::addCssFile($this->getAssetsUrl('fonts/' . $font_name . '/css/' . $_file));
            }

            rex_view::addJsFile($this->getAssetsUrl('fonts/' . $font_name . '/config.js'));
        }
    }

    rex_view::addCssFile($this->getAssetsUrl('vendor/iconpicker/css/fontawesome-iconpicker.css'));
    rex_view::addJsFile($this->getAssetsUrl('vendor/iconpicker/js/fontawesome-iconpicker.js'));
    rex_view::addCssFile($this->getAssetsUrl('iconpicker.css'));
    rex_view::addJsFile($this->getAssetsUrl('iconpicker.js'));
}
