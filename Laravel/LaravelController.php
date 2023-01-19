<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Resources\V1\Ticket\TicketResource;
use App\Http\Resources\V1\Ticket\TicketsResource;
use App\Models\Ticket;
use Spatie\QueryBuilder\QueryBuilder;

class TicketController extends Controller
{
    /**
     * @OA\Post(
     *     path="/tickets",
     *     tags={"Support Ticket"},
     *     summary="Create Support Ticket",
     *     description="Create Support Ticket",
     *     operationId="SupportTicket",
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="title",
     *                     type="string",
     *                     description="title"
     *                 ),
     *                 @OA\Property(
     *                     property="author_name",
     *                     type="string",
     *                     description="author_name"
     *                 ),
     *               @OA\Property(
     *                     property="author_email",
     *                     type="string",
     *                     description="author_email"
     *                 ),
     *              @OA\Property(
     *                     property="content",
     *                     type="string",
     *                     description="content"
     *                 ),
     *            @OA\Property(
     *                     property="generated_from",
     *                     type="string",
     *                     description="generated_from"
     *                 )
     *             ),
     *         )
     *     ),
     *     security={
     *         {"User": {}}
     *     },
     *     @OA\Response(response=200, description="OK"),
     *     @OA\Response(response=201, description="Created successfully!"),
     *     @OA\Response(response=422, description="Missing Or Invalid Parameters."),
     *     @OA\Response(response=401,description="Unauthorize Access!"),
     *     @OA\Response(response=404,description="Not Found."),
     *     @OA\Response(response=500,description="Something went wrong!"),
     * )
     */
    public function store(StoreTicketRequest $request)
    {
        $data = $request->merge(['user_id' => $request->user()->id])->validated();
        $ticket = Ticket::create($data);

        return new TicketResource($ticket);
    }

    /**
     * @OA\Get(
     *   tags={"Support Ticket"},
     *   path="/tickets",
     *   summary="ticket index",
     *   security={
     *      {"User": {}}
     *   },
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $tickets = QueryBuilder::for(Ticket::class)
            ->allowedFilters([
                'user_id',
                'author_email',
                'status',
                'priority',
            ])
            ->latest()
            ->paginate();

        return TicketsResource::collection($tickets);
    }

    /**
     * @OA\Get(
     *   tags={"Support Ticket"},
     *   path="/tickets/{id}",
     *   summary="ticket Show",
     *   security={
     *      {"User": {}}
     *   },
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK"
     *   )
     * )
     */
    public function show($id)
    {
        $ticket = QueryBuilder::for(Ticket::class)
            ->allowedIncludes([
                'comments',
            ])
            ->findOrFail($id);

        return new TicketResource($ticket);
    }
}
