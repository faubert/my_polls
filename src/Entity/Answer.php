<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity=Choice::class, inversedBy="answers", cascade={"persist"})
     * @ORM\JoinTable(name="selected_answer",
     *     joinColumns={
     *          @ORM\JoinColumn(name="answer_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="choice_id", referencedColumnName="id")
     *     }
     * )
     */
    private $choices;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answer")
     */
    private $question;

    public function __construct()
    {
        $this->choices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function addChoice(Choice $choices): self
    {
        $this->choices[] = $choices;

        return $this;
    }

    public function removeChoice(choice $choices): bool
    {
        return $this->choices->removeElement($choices);
    }

    public function getChoice(): Collection
    {
        return $this->choices;
    }

    /**
     * @return ArrayCollection
     */
    public function getChoices(): ArrayCollection
    {
        return $this->choices;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question): void
    {
        $this->question = $question;
    }
}
