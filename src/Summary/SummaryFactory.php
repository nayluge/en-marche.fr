<?php

namespace AppBundle\Summary;

use AppBundle\Entity\Adherent;
use AppBundle\Entity\Summary;
use Cocur\Slugify\SlugifyInterface;

class SummaryFactory
{
    private $slugger;

    public function __construct(SlugifyInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function createFromAdherent(Adherent $adherent): Summary
    {
        return Summary::createFromMember($adherent, $this->slugger->slugify($adherent->getFullName()));
    }

    /**
     * Used for test and loadiang fixtures purpose.
     *
     * @param array $data
     * 
     * @return Summary
     */
    public function createFromArray(array $data): Summary
    {
        $admin = new Summary($data['adherent'], $data['slug']);

        $admin->setAvailability($data['availability']);
        $admin->setContactEmail($data['contactEmail']);
        $admin->setContributionWish($data['contributionWish']);
        $admin->setJobLocation($data['jobLocation']);
        $admin->setMotivation($data['motivation']);
        $admin->setProfessionalSynopsis($data['professionalSynopsis']);

        $admin->setCurrentProfession($data['currentProfession'] ?? '');
        $admin->setLinkedInUrl($data['email'] ?? '');
        $admin->setWebsiteUrl($data['websiteUrl'] ?? '');
        $admin->setViadeoUrl($data['viadeoUrl'] ?? '');
        $admin->setFacebookUrl($data['facebookUr'] ?? '');
        $admin->setTwitterNickname($data['twitterNickname'] ?? '');
        $admin->setMissionTypeWishes($data['missionWishes'] ?? []);

        return $admin;
    }
}