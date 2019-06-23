<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DoneJobsRepository")
 */
class DoneJobs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $road_section;

    /**
     * @ORM\Column(type="float")
     */
    private $road_section_begin;

    /**
     * @ORM\Column(type="float")
     */
    private $road_section_end;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $unit_of;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    private $quantity;

    /**
     * @ORM\Column(type="date")
     */
    private $done_job_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="integer")
     */
    private $road_level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RoadSection")
     * @ORM\JoinColumn(nullable=true)
     */
    private $section_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobId(): ?Job
    {
        return $this->job_id;
    }

    public function setJobId(?Job $job_id): self
    {
        $this->job_id = $job_id;

        return $this;
    }

    public function getJobName(): ?string
    {
        return $this->job_name;
    }

    public function setJobName(string $job_name): self
    {
        $this->job_name = $job_name;

        return $this;
    }

    public function getRoadSection(): ?string
    {
        return $this->road_section;
    }

    public function setRoadSection(string $road_section): self
    {
        $this->road_section = $road_section;

        return $this;
    }

    public function getRoadSectionBegin(): ?float
    {
        return $this->road_section_begin;
    }

    public function setRoadSectionBegin(float $road_section_begin): self
    {
        $this->road_section_begin = $road_section_begin;

        return $this;
    }

    public function getRoadSectionEnd(): ?float
    {
        return $this->road_section_end;
    }

    public function setRoadSectionEnd(float $road_section_end): self
    {
        $this->road_section_end = $road_section_end;

        return $this;
    }

    public function getUnitOf(): ?string
    {
        return $this->unit_of;
    }

    public function setUnitOf(string $unit_of): self
    {
        $this->unit_of = $unit_of;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDoneJobDate(): ?\DateTimeInterface
    {
        return $this->done_job_date;
    }

    public function setDoneJobDate(\DateTimeInterface $done_job_date): self
    {
        $this->done_job_date = $done_job_date;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }


    public function getRoadLevel(): ?int
    {
        return $this->road_level;
    }

    public function setRoadLevel(int $road_level): self
    {
        $this->road_level = $road_level;

        return $this;
    }

    public function getSectionId(): ?RoadSection
    {
        return $this->section_id;
    }

    public function setSectionId(?RoadSection $section_id): self
    {
        $this->section_id = $section_id;

        return $this;
    }
}
