<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bidweb\PaymentBundle\Entity;

/**
 * Description of PaymentDetails
 *
 * @author HAMMAMI
 */
use Doctrine\ORM\Mapping as ORM;

use Payum\Core\Model\ArrayObject;

/**
 * @ORM\Table(name="payum_payment_details")
 * @ORM\Entity
 */
class PaymentDetails extends ArrayObject
{
    public static $PENDING=0;
    public static $PAYED=1;
    public static $CANCLED=2;
    public static $OUT='OUT';
    public static $IN='IN';
    


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var integer $id
     */
    protected $id;

     /**
     *
     * @ORM\ManyToOne(targetEntity="\Bidweb\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="receiver_id", referencedColumnName="id")
     */
    private $receiver;

    /**
     *
     * @ORM\ManyToOne(targetEntity="\Bidweb\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    private $sender;
    
    /**
     * @var string
     *
     * @ORM\Column(name="currency_code", type="string", length=255, nullable=true)
     */
    private $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var float
     *
     * @ORM\Column(name="total_amount", type="float", nullable=true)
     */
    private $totalAmount;
    
    /**
     * @var float
     *
     * @ORM\Column(name="fee", type="float", nullable=true)
     */
    private $fee;
    
    /**
     * @var float
     *
     * @ORM\Column(name="net_total_amount", type="float", nullable=true)
     */
    private $netTotalAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="client_email", type="text", nullable=true)
     */
    private $clientEmail;

   
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status = 0;
    
        
    /**
     * @var string
     *
     * @ORM\Column(name="gateway_name", type="text", nullable=true)
     */
    private $gateway_name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="text", nullable=true)
     */
    private $type;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", nullable=true)
     */
    private $email;
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
     * Set currencyCode
     *
     * @param string $currencyCode
     *
     * @return PaymentDetails
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PaymentDetails
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PaymentDetails
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return PaymentDetails
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set totalAmount
     *
     * @param integer $totalAmount
     *
     * @return PaymentDetails
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return integer
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set clientEmail
     *
     * @param string $clientEmail
     *
     * @return PaymentDetails
     */
    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    /**
     * Get clientEmail
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return PaymentDetails
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set receiver
     *
     * @param \Bidweb\UserBundle\Entity\User $receiver
     *
     * @return PaymentDetails
     */
    public function setReceiver(\Bidweb\UserBundle\Entity\User $receiver = null)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return \Bidweb\UserBundle\Entity\User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set sender
     *
     * @param \Bidweb\UserBundle\Entity\User $sender
     *
     * @return PaymentDetails
     */
    public function setSender(\Bidweb\UserBundle\Entity\User $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \Bidweb\UserBundle\Entity\User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set gatewayName
     *
     * @param string $gatewayName
     *
     * @return PaymentDetails
     */
    public function setGatewayName($gatewayName)
    {
        $this->gateway_name = $gatewayName;

        return $this;
    }

    /**
     * Get gatewayName
     *
     * @return string
     */
    public function getGatewayName()
    {
        return $this->gateway_name;
    }

    /**
     * Set fee
     *
     * @param integer $fee
     *
     * @return PaymentDetails
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return integer
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Set netTotalAmount
     *
     * @param integer $netTotalAmount
     *
     * @return PaymentDetails
     */
    public function setNetTotalAmount($netTotalAmount)
    {
        $this->netTotalAmount = $netTotalAmount;

        return $this;
    }

    /**
     * Get netTotalAmount
     *
     * @return integer
     */
    public function getNetTotalAmount()
    {
        return $this->netTotalAmount;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return PaymentDetails
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return PaymentDetails
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
