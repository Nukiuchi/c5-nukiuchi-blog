<?php

namespace Concrete\Package\NukiuchiBlog\Src\Entity;

// Source: https://www.concrete5.org/documentation/developers/5.7/packages/custom-database-tables-in-packages/doctrine-orm-entities/

/**
 * @Entity
 * @HasLifecycleCallbacks
 * @Table(name="NukiuchiBlogInstances")
 */
class BlogInstance {
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Column(type="string", nullable=false)
     */
    protected $name;
    
    /**
     * @Column(type="string")
     */
    protected $description;
    
    /**
     * @Column(type="string", nullable=false)
     */
    protected $author;
    
    /**
     * @OneToMany(targetEntity="BlogEntry", mappedBy="product")
     */
    protected $entries;
    
    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $added;
    
    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $updated;
    
    public function __construct() {
        $this->entries = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getAdded() {
        return $this->added;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getEntries() {
        return $this->entries;
    }
      
    public function setName($name) {
        $this->name = $name;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setAdded($added) {
        $this->added = $added;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
   
    /**
     * @PrePersist()
     */
    public function onPersist() {
        $this->setAdded(new \DateTime("now"));
        $this->setUpdated(new \DateTime("now"));
    }
    
    /**
     * @PreUpdate()
     */
    public function onUpdate() {
        $this->setUpdated(new \DateTime("now"));
    }
}
