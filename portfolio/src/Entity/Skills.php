<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillsRepository")
 */
class Skills
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hardSkill;

    /**
     * @ORM\Column(type="boolean")
     */
    private $softSkill;

    /**
     * @ORM\Column(type="integer")
     */
    private $completion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="skills")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getHardSkill(): ?bool
    {
        return $this->hardSkill;
    }

    public function setHardSkill(bool $hardSkill): self
    {
        $this->hardSkill = $hardSkill;

        return $this;
    }

    public function getSoftSkill(): ?bool
    {
        return $this->softSkill;
    }

    public function setSoftSkill(bool $softSkill): self
    {
        $this->softSkill = $softSkill;

        return $this;
    }

    public function getCompletion(): ?int
    {
        return $this->completion;
    }

    public function setCompletion(int $completion): self
    {
        $this->completion = $completion;

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
