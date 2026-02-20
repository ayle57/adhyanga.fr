<?php declare(strict_types=1);

namespace App\Controller\Admin\Crud;

use App\Entity\Appointment;
use App\Enum\AppointmentStatusEnum;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/admin/appointments/", name: "admin_appointments_")]
final class AppointmentController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly AppointmentRepository $appointmentRepository,
        private readonly SerializerInterface $serializer,
        private readonly PaginatorInterface $paginator,
    )
    {
    }

    #[Route('', name: "index", methods: ['GET'])]
    public function index(Request $request): Response
    {
        $search = $request->query->get('q');

        $queryBuilder = $this->appointmentRepository->findFiltered($search);

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            18
        );

        $data = $this->serializer->normalize(
            $pagination->getItems(),
            null,
            ["groups" => "appointment_table"]
        );

        return $this->render('admin/appointments/index.html.twig', [
            "rows" => $data,
            "pagination" => $pagination,
            "search" => $search,
        ]);
    }

    #[Route('{id}/update-status', name: 'update_status', methods: ['POST'])]
    public function updateStatus(Request $request, Appointment $appointment): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $newStatus = $data['status'] ?? null;

        $validStatuses = array_map(fn($s) => $s->value, AppointmentStatusEnum::cases());
        if (!in_array($newStatus, $validStatuses, true)) {
            return $this->json(['success' => false, 'message' => 'Statut invalide'], 400);
        }

        $appointment->setStatus(AppointmentStatusEnum::from($newStatus));
        $this->entityManager->flush();

        $appointmentLabel = $appointment->getStatus()->label();

        return $this->json([
            'success' => true,
            'status' => $appointment->getStatus()->value,
            'label' => $appointmentLabel
        ]);
    }

    #[Route('{id<\d+>}', name: 'show', methods: ['GET'])]
    public function show(Appointment $appointment): Response
    {
        if (!$appointment) {
            $this->addFlash('danger', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('admin_appointments_index');
        }

        return $this->render('admin/appointments/show.html.twig', [
            'appointment' => $appointment,
        ]);
    }

    #[Route('create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $appointment = new Appointment();

        if ($request->isMethod('POST')) {

            $customerId = $request->request->get('customer_id');
            $customer = $this->entityManager
                ->getRepository(\App\Entity\Customer::class)
                ->find($customerId);

            if (!$customer) {
                $this->addFlash('danger', 'Client introuvable.');
                return $this->redirectToRoute('admin_appointments_create');
            }

            $startTime = new \DateTime($request->request->get('start_time'));
            $endTime = new \DateTime($request->request->get('end_time'));

            $appointment->setCustomer($customer);
            $appointment->setStartTime($startTime);
            $appointment->setEndTime($endTime);
            $appointment->setStatus(AppointmentStatusEnum::Scheduled);
            $appointment->setUpdatedAt(new \DateTimeImmutable());

            $this->entityManager->persist($appointment);
            $this->entityManager->flush();

            $this->addFlash('success', 'Rendez-vous créé avec succès.');

            return $this->redirectToRoute('admin_appointments_index');
        }

        $customers = $this->entityManager
            ->getRepository(\App\Entity\Customer::class)
            ->findAll();

        return $this->render('admin/appointments/create.html.twig', [
            'customers' => $customers,
        ]);
    }
}
