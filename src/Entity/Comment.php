<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api_deals_read"})
     * @Groups({"api_comments_read","api_comments_browse" })
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api_deals_read"})
     * @Groups({"api_comments_read","api_comments_browse" })
     */
    private $comment;

    /**
     * @ORM\Column(type="date")
     * @Groups({"api_deals_read"})
     * @Groups({"api_comments_read","api_comments_browse" })
     */
    private $createdAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"api_deals_read"})
     * @Groups({"api_comments_read","api_comments_browse" })
     */
    private $updatedAt;

    
    /**
     * @ORM\ManyToOne(targetEntity=Deal::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_comments_read","api_comments_browse" })
     */
    private $deal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_comments_read","api_comments_browse" })
     * @Groups({"api_deals_read"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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
