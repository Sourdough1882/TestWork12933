<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    // Add comment to thread
    public function store(StoreCommentRequest $request) {

    }

    // Update comment
    public function update(UpdateCommentRequest $request) {

    }

    // Remove comment
    public function destroy(Comment $comment) {

    }
}
