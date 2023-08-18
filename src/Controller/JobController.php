<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\JobOfferService;


class JobController extends AbstractController
{
    private JobOfferService $jobOfferService;

    public function __construct(JobOfferService $jobOfferService) {
        $this->jobOfferService = $jobOfferService;
    }

    #[Route('/job', name: 'job', methods: ['GET'])]
    public function jobList(Request $request)
    {
        $params = [
            'what' => '',
            'where' => 'Bordeaux',
            'limit' => 10
        ];

        try {
            $jobOffers = $this->jobOfferService->getJobOffers($params);
        } catch (Exception $exception) {
            $errorMessage = $exception->getMessage();
            $jobOffers = [];
        }

        $page = $request->query->get('page', 1);
        $perPage = 5;
        $paginatedJobOffers = array_slice($jobOffers, ($page - 1) * $perPage, $perPage);
        $maxPage = ceil(count($jobOffers) / $perPage);

        return $this->render('offers.html.twig', [
            'controller_name' => 'JobController',
            'offers' => $paginatedJobOffers,
            'pagination' => [
                'page' => $page,
                'maxPage' => $maxPage
            ],
            'errorMessage' => $errorMessage ?? null
        ]);
    }
}
