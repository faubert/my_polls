<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
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
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="question")
     */
    private $answer;

    /**
     * @ORM\OneToMany(targetEntity=Choice::class, mappedBy="question")
     */
    private $choice;

    /**
     * @ORM\ManyToOne(targetEntity=Polls::class)
     */
    private $poll;

    public function __construct()
    {
        $this->answer = new ArrayCollection();
        $this->choice = new ArrayCollection();
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

    public function getAnswers()
    {
        return $this->answer;
    }

    public function addAnswer(Answer $answer)
    {
        $this->answer->add($answer);
        $answer->setQuestion($this);
    }

    public function getChoice()
    {
        return $this->choice;
    }

    public function addChoice(Choice $choice)
    {
        $this->choice->add($choice);
        $choice->setQuestion($this);
    }
}
