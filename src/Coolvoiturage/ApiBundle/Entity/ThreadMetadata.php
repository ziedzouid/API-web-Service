<?php

namespace Coolvoiturage\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ThreadMetadata
 *
 * @ORM\Table(name="thread_metadata", indexes={@ORM\Index(name="IDX_40A577C8E2904019", columns={"thread_id"}), @ORM\Index(name="IDX_40A577C89D1C3019", columns={"participant_id"})})
 * @ORM\Entity
 */
class ThreadMetadata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_participant_message_date", type="datetime", nullable=true)
     */
    private $lastParticipantMessageDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_message_date", type="datetime", nullable=true)
     */
    private $lastMessageDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="participant_id", referencedColumnName="id")
     * })
     */
    private $participant;

    /**
     * @var \Thread
     *
     * @ORM\ManyToOne(targetEntity="Thread")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="thread_id", referencedColumnName="id")
     * })
     */
    private $thread;



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
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return ThreadMetadata
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set lastParticipantMessageDate
     *
     * @param \DateTime $lastParticipantMessageDate
     *
     * @return ThreadMetadata
     */
    public function setLastParticipantMessageDate($lastParticipantMessageDate)
    {
        $this->lastParticipantMessageDate = $lastParticipantMessageDate;

        return $this;
    }

    /**
     * Get lastParticipantMessageDate
     *
     * @return \DateTime
     */
    public function getLastParticipantMessageDate()
    {
        return $this->lastParticipantMessageDate;
    }

    /**
     * Set lastMessageDate
     *
     * @param \DateTime $lastMessageDate
     *
     * @return ThreadMetadata
     */
    public function setLastMessageDate($lastMessageDate)
    {
        $this->lastMessageDate = $lastMessageDate;

        return $this;
    }

    /**
     * Get lastMessageDate
     *
     * @return \DateTime
     */
    public function getLastMessageDate()
    {
        return $this->lastMessageDate;
    }

    /**
     * Set participant
     *
     * @param \Coolvoiturage\ApiBundle\Entity\User $participant
     *
     * @return ThreadMetadata
     */
    public function setParticipant(\Coolvoiturage\ApiBundle\Entity\User $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \Coolvoiturage\ApiBundle\Entity\User
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set thread
     *
     * @param \Coolvoiturage\ApiBundle\Entity\Thread $thread
     *
     * @return ThreadMetadata
     */
    public function setThread(\Coolvoiturage\ApiBundle\Entity\Thread $thread = null)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \Coolvoiturage\ApiBundle\Entity\Thread
     */
    public function getThread()
    {
        return $this->thread;
    }
}
