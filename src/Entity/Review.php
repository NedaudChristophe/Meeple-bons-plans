<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api_deals_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_reviews_browse","api_reviews_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"api_shops_browse"})
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_reviews_browse","api_reviews_read"})
     */
    private $vote;

    
    
    /**
     * @ORM\ManyToOne(targetEntity=Deal::class, inversedBy="reviews",cascade={"persist"}))
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_reviews_browse","api_reviews_read"})
     */
    private $deal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reviews",cascade={"persist"}))
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_deals_read"})
     * @Groups({"api_reviews_browse","api_reviews_read"})
     * @Groups({"api_deals_browse"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVote(): ?int
    {
        return $this->vote;
    }

    public function setVote(int $vote): self
    {
        $this->vote = $vote;

        return $this;
    }

   

    

    public function getDeal(): ?Deal
    {
        return $this->deal;
    }

    public function setDeal(?Deal $deal): self
    {
        $this->deal = $deal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
