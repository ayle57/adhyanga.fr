<?php declare(strict_types=1);

namespace App\Controller\Admin\Crud;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/admin/customers/", name: "admin_customers_")]
final class CustomerController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly CustomerRepository $customerRepository,
        private readonly SerializerInterface $serializer,
        private readonly PaginatorInterface $paginator,
    ) {}

    #[Route("", name: "index", methods: ["GET"])]
    public function index(Request $request): Response
    {
        $search = $request->query->get('q');

        $queryBuilder = $this->customerRepository->findFiltered($search);

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            18
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

    #[Route("{id}", name: "show", methods: ["GET"], requirements: ["id" => "\d+"])]
    public function show(int $id): Response
    {
        $customer = $this->customerRepository->find($id);

        if (null === $customer) {
            $this->addFlash('danger', 'Client introuvable.');
            return $this->redirectToRoute('admin_customers_index');
        }

        return $this->render("admin/customers/show.html.twig", [
            "customer" => $customer,
        ]);
    }

    /**
     * Formulaire pour éditer les notes
     */
    #[Route("{id}/edit/notes", name: "notes_edit", methods: ["GET"])]
    public function editNotes(int $id): Response
    {
        $customer = $this->customerRepository->find($id);

        if (null === $customer) {
            $this->addFlash('danger', 'Client introuvable pour édition des notes.');
            return $this->redirectToRoute('admin_customers_index');
        }

        return $this->render("admin/customers/notes.html.twig", [
            "customer" => $customer,
        ]);
    }

    /**
     * Mise à jour des notes
     */
    #[Route("{id}/update/notes", name: "update_notes", methods: ["POST"])]
    public function updateNotes(Request $request, int $id): Response
    {
        $customer = $this->customerRepository->find($id);

        if (null === $customer) {
            $this->addFlash('danger', 'Client introuvable pour mise à jour des notes.');
            return $this->redirectToRoute('admin_customers_index');
        }

        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('update_notes' . $customer->getId(), $submittedToken)) {
            $this->addFlash('danger', 'Token CSRF invalide. Mise à jour annulée.');
            return $this->redirectToRoute('admin_customers_show', ['id' => $customer->getId()]);
        }

        $notes = $request->request->get('notes', '');
        $customer->setNotes($notes);

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('Les notes du client #%d ont été mises à jour.', $customer->getId()));

        return $this->redirectToRoute('admin_customers_show', ['id' => $customer->getId()]);
    }

    /**
     * Formulaire pour éditer le client
     */
    #[Route("{id}/edit", name: "edit", methods: ["GET"])]
    public function edit(int $id): Response
    {
        $customer = $this->customerRepository->find($id);

        if (null === $customer) {
            $this->addFlash('danger', 'Client introuvable pour édition.');
            return $this->redirectToRoute('admin_customers_index');
        }

        return $this->render("admin/customers/edit.html.twig", [
            "customer" => $customer,
        ]);
    }

    /**
     * Mise à jour générale du client
     */
    #[Route("{id}/update", name: "update", methods: ["POST"])]
    public function update(Request $request, int $id): Response
    {
        $customer = $this->customerRepository->find($id);

        if (null === $customer) {
            $this->addFlash('danger', 'Client introuvable pour mise à jour.');
            return $this->redirectToRoute('admin_customers_index');
        }

        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('update_customer_' . $customer->getId(), $submittedToken)) {
            $this->addFlash('danger', 'Token CSRF invalide. Mise à jour annulée.');
            return $this->redirectToRoute('admin_customers_show', ['id' => $customer->getId()]);
        }

        $customer->setFirstname($request->request->get('firstname', $customer->getFirstname()));
        $customer->setLastname($request->request->get('lastname', $customer->getLastname()));
        $customer->setEmail($request->request->get('email', $customer->getEmail()));
        $customer->setPhone($request->request->get('phone', $customer->getPhone()));
        $customer->setNotes($request->request->get('notes', $customer->getNotes()));

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('Le client #%d a été mis à jour avec succès.', $customer->getId()));

        return $this->redirectToRoute('admin_customers_show', ['id' => $customer->getId()]);
    }

    #[Route("create", name: "create", methods: ["GET", "POST"])]
    public function create(Request $request): Response
    {
        $customer = new Customer();

        if ($request->isMethod('POST')) {
            $customer->setFirstname($request->request->get('firstname', ''));
            $customer->setLastname($request->request->get('lastname', ''));
            $customer->setEmail($request->request->get('email', ''));
            $customer->setPhone($request->request->get('phone', ''));

            $this->entityManager->persist($customer);
            $this->entityManager->flush();

            $this->addFlash('success', sprintf('Le client #%d a été créé.', $customer->getId()));
            return $this->redirectToRoute('admin_customers_index');
        }

        return $this->render('admin/customers/create.html.twig', [
            'customer' => $customer,
        ]);
    }
}
