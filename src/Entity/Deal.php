<?php

namespace App\Entity;

use App\Repository\DealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DealRepository::class)
 */
class Deal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api_users_read"})
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_comments_read","api_comments_browse" })
     * @Groups({"api_reviews_browse","api_reviews_read"})
     * @Groups({"api_users_custom"})
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api_deals_browse"})
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_comments_read","api_comments_browse" })
     * @Groups({"api_reviews_browse","api_reviews_read"})
     * @Groups({"api_users_custom"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_users_custom"})
     * 
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_deals_browse"})
     * 
     */
    private $url;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"api_users_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_users_custom"})
     */
    private $offerPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"api_deals_read"})
     */
    private $shippingCost;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"api_deals_read"})
     */
    private $promoCode;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"api_deals_read"})
     */
    private $endDeal;

    /**
     * @ORM\Column(type="date")
     * @Groups({"api_users_read"})
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * 
     */
    private $createdAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"api_deals_read"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="deal", orphanRemoval=true)
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="deal", orphanRemoval=true)
     * @Groups({"api_deals_read"})
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="deals")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     */
    private $shop;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="deals")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="deals")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_users_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     */
    private $game;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="deals")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_deals_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_categories_read"})
     */
    private $user;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getOfferPrice(): ?float
    {
        return $this->offerPrice;
    }

    public function setOfferPrice(?float $offerPrice): self
    {
        $this->offerPrice = $offerPrice;

        return $this;
    }

    public function getShippingCost(): ?float
    {
        return $this->shippingCost;
    }

    public function setShippingCost(?float $shippingCost): self
    {
        $this->shippingCost = $shippingCost;

        return $this;
    }

    public function getPromoCode(): ?string
    {
        return $this->promoCode;
    }

    public function setPromoCode(?string $promoCode): self
    {
        $this->promoCode = $promoCode;

        return $this;
    }

    public function getEndDeal(): ?\DateTimeInterface
    {
        return $this->endDeal;
    }

    public function setEndDeal(?\DateTimeInterface $endDeal): self
    {
        $this->endDeal = $endDeal;

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

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setDeal($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getDeal() === $this) {
                $review->setDeal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setDeal($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getDeal() === $this) {
                $comment->setDeal(null);
            }
        }

        return $this;
    }

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

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
