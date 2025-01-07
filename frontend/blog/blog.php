<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">My Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Section -->
    <div class="container py-5">
        <h1 class="mb-4 text-center">Blog</h1>
        <p class="text-muted text-center mb-5">Stay updated with the latest articles and news.</p>

        <div class="row g-4">
            <!-- Blog Post Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Blog Post Image">
                    <div class="card-body">
                        <h5 class="card-title">Blog Post Title</h5>
                        <p class="card-text text-muted">This is a short description of the blog post to capture readers' interest...</p>
                        <a href="/blog/post-slug" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Duplicate this card for more posts -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Blog Post Image">
                    <div class="card-body">
                        <h5 class="card-title">Another Blog Post</h5>
                        <p class="card-text text-muted">Here’s another description to entice users to read the article...</p>
                        <a href="/blog/another-post-slug" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Add more cards as needed -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 My Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>