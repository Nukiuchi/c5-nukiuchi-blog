<?php

namespace Concrete\Package\NukiuchiBlog\Src\Entity;

// Source: https://www.concrete5.org/documentation/developers/5.7/packages/custom-database-tables-in-packages/doctrine-orm-entities/

/**
 * @Entity
 * @HasLifecycleCallbacks
 * @Table(name="NukiuchiBlogEntries")
 */
class BlogEntry {
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Column(type="string", nullable=false)
     */
    protected $title;
    
    /**
     * @Column(type="string")
     */
    protected $content;
    
    /**
     * @ManyToOne(targetEntity="BlogInstance", inversedBy="entries")
     */
    protected $instance;
    
    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $added;
    
    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $updated;
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getInstance() {
        return $this->instance;
    }

    public function getAdded() {
        return $this->added;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setInstance($instance) {
        $this->instance = $instance;
    }

    public function setAdded($added) {
        $this->added = $added;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
    }

    
    /**
     * @PrePersist()
     */
    public function onPersist() {
        $this->added(new \DateTime("now"));
        $this->updated(new \DateTime("now"));
    }
    
    /**
     * @PreUpdate()
     */
    public function onUpdate() {
        $this->updated(new \DateTime("now"));
    }
}
