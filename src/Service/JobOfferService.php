<?php

namespace App\Service;

use App\DTO\JobOfferDTO;
use App\Constant\UtilsConstant;
use Exception;

class JobOfferService
{
    private AuthUtilsService $authUtilsService;

    public function __construct(AuthUtilsService $authUtilsService) {
        $this->authUtilsService = $authUtilsService;
    }

    /**
     * Récupère la data de l'API
     * @param $token
     * @param $params
     * @return mixed
     */
    private function getOffersData($token, $params): mixed
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, UtilsConstant::API . 'ads/search?'. http_build_query($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [UtilsConstant::AUTH_BEARER . $token]);
        return json_decode(curl_exec($curl));
    }

    /**
     * Récupère et transforme les offres récupérées en objet avec le DTO
     * @param $params
     * @return array
     * @throws Exception
     */
    public function getJobOffers($params): array
    {
        try {
            // Récupération du token
            $token = $this->authUtilsService->getAuthToken();

            // Récupération des offres
            $offersData = $this->getOffersData($token, $params);

            // Check que offersData n'est pas null
            if (!isset($offersData->data->ads)) {
                throw new Exception(UtilsConstant::API_RESPONSE_EMPTY);
            }

            // Création des DTOs
            $jobOffers = [];

            foreach ($offersData->data->ads as $offerData) {
                $jobOffer = new JobOfferDTO();
                $jobOffer->id = $offerData->id;
                $jobOffer->link = $offerData->link;
                $jobOffer->title = $offerData->title;
                $jobOffer->description = $offerData->description;
                $jobOffer->publicationDate = $offerData->publicationDate;
                $jobOffer->coordinates = $offerData->coordinates;
                $jobOffer->city = $offerData->city;
                $jobOffer->postalCode = $offerData->postalCode;
                $jobOffer->department = $offerData->department;
                $jobOffer->region = $offerData->region;
                $jobOffer->sector = $offerData->sector;
                $jobOffer->jobTitle = $offerData->jobtitle;
                $jobOffer->company = $offerData->company;
                $jobOffer->contractType = $offerData->contractType;
                $jobOffer->salary = $offerData->salary;
                $jobOffers[] = $jobOffer;
            }

            return $jobOffers;
        } catch (Exception $exception) {
            throw new Exception(UtilsConstant::GET_OFFERS_ERROR);
            // TODO: Log l'exception
        }
    }
}
