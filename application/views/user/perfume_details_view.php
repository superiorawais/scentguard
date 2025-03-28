<div class="container mt-4">
<div class="row">
    <div class="col-6">
    <h2><?= $perfume['Name'] ?></h2>
    <p><strong>Ingredients:</strong> <?= $perfume['Ingredients'] ?: 'N/A' ?></p>
    <p><strong>Risks:</strong> <?= $perfume['DiseaseRisks'] ?: 'None' ?></p>
    <p><strong>Alternative:</strong> <?= $perfume['AlternativeNames'] ?: 'No alternative available' ?></p>
    </div>
    <div class="col-6">
    <!-- Overall Rating Section -->
    <h3>Overall Rating</h3>
    <p id="averageRating">Loading...</p>

    <h3>Rate this Perfume</h3>
    <div class="row">
        <div class="col-6">
    <select id="perfumeRating" class="form-control">
        <option value="1">1 ⭐</option>
        <option value="2">2 ⭐⭐</option>
        <option value="3">3 ⭐⭐⭐</option>
        <option value="4">4 ⭐⭐⭐⭐</option>
        <option value="5">5 ⭐⭐⭐⭐⭐</option>
    </select>
    </div>
    <div class="col-6">
    <button class="btn bg-darkbrown" id="submitRating">Submit Rating</button>
    </div>
    </div>
    </div>
    </div>
    <h3 class="mt-4">Leave a Comment</h3>
    <textarea id="commentText" class="form-control" rows="3"></textarea>
    <button class="btn btn-success mt-2 bg-darkbrown" id="submitComment">Submit Comment</button>

    <h3 class="mt-4">User Comments</h3>
    <div id="commentsSection"></div>
</div>


<script>
$(document).ready(function () {
    let perfumeID = <?=$perfume['PerfumeID']?>;
    let isLoggedIn = <?= isset($_SESSION['userId']) ? 'true' : 'false' ?>; // Check login status

    loadComments();
    loadAverageRating();  // Load average rating when page loads

    // Submit Rating
    $("#submitRating").click(function () {
        if (!isLoggedIn) {
            showAlert("You must be logged in to submit a rating!", "Danger");
            return;
        }

        let rating = $("#perfumeRating").val();
        $.post("<?= base_url('perfume/submit_rating') ?>", { perfumeID: perfumeID, rating: rating }, function () {
            showAlert("Rating Submitted", "Success");
            loadAverageRating();  // Refresh rating after submission
        });
    });

    // Submit Comment
    $("#submitComment").click(function () {
        if (!isLoggedIn) {
            showAlert("You must be logged in to submit a comment!", "Danger");
            return;
        }

        let commentText = $("#commentText").val();
        if (commentText.trim() === '') {
            showAlert("Comment cannot be empty!", "Danger");
            return;
        }

        $.post("<?= base_url('perfume/submit_comment') ?>", { perfumeID: perfumeID, comment: commentText }, function () {
            showAlert("Comment submitted!", "Success");
            $("#commentText").val(""); // Clear textarea
            loadComments();
        });
    });

    // Load Comments
    function loadComments() {
        $.get("<?= base_url('perfume/get_comments') ?>/" + perfumeID, function (data) {
            $("#commentsSection").html(data);
        });
    }

    // Load Average Rating
    function loadAverageRating() {
        $.get("<?= base_url('perfume/get_average_rating') ?>/" + perfumeID, function (data) {
            $("#averageRating").html("Average Rating: " + data + " ⭐");
        });
    }

    function showAlert(msg, type) {
        let alertBox = $('#alert' + type);
        alertBox.text(msg).fadeIn(); // Set message and show alert
        
        setTimeout(function() {
            alertBox.fadeOut(); // Hide alert after 1.5 seconds
        }, 1500);
    }
});
</script>
