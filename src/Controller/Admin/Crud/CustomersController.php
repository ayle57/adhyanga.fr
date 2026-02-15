<?php

namespace App\Controller\Admin\Crud;

use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

#[Route("/admin/", name: "admin_customers_")]
final class CustomersController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly CustomerRepository $customerRepository,
        private readonly SerializerInterface $serializer,
        private readonly PaginatorInterface $paginator,
    )
    {
    }

    #[Route("customers", name: "index")]
    public function index(Request $request): Response
    {
        $search = $request->query->get('q');

        $queryBuilder = $this->customerRepository->findFiltered($search);

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            10
        );

        $data = $this->serializer->normalize(
            $pagination->getItems(),
            null,
            ['groups' => 'customer_table']
        );

        return $this->render("admin/customers/index.html.twig", [
            "rows" => $data,
            "pagination" => $pagination,
            "search" => $search
        ]);
    }
}
