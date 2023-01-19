<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\CommentDeleteRequest;
use App\Http\Requests\Ticket\CommentStoreRequest;
use App\Http\Resources\V1\Ticket\CommentsResource;
use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketCommentController extends Controller
{
    /**
     * @OA\POST(
     *   tags={"Support Ticket"},
     *   path="/tickets/{id}/comments",
     *   summary="Ticket Comment Create",
     *   security={
     *      {"User": {}}
     *   },
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\RequestBody(
     *      description="Input data format",
     *
     *      @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="object",
     *          @OA\Property(
     *            property="comment_text",
     *            description="Comment text",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            property="user_id",
     *            description="user_id",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            property="author_name",
     *            description="Author name",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            property="author_email",
     *            description="Author email",
     *            type="string"
     *          )
     *        )
     *      )
     *    ),
     *   @OA\Response(
     *     response=200,
     *     description="OK"
     *   )
     * )
     */
    public function store(CommentStoreRequest $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $data = $request->merge(['user_id', $request->user()->id])->validated();
        $comment = $ticket->comments()->create($data);

        return new CommentsResource($comment);
    }

    /**
     * @OA\Delete(
     *   tags={"Support Ticket"},
     *   path="/tickets/{id}/comments/{comment_id}",
     *   summary="Comment Delete",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Parameter(
     *     name="comment_id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   security={
     *      {"User": {}}
     *   },
     *   @OA\Response(
     *     response=200,
     *     description="OK"
     *   )
     * )
     */
    public function destroy(Request $request, $id, $comment_id)
    {
        $ticket = Ticket::findOrFail($id);
        $comment = $ticket->comments()->findOrFail($comment_id);
        $comment->delete();

        return new CommentsResource($comment);
    }
}
