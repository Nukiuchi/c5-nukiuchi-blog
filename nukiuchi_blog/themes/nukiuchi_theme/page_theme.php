<?php

namespace Concrete\Package\NukiuchiBlog\Theme\NukiuchiTheme;

use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme {
    protected $pThemeGridFrameworkHandle = 'bootstrap3';
    
    public function registerAssets() {
        parent::registerAssets();
        
        $this->requireAsset('javascript', 'jquery');
        $this->requireAsset('javascript', 'jquery-ui');
        $this->requireAsset('css', 'jquery-ui');
        $this->providesAsset('css', 'bootstrap');
        $this->providesAsset('css', 'bootstrap-theme');
        $this->providesAsset('javascript', 'bootstrap');
    }
}
