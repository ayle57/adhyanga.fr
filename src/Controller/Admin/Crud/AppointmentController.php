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

    #[Route('{id}', name: 'show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $appointment = $this->appointmentRepository->find($id);

        if (!$appointment) {
            $this->addFlash('danger', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('admin_appointments_index');
        }

        return $this->render('admin/appointments/show.html.twig', [
            'appointment' => $appointment,
        ]);
    }

}
