<?php

namespace Concrete\Package\NukiuchiBlog;

defined('C5_EXECUTE') or die(_("Access denied."));

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Single;
use Concrete\Theme\Concrete\PageTheme;

class Controller extends Package {
    protected $pkgHandle = 'nukiuchi_blog';
    protected $appVersionRequired = '5.7';
    protected $pkgVersion = '0.2';
    
    protected $packageName = 'Nukiuchi\'s Blog';
    protected $pkgDescription = 'A blog page made by Nukiuchi.';
    
    public function getPackageDescription() {
        return t($this->pkgDescription);
    }
    public function getPackageName() {
        return t($this->pkgName);
    }
    
    public function install() {
        $pkg = parent::install();
        
        $theme = PageTheme::add('nukiuchi_theme', $pkg);
        
        $page = Single::add('/blog', $pkg);
        $page->setTheme($theme);
    }
}