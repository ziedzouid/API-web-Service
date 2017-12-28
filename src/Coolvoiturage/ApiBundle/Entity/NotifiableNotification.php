<?php

namespace Coolvoiturage\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotifiableNotification
 *
 * @ORM\Table(name="notifiable_notification", indexes={@ORM\Index(name="IDX_ADCFE0FAEF1A9D84", columns={"notification_id"}), @ORM\Index(name="IDX_ADCFE0FAC3A0A4F8", columns={"notifiable_entity_id"})})
 * @ORM\Entity
 */
class NotifiableNotification
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
     * @ORM\Column(name="seen", type="boolean", nullable=false)
     */
    private $seen;

    /**
     * @var \Notifiable
     *
     * @ORM\ManyToOne(targetEntity="Notifiable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notifiable_entity_id", referencedColumnName="id")
     * })
     */
    private $notifiableEntity;

    /**
     * @var \Notification
     *
     * @ORM\ManyToOne(targetEntity="Notification")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notification_id", referencedColumnName="id")
     * })
     */
    private $notification;



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
     * Set seen
     *
     * @param boolean $seen
     *
     * @return NotifiableNotification
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }

    /**
     * Get seen
     *
     * @return boolean
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Set notifiableEntity
     *
     * @param \Coolvoiturage\ApiBundle\Entity\Notifiable $notifiableEntity
     *
     * @return NotifiableNotification
     */
    public function setNotifiableEntity(\Coolvoiturage\ApiBundle\Entity\Notifiable $notifiableEntity = null)
    {
        $this->notifiableEntity = $notifiableEntity;

        return $this;
    }

    /**
     * Get notifiableEntity
     *
     * @return \Coolvoiturage\ApiBundle\Entity\Notifiable
     */
    public function getNotifiableEntity()
    {
        return $this->notifiableEntity;
    }

    /**
     * Set notification
     *
     * @param \Coolvoiturage\ApiBundle\Entity\Notification $notification
     *
     * @return NotifiableNotification
     */
    public function setNotification(\Coolvoiturage\ApiBundle\Entity\Notification $notification = null)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return \Coolvoiturage\ApiBundle\Entity\Notification
     */
    public function getNotification()
    {
        return $this->notification;
    }
}
