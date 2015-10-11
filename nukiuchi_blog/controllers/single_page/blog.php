<?php

namespace Concrete\Package\NukiuchiBlog\Controller\SinglePage;

use Concrete\Core\Page\Controller\PageController;
use Concrete\Package\NukiuchiBlog\Src\Service\BlogService;

use Concrete\Package\NukiuchiBlog\Src\Entity\BlogInstance;
use Concrete\Package\NukiuchiBlog\Src\Entity\BlogEntry;

class Blog extends PageController {
    /* @var blogService BlogService */
    private $blogService = null;
    
    public function __construct(\Concrete\Core\Page\Page $c) {
        parent::__construct($c);
        
        // Source: https://gist.github.com/Kaapiii/fe892b5a95b4a4f61280
        $this->blogService = new BlogService(\ORM::entityManager());
    }
    
    public function view() {
        $this->set("TODO", "STILL SOMETHING TO DO: VIEW");
    }
    
    public function add() {
        $this->set("TODO", "STILL SOMETHING TO DO: ADD");
    }
    
}
