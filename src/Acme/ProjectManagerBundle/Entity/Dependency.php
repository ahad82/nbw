<?php

namespace Acme\ProjectManagerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dependency
 */
class Dependency
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $taskId;

    /**
     * @var integer
     */
    private $onStatus;

    /**
     * @var integer
     */
    private $doStatus;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var \DateTime
     */
    private $updateDate;

    /**
     * @var string
     */
    private $createdBy;

    /**
     * @var string
     */
    private $updatedBy;
    /**
     * @var integer
     */
    private $deleted;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set taskId
     *
     * @param integer $taskId
     *
     * @return Dependency
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;

        return $this;
    }

    /**
     * Get taskId
     *
     * @return integer
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * Set onStatus
     *
     * @param integer $onStatus
     *
     * @return Dependency
     */
    public function setOnStatus($onStatus)
    {
        $this->onStatus = $onStatus;

        return $this;
    }

    /**
     * Get onStatus
     *
     * @return integer
     */
    public function getOnStatus()
    {
        return $this->onStatus;
    }

    /**
     * Set doStatus
     *
     * @param integer $doStatus
     *
     * @return Dependency
     */
    public function setDoStatus($doStatus)
    {
        $this->doStatus = $doStatus;

        return $this;
    }

    /**
     * Get doStatus
     *
     * @return integer
     */
    public function getDoStatus()
    {
        return $this->doStatus;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Dependency
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return Dependency
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return Dependency
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     *
     * @return Dependency
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
    /**
     * Get Deleted
     *
     * @return integer
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
    /**
     * Set Deleted
     *
     * @return integer
     */
    public function setDeleted()
    {
        return $this->deleted;
    }
}

