<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments for Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(to bottom, #fff7e6, #fff0cc);
            min-height: 100vh;
            padding: 2rem;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .comment-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .comment-card .user {
            font-weight: bold;
            color: #1f2937;
        }

        .comment-card .comment {
            margin-top: 0.5rem;
            color: #6b7280;
        }

        .comment-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

        .comment-actions button {
            background: none;
            border: none;
            cursor: pointer;
            margin-left: 0.5rem;
            color: #6b7280;
        }

        .comment-actions button:hover {
            color: #1f2937;
        }

        .back-button {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary back-button">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>

        <!-- Product Details -->
        <h1>Comments for {{ $product->name }}</h1>

        <!-- Comments List -->
        <div class="comments-list">
            @if ($comments->isEmpty())
                <p>No comments yet.</p>
            @else
                @foreach ($comments as $comment)
                    <div class="comment-card" id="comment-{{ $comment->id }}">
                        <div class="user">{{ $comment->user->name }}</div>
                        <div class="comment">{{ $comment->comment }}</div>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>

                        <!-- Edit and Delete Buttons (only for the comment owner) -->
                        @if ($comment->user_id === Auth::id())
                            <div class="comment-actions">
                                <button onclick="editComment({{ $comment->id }})" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteComment({{ $comment->id }})" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Axios for AJAX requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Function to edit a comment
        function editComment(commentId) {
            const commentCard = document.getElementById(`comment-${commentId}`);
            const commentText = commentCard.querySelector('.comment').innerText;

            // Replace the comment text with an input field
            commentCard.querySelector('.comment').innerHTML = `
                <textarea class="form-control">${commentText}</textarea>
                <button onclick="saveComment(${commentId})" class="btn btn-primary mt-2">Save</button>
                <button onclick="cancelEdit(${commentId})" class="btn btn-secondary mt-2">Cancel</button>
            `;
        }

        // Function to save an edited comment
        function saveComment(commentId) {
            const commentCard = document.getElementById(`comment-${commentId}`);
            const updatedComment = commentCard.querySelector('textarea').value;

            axios.put(`/comment/${commentId}`, {
                comment: updatedComment,
            })
            .then(response => {
                if (response.data.success) {
                    // Update the comment text
                    commentCard.querySelector('.comment').innerText = updatedComment;
                } else {
                    alert(response.data.message);
                }
            })
            .catch(error => {
                alert('An error occurred while updating the comment.');
            });
        }

        // Function to cancel editing
        function cancelEdit(commentId) {
            const commentCard = document.getElementById(`comment-${commentId}`);
            const originalComment = commentCard.querySelector('textarea').value;

            // Restore the original comment text
            commentCard.querySelector('.comment').innerText = originalComment;
        }

        // Function to delete a comment
        function deleteComment(commentId) {
            if (confirm('Are you sure you want to delete this comment?')) {
                axios.delete(`/comment/${commentId}`)
                    .then(response => {
                        if (response.data.success) {
                            // Remove the comment card from the DOM
                            document.getElementById(`comment-${commentId}`).remove();
                        } else {
                            alert(response.data.message);
                        }
                    })
                    .catch(error => {
                        alert('An error occurred while deleting the comment.');
                    });
            }
        }
    </script>
</body>
</html>
