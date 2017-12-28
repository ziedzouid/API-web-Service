<?php

namespace Coolvoiturage\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageMetadata
 *
 * @ORM\Table(name="message_metadata", indexes={@ORM\Index(name="IDX_4632F005537A1329", columns={"message_id"}), @ORM\Index(name="IDX_4632F0059D1C3019", columns={"participant_id"})})
 * @ORM\Entity
 */
class MessageMetadata
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
     * @ORM\Column(name="is_read", type="boolean", nullable=false)
     */
    private $isRead;

    /**
     * @var \Message
     *
     * @ORM\ManyToOne(targetEntity="Message")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_id", referencedColumnName="id")
     * })
     */
    private $message;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isRead
     *
     * @param boolean $isRead
     *
     * @return MessageMetadata
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return boolean
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set message
     *
     * @param \Coolvoiturage\ApiBundle\Entity\Message $message
     *
     * @return MessageMetadata
     */
    public function setMessage(\Coolvoiturage\ApiBundle\Entity\Message $message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return \Coolvoiturage\ApiBundle\Entity\Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set participant
     *
     * @param \Coolvoiturage\ApiBundle\Entity\User $participant
     *
     * @return MessageMetadata
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
}
