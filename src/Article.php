<?php
/**
 * Created by PhpStorm.
 * user: justine
 * Date: 05/01/2015
 * Time: 15:27
 */

namespace Cartman\Init;

/**
 * Class Article
 * @package Cartman\Init
 *
 * @entity
 * @table (name="article")
 */
class Article
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @Column(name="title", type="string", length=60)
     */
    private $title;
    /**
     * @var int
     *
     * @Column(name="status", type="smallint")
     */
    private $status;

        const STATUS_PENDING = 0;
        const STATUS_VALIDATED = 1;
        const STATUS_REMOVED = 2;
    /**
     * @var string
     *
     * @Column(name="slug", type="string", length=60)
     */
    private $slug;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $title
     *
     * @throws \Exception
     *
     * @return Article
     */
    public function setTitle($title)
    {
        if(is_string($title))
            $this->title=$title;
        else
            throw new \Exception('Title must be a string');
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @throws \Exception
     * @return Article
     */
    public function setStatus($status)
    {
        if (TRUE == in_array($status, [
                self::STATUS_PENDING, self:: STATUS_VALIDATED,  self::STATUS_REMOVED
        ]))
            $this->status = $status;
        else
            throw new \Exception('Status is not valid');
        return $this;

    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @throws \Exception
     *
     * @return Article
     */
    public function setSlug($slug)
    {
        if(is_string($slug))
            $this->slug = $slug;
        else
            throw new \Exception ('Slug must be a string');
        return $this;
    }


} 