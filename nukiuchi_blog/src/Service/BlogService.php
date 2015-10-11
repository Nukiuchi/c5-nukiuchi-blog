<?php

namespace Concrete\Package\NukiuchiBlog\Src\Service;


/*
 * Provides database functions
 */
class BlogService {
    
    protected $em;
    
    public function __construct($em) {
        $this->em = $em;
    }
    
    public function saveOrUpdate($entity, $detach = false) {
        if($entity->getId() > 0) {
            $this->em->merge($entity);
        } else {
            $this->em->persist($entity);
        }
        
        $this->em->flush();
        
        if($detach) {
            $this->em->detach($entity);
        }
        
        return $entity;
    }
    
    public function addBlogInstance($name, $author, $description) {
        $instance = new \Concrete\Package\NukiuchiBlog\Src\Entity\BlogInstance();
        
        if(!is_null($instance)) {
            $instance->setName($name);
            $instance->setAuthor($author);
            $instance->setDescription($description);
            
            // Dealt with in Entity
            //$instance->setAdded(new \DateTime("now"));
            //$instance->setUpdated(new \DateTime("now"));
            
            $this->em->persist($instance);
            $this->em->flush();
        }
        
        return $instance;
    }
    
    public function addBlogEntry($blogInstance, $title, $content) {
        $entry = new \Concrete\Package\NukiuchiBlog\Src\Entity\BlogEntry();
        
        if(!is_null($entry)) {
            $entry->setTitle($title);
            $entry->setContent($content);
            $entry->setInstance($blogInstance);
            
            // Dealt with in Entity
            //$entry->setAdded(new \DateTime("now"));
            //$entry->setUpdated(new \DateTime("now"));
            
            $this->em->persist($entry);
            $this->em->flush();
        }
        
        return $entry;
    }
    
    public function deleteInstance(\Concrete\Package\NukiuchiBlog\Src\Entity\BlogInstance $instance) {
        try {
            $this->deleteEntries($instance->getEntries());
            $this->em->remove($instance);
            $this->em->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Error deleting instance: ' . $ex) ;
        }
    }
    
    public function deleteEntry(\Concrete\Package\NukiuchiBlog\Src\Entity\BlogEntry $entry) {
        try {
            $this->em->remove($entry);
            $this->em->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Error deleting entry: ' . $ex) ;
        }
    }
    
    public function deleteEntries(\Doctrine\Common\Collections\ArrayCollection $entries) {
        try {
            foreach($entries as $entry) {
                $this->em->remove($entry);
            }
            $this->em->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Error deleting entries: ' . $ex) ;
        }
    }
    
}
