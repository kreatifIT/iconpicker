<?php

if (rex::isBackend()) {
    $compile   = $this->getProperty('compile');
    $font_path = $this->getAssetsPath('fonts');
    $fonts     = glob($font_path . '/*/');

    if ($compile) {
        rex_file::copy(__DIR__ .'/assets/iconpicker.js', $this->getAssetsPath('iconpicker.js'));
        rex_file::copy(__DIR__ .'/assets/iconpicker.css', $this->getAssetsPath('iconpicker.css'));
        rex_file::copy(__DIR__ .'/assets/fonts/fontawesome/config.js', $this->getAssetsPath('fonts/fontawesome/config.js'));
        rex_file::copy(__DIR__ .'/assets/vendor/iconpicker/css/fontawesome-iconpicker.css', $this->getAssetsPath('vendor/iconpicker/css/fontawesome-iconpicker.css'));
        rex_file::copy(__DIR__ .'/assets/vendor/iconpicker/js/fontawesome-iconpicker.js', $this->getAssetsPath('vendor/iconpicker/js/fontawesome-iconpicker.js'));
    }

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
