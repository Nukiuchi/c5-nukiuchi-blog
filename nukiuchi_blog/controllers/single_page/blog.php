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
    
    public function view($blog = false) {
        $this->set('debug', true);
        $this->set('blog', $blog);
        
        if($blog) {
            // TODO: Get blog data.
        }
    }
    
    public function add_blog() {
        $u = new \User();
        
        if(is_object($u) && $u->isLoggedIn()) {
            $author = $u->getUserName();
            $name = $this->post('name');
            $descr = $this->post('descr');
            
            $blog = $this->blogService->addBlogInstance($name, $author, $descr);
            if(!is_null($blog)) {
                return $this->redirect('/blog/' . $author);
            } else {
                $this->set('error', 'Blog creation failed, no idea why. Please contact admin.');
            }
        } else {
            $this->set('error', 'Unauthorized to add blog.');
        }
        
    }
}
