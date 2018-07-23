<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Trip;
use App\Repository\TripRepository;
use App\Entity\Country;
use App\Repository\CountryRepository;
use App\Entity\User;
use App\Repository\UserRepository;

class SearchController extends Controller
{
    public function index()
    {

    }

    public function searchBar()
    {
        $form = $this->createFormBuilder(null)
        ->add('query',TextType::class, ['label'=>false,])
        ->getForm();

        return $this->render('search/index.html.twig', [
            'form'=>$form->createView()
        ]);
    }

            /**
     * @Route("/searchResult", name="searchResult", methods="GET|POST")
     */
    public function handleSearch(Request $request, TripRepository $tripRepository, UserRepository $userRepository, CountryRepository $countryRepository)
    {
        $trips=$tripRepository->findAll();
        $users=$userRepository->findAll();
        $countries=$countryRepository->findAll();

        $query = $request->request->get('form');

        var_dump($query);
        die();
    }


    public function new(TripRepository $tripRepository, UserRepository $userRepository, CountryRepository $countryRepository): Response
    {
        return $this->render('trip/index.html.twig', ['trips' => $tripRepository->findAll(),
                                                      'users' => $userRepository->findAll(),
                                                      'country' => $countryRepository->findAll()]);
    }

    // public function searchDrive(Request $request) {
    //     $searchValue = $request->request->get('form[query]');
       
    // }


}
